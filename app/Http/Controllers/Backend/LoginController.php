<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // load admin login page
    public function index()
    {
        return view('backend.admin-login.admin-login');
    }
}
