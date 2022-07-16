<?php

namespace App\Models\Backend;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminUser extends User
{
    use HasFactory;
    protected $guarded = [];
}
