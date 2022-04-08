<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user_counts = User::all()->count();
        // return $user_counts;
        $admin_counts = User::where('isAdmin', 1)->get()->count();

        return view('admin.index', [
            'user_counts' => $user_counts,
            'admin_counts' => $admin_counts
        ]);
    }

    public function users()
    {
        return view('admin.users', [
            'users' => User::all()
        ]);
    }

    public function admins()
    {
        return view('admin.admins', [
            'admins' => User::where('isAdmin', 1)->get()
        ]);
    }

    public function editUser()
    {
        return view('admin.edit-user', [
            'users' => User::all()
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users');
    }
}
