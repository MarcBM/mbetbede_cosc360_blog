<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // To see your own profile
    public function profile() {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        return view('Users.show', compact('user'));
    }

    // To edit your own profile
    public function editProfile() {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        return view('Users.edit', compact('user'));
    }

    // To edit a specific user
    public function editUser(User $user) {
        if (!$user) {
            abort(404);
        }

        return view('Users.edit', compact('user'));
    }

    // To update your own profile
    public function updateProfile(Request $request) {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user->update($request->all());
        return redirect()->route('user.profile', $user);
    }

    // To update a specific profile
    public function updateUser(Request $request, User $user) {
        if (!$user) {
            abort(404);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user->update($request->all());
        return redirect()->route('admin.users');
    }

    // To delete a specific user
    public function deleteUser(User $user) {
        if (!$user) {
            abort(404);
        }
        $user->delete();

        return redirect()->route('admin.users');
    }

    // To change your own password
    public function changePassword() {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        return view('Users.changePassword', compact('user'));
    }

    // To update your own password
    public function updatePassword(Request $request) {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        $request->validate([
            'password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('user.profile');
    }
}
