<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('authentication.admin.UserResource.index', [
            'users' => User::all(),
            'header' => 'Users'
        ]);
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect()->back()->with('success', 'Berhasil menghapus user!');
    }
}
