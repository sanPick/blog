<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\model\CommonModel;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/huanghan
class CommonController extends Controller
{






    public function controllerName()
    {
       $controller=CommonModel::getActionAndControllerName()['controller'];
<<<<<<< HEAD
=======
use App\model\roleModel;
class CommonController extends Controller
{
    public function __construct()
    {

            // if(empty($this->auth()))
            // {
            //     // echo 1;die;
            //     echo "<script>alert('没有此权限');location.href='indexIndex'</script>";
            // }
    }


    public function auth()
    {
    $controller = $this->controllerName()['controllerName'];

    $action = $this->controllerName()['actionName'];
    $lsAuth = RoleModel::authUser(1,$controller,$action);
    return $lsAuth;
   }
    public function controllerName()
    {
       $controller=CommonModel::getActionAndControllerName();
>>>>>>> origin/wangzhongen
=======
>>>>>>> origin/huanghan
       return $controller;
    }



}
