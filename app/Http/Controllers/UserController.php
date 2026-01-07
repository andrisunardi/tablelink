<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate(10);

        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function edit(User $user): View
    {
        $roles = Role::all();

        return view('user.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role_id' => 'nullable',
        ]);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $user->syncRoles([$data['role_id']]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->intended(route('users.index', absolute: false));
    }
}
