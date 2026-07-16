<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);
        \App\Models\User::create($validated);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function show(\App\Models\User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(\App\Models\User $user)
    {
        if ($user->email === 'admin@example.com' && auth()->user()->email !== 'admin@example.com') {
            return redirect()->route('users.index')->with('error', 'Solo el administrador principal puede editar su propia cuenta.');
        }

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, \App\Models\User $user)
    {
        if ($user->email === 'admin@example.com' && auth()->user()->email !== 'admin@example.com') {
            return redirect()->route('users.index')->with('error', 'Solo el administrador principal puede editar su propia cuenta.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(\App\Models\User $user)
    {
        // admin@example.com can NEVER be deleted
        if ($user->email === 'admin@example.com') {
            return redirect()->route('users.index')->with('error', 'El usuario administrador principal no puede ser eliminado.');
        }

        // Only admin@example.com can delete users
        if (auth()->user()->email !== 'admin@example.com') {
            return redirect()->route('users.index')->with('error', 'Solo el administrador principal puede eliminar usuarios.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
