<?php

namespace App\Http\Controllers\Home;


use Validator;
use App\Http\Controllers\Controller;
use DB;
class AboutController extends CommonController
{

    //网站公告
    public function about_websites()
    {
        return view('home.about_websites');
    }
//
//    公司简介
    public function about_jianjie()
    {
        return view('home.about_jianjie');
    }

    // 管理团队
    public function about_guanli_team()
    {
        return view('home.about_guanli_team');
    }
   // 媒体报道
    public function about_media_coverage()
    {
        return view('home.about_media_coverage');
    }
    // 合作伙伴
    public function about_hz_partner()
    {
        return view('home.about_hz_partner');
    }


    // 团队风采
    public function about_team_style()
    {
        return view('home.about_team_style');
    }
    // 法律政策
    public function about_law_policy()
    {
        return view('home.about_law_policy');
    }

    // 法律声明
    public function about_law_statement()
    {
        return view('home.about_law_statement');
    }

    // 资费说明
    public function about_zifei_explain()
    {
        return view('home.about_zifei_explain');
    }


    // 招贤纳士
    public function about_recruit()
    {
        return view('home.about_recruit');
    }

    // 联系我们
    public function about_contact_us()
    {
        return view('home.about_contact_us');
    }



}