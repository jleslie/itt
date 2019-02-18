<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
	/**
	* Logout a user.
	*/
	public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
