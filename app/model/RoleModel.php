<?php

/**
 * @Author: Marte
 * @Date:   2018-06-05 14:22:53
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-06-08 17:09:29
 */
namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\CommonModel;
use App\model\AdminModel;
use DB;
class RoleModel extends CommonModel
{


        public $table='role';
        public $updated_at=false;
        public $created_at=false;
        //指定允许批量赋值的字段
        protected  $fillable=['roleName'];
        public static  function show()
        {
              // return json_decode(json_encode(Exam::all()),true);
            return self::all()->toArray();
        }

        public static function insertOne($arr)
        {
            unset($arr['_token']);
            return self::create($arr);
        }

        public static function delOne($id)
        {
             return self::destroy($id);
        }

        public static function  getRole($id)
        {
        // echo $id;die;
        $roleAdminData= DB::table('admin_role')->where('roleId',"$id")->get()->toArray();
         $adminId=[];
        foreach ($roleAdminData as $key => $value) {
               $adminId[]= $value->adminId;

        }
        $adminIn=DB::table('admin')->whereIn("adminId",$adminId)->get()->toArray();
        $notAdmin=DB::table('admin')->whereNotIn('adminId',$adminId)->get()->toArray();
        $adminIn=json_decode(json_encode($adminIn),true);
        $notAdmin=json_decode(json_encode($notAdmin),true);
        $data['adminIn']=$adminIn;
        $data['notAdmin']=$notAdmin;
        return $data;
        }

        public static function addUser($role_id, $user_id) {
        $data = [
            'adminId' => $user_id,
            'roleId' => $role_id
        ];

        $isHas = DB::table('admin_role')->where('adminId',$data['adminId'])->where('roleId',$data['roleId'])->get()->toArray();

        if(!empty($isHas)){
            echo '用户已存在当前用户组';
            return false;
        }
        $res = DB::table('admin_role')->insert($data);
        if($res){
            return true;
        }
        $this->error = '添加失败';
        return false;
    }


    public static function getRoleNodes($id){
        $roleNodes = DB::table('role_node')->where('roleId',$id)->get()->toArray();
        $roleNodes=json_decode(json_encode($roleNodes),true);
        $newRoleNodes=[];
        foreach ($roleNodes as $key => $value) {
            $newRoleNodes[]=$value['nodeId'];

        }
        $allNodes =json_decode(json_encode(DB::table('node')->get()->toarray()),true);
        $data=array('role_node'=>$newRoleNodes,'all_node'=>$allNodes);
       return $data;

    }

    public static function addNode($role_id,$node_ids)
    {

            foreach($node_ids as &$val){
                $val = [
                 'roleId' => $role_id,
                 'nodeId' => $val
                ];
            }
            $res = json_decode(json_encode(DB::table('role_node')->where("roleId",$role_id)-> get()),true);
            foreach ($res as $key => $value) {
                $nodeIds[]=$value['nodeId'];
            }
            if($res)
            {
                if(!DB::table('role_node')->where("roleId",$role_id)->whereIn("nodeId",$nodeIds)->delete())
                {

                    return '删除失败';
                }
            }

            if(!DB::table('role_node')->insert($node_ids)){
               return '添加失败';
            }
            return true;

    }

public static function authUser($adminId,$controller,$action)
    {
        $role_id = DB::table('admin_role')->where('adminId',$adminId)-> get()->toArray();
        $roleId=array_column(json_decode(json_encode($role_id),true),'roleId');

        $node_id = DB::table('node')->where('controller',$controller)->where('action',$action)->get();
        $nodeId=array_column(json_decode(json_encode($node_id),true),'nodeId');
        if(!$role_id || !$node_id){
            return false;
        }
        $node=DB::table('role_node')->where('roleId',$roleId)->where('nodeId',$nodeId)->get();
        $nodeArr=json_decode(json_encode($node),true);
        return $nodeArr;
    }

}