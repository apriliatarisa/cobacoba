<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index()
   {
    if (Auth::id())
    {
        $usertype=Auth()->user()->usertype;

        if($usertype=='kasir')
        {
            return view('dashboard');
        }
        else if($usertype=='manajer')
        {
            return view('manajemen-user.manajerhome');
        }
        else 
        {
            return redirect()->back();
        }
    }
   }
   public function post()
   {
    return view('post');
   }
}
