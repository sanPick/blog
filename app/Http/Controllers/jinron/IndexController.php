<?php

namespace App\Http\Controllers;


// use App\User;
// use Validator;
// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\ThrottlesLogins;
// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class IndexController extends Controller
{
          public function index()
          {
                return view('home.index.php');
          }

}
