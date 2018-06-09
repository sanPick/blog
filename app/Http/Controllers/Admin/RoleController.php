<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\RoleModel;
<<<<<<< HEAD
=======

>>>>>>> origin/wangzhongen
class RoleController extends CommonController
{
    public function roleDo()
    {

        RoleModel::insertOne($_POST);
        return redirect("roleIndex");
    }

    public function index()
    {
        return view('admin\role\index',['data'=>RoleModel::show()]);
    }
    public function add()
    {

        return view("admin/Role/add");
    }
<<<<<<< HEAD
=======


     public function setAdmin()
    {
        $id=isset($_GET['id'])?$_GET['id']:'0';
        $data=RoleModel::getRole($id);
        return view('admin\role\setAdmin',['data'=>$data]);
    }

        public function addAdmin()
        {
            $adminId = $_GET['adminId'];
            $roleId = $_GET['roleId'];
            if(RoleModel::addUser($roleId, $adminId))
            {
                return redirect('setAdmin?id='.$adminId);
            }

        }



        public function setNode() {
        $id = $_GET['id'];

        $roleNodes = RoleModel::getRoleNodes($id);
        $nodeTree = $this -> getNodesTree($roleNodes['all_node']);
        return view('admin\role\setNode',[
            'role_node' => $roleNodes['role_node'],
            'node_tree' => $nodeTree,]);
    }

    protected function getNodesTree($data,$pid = 0)
    {
        $array = [];
        foreach ($data as $val) {
            if($val['pid'] == $pid)
            {
                $val['child'] = $this -> getNodesTree($data,$val['nodeId']);
                $array[] = $val;
            }
        }
        return $array;
    }

    public function addNode()
    {
        $nodeId = $_POST;
        $roleId = $_POST['roleId'];
        $res=RoleModel::addNode($roleId,$nodeId['nodeId']);
        if($res)
        {
            return redirect('setNode?id='.$roleId);
        }

    }

    public function authUser($uid,$controller,$action){

        $role_id = $this -> table('user_role')->where(['user_id' => $uid])-> column('role_id');

        $node_id = model('nodeModel')->where([
                  'controller_name' => $controller,
                  'action_name' => $action,
                  'status' => self::on_status
        ])-> value('id');

        if(!$role_id || !$node_id){
            return false;
        }
        return $this ->  table('role_node') -> where([
            'role_id' =>[
                'in',$role_id
              ],
              'node_id' => $node_id,
        ])->value('node_id');
    }



>>>>>>> origin/wangzhongen
}


