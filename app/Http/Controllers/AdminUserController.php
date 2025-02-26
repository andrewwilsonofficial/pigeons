<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function users()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.users.index', compact('users'));
    }

    public function logInAsUser(User $user)
    {
        $admin_user_id = auth()->id();
        auth()->login($user);
        session()->put('admin_user_id', $admin_user_id);

        return redirect()->route('home');
    }
}
