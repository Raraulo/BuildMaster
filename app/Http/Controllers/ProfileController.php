<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     * Only admin@example.com can access.
     */
    public function edit(Request $request): View
    {
        if ($request->user()->email !== 'admin@example.com') {
            abort(403, 'Solo el administrador principal puede acceder al perfil.');
        }

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     * Only admin@example.com can update profile.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->user()->email !== 'admin@example.com') {
            abort(403, 'Solo el administrador principal puede modificar el perfil.');
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     * admin@example.com can NEVER be deleted.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Prevent admin account from being deleted
        if ($request->user()->email === 'admin@example.com') {
            return Redirect::route('profile.edit')->with('error', 'La cuenta de administrador principal no puede ser eliminada.');
        }

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
