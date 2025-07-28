<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersControllers extends Controller
{
    public function index()
    {
        $users = User::query()
            ->when(request('search'), function ($query) {
                $query->where(function ($q) {
                    $q->where('username', 'like', '%' . request('search') . '%')
                        ->orWhere('npm', 'like', '%' . request('search') . '%')
                        ->orWhere('nidn', 'like', '%' . request('search') . '%');
                });
            })
            ->when(request('role'), function ($query) {
                $query->where('role', request('role'));
            }, function ($query) {
                if (!auth()->user()->isAdmin()) {
                    $query->where('role', '!=', 'admin');
                }
            })
            ->when(!is_null(request('status_aktif')), function ($query) {
                $query->where('status_aktif', request('status_aktif'));
            })
            ->orderBy(request('sort_by', 'created_at'), request('sort_direction', 'desc'))
            ->paginate(request('per_page', 10));

        return view('pengaturan.user.index', compact('users'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('pengaturan.user.create', compact('prodis'));
    }

    public function store(UsersRequest $request)
    {
        $validated = $request->validated();

        // Handle file upload
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('profile-photos', 'public');
            $validated['foto'] = $path;
        }

        // Membuat pengguna baru
        User::create([
            'nama_lengkap'  => $validated['nama_lengkap'],
            'email'         => $validated['email'],
            'username'      => $validated['username'],
            'password'      => Hash::make($validated['password']),
            'role'          => $validated['role'],
            'npm'           => $validated['npm'] ?? null,
            'nidn'          => $validated['nidn'] ?? null,
            'prodi_id'      => $validated['prodi_id'] ?? null,
            'foto'          => $validated['foto'] ?? null,
            'status_aktif'  => $validated['status_aktif'],
        ]);

        return redirect()->route('users.index')->with('success', 'User baru berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        // Format tanggal
        $formattedCreatedAt = $user->created_at
            ? $user->created_at->locale('id')->translatedFormat('d F Y H:i')
            : '-';

        $formattedUpdatedAt = $user->updated_at
            ? $user->updated_at->locale('id')->translatedFormat('d F Y H:i')
            : '-';

        return view('pengaturan.user.show', [
            'user' => $user,
            'formattedCreatedAt' => $formattedCreatedAt,
            'formattedUpdatedAt' => $formattedUpdatedAt,
        ]);
    }

    public function edit(User $user)
    {
        $prodis = Prodi::all();
        return view('pengaturan.user.edit', compact('user', 'prodis'));
    }

    public function update(UsersRequest $request, User $user)
    {
        $validated = $request->validated();

        // Handle password update
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Handle file upload
        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $path = $request->file('foto')->store('profile-photos', 'public');
            $validated['foto'] = $path;
        } else {
            unset($validated['foto']);
        }

        $user->update([
            'nama_lengkap'  => $validated['nama_lengkap'],
            'email'         => $validated['email'],
            'username'      => $validated['username'],
            'role'          => $validated['role'],
            'npm'           => $validated['npm'] ?? null,
            'nidn'          => $validated['nidn'] ?? null,
            'prodi_id'      => $validated['prodi_id'] ?? null,
            'status_aktif'  => $validated['status_aktif'],
        ] + $validated);

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data user berhasil dihapus.');
    }
}

