<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\model\CommonModel;
class CommonController extends Controller
{






    public function controllerName()
    {
       $controller=CommonModel::getActionAndControllerName()['controller'];
       return $controller;
    }



}
