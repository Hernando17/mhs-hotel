<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAdminController extends Controller
{
    public function index()
    {
        return view('admin.admin.index', [
            'title' => 'Admin MHS Hotel | Admin',
            'admins' => User::where('is_admin', true)->paginate(10)->withQueryString()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
            'confirm_password' => ['required', 'same:password'],
            'photo' => ['image', 'file', 'max:2048']
        ]);
    }
}
