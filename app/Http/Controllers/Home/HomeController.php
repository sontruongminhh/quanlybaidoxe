<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.welcome');
    }
    public function contact(){
        return view('contact.index');
        return view('contact.booking');
    }
}
