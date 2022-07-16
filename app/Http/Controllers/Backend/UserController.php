<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AdminUser;
use App\Models\Backend\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // load admin dashboard page
    public function index()
    {
        $data = Role::where('status', true)->where('trash', false)->get();
        return view('backend.users.index', [
            'data' => $data
        ]);
    }


    // admin user store
    public function store(Request $request)
    {

        $username = AdminUser::where('username', $request->username)->first();
        $email = AdminUser::where('email', $request->email)->first();
        $phone = AdminUser::where('phone', $request->phone)->first();

        if (!empty($username)) {
            return [
                'username' => 'exist'
            ];
        }
        if (!empty($email)) {
            return [
                'email' => 'exist'
            ];
        }
        if (!empty($phone)) {
            return [
                'phone' => 'exist'
            ];
        }

        if (empty($username) && empty($email) && empty($phone)) {
            AdminUser::create([
                'name' => $request->name,
                'role_id' => $request->role,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),

            ]);
        }
    }
}
