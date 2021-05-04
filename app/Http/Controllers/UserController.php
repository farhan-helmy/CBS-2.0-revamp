<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       $usercount = User::role('patient')->count();

       return view('dashboard.index', compact('usercount'));
    }
}
