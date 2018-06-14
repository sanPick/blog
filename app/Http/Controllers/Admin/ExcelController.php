<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Excel;
use DB;
class ExcelController extends CommonController
{
    //Excel文件导出功能 By Laravel学院
    public function export(){
        $columns = Schema::getColumnListing('users');
        unset($columns['2']);
        unset($columns['5']);
        unset($columns['9']);

        $user_data = DB::table('users')->select('user_id','user_name','tel','email','create_time','last_ip','last_time','over_info')->get();
        foreach($user_data as $k=>$v){
            foreach($v as $x=>$y){
                $user_arr[$k][] = $y;  
            }
        }
        $cellData = [
            $columns, 
        ];
        foreach($user_arr as $k=>$v){
            $cellData[] = $v;
        }
        //如果你要导出csv或者xlsx文件，只需将export方法中的参数改成csv或xlsx即可。
        Excel::create('二十二世纪金融用户',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }
}
