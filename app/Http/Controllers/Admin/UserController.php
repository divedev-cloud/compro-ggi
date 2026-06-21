<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private function authorizeSuperAdmin(): void
    {
        /** @var User $admin */
        $admin = Auth::user();

        if (! $admin->isSuperAdmin()) {
            abort(403, 'Hanya admin-ggi yang dapat mengelola pengguna.');
        }
    }

    public function index()
    {
        $users = User::orderByRaw("name = 'admin-ggi' DESC")->orderBy('name')->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorizeSuperAdmin();

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->authorizeSuperAdmin();

        $validated = $request->validate([
            'full_name'             => ['required', 'string', 'max:100'],
            'name'                  => ['required', 'string', 'max:50', 'unique:users,name', 'regex:/^[a-zA-Z0-9_-]+$/'],
            'email'                 => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'name.regex'         => 'Username hanya boleh mengandung huruf, angka, garis bawah, dan tanda hubung.',
            'name.unique'        => 'Username sudah digunakan.',
            'email.unique'       => 'Email sudah terdaftar.',
        ]);

        User::create([
            'full_name' => $validated['full_name'],
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'password'  => $validated['password'],
            'is_active' => true,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', "User '{$validated['name']}' berhasil ditambahkan.");
    }

    public function edit(User $user)
    {
        $this->authorizeSuperAdmin();

        if ($user->isSuperAdmin()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'User admin-ggi tidak dapat diedit.');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorizeSuperAdmin();

        if ($user->isSuperAdmin()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'User admin-ggi tidak dapat diedit.');
        }

        $validated = $request->validate([
            'full_name'             => ['required', 'string', 'max:100'],
            'name'                  => ['required', 'string', 'max:50', "unique:users,name,{$user->id}", 'regex:/^[a-zA-Z0-9_-]+$/'],
            'email'                 => ['required', 'email', 'max:255', "unique:users,email,{$user->id}"],
            'password'              => ['nullable', 'string', 'min:8', 'confirmed'],
        ], [
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'name.regex'         => 'Username hanya boleh mengandung huruf, angka, garis bawah, dan tanda hubung.',
            'name.unique'        => 'Username sudah digunakan.',
            'email.unique'       => 'Email sudah terdaftar.',
        ]);

        $data = [
            'full_name' => $validated['full_name'],
            'name'      => $validated['name'],
            'email'     => $validated['email'],
        ];

        if (! empty($validated['password'])) {
            $data['password'] = $validated['password'];
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', "User '{$user->name}' berhasil diperbarui.");
    }

    public function toggle(User $user)
    {
        $this->authorizeSuperAdmin();

        if ($user->isSuperAdmin()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'User admin-ggi tidak dapat dinonaktifkan.');
        }

        $user->update(['is_active' => ! $user->is_active]);

        $status = $user->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->route('admin.users.index')
            ->with('success', "User '{$user->name}' berhasil {$status}.");
    }
}
