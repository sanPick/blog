<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//	return view('welcome');
//});
//前台
Route::get('/','Home\IndexController@index');//首页
Route::any('curl_knowledge','Home\IndexController@curl_knowledge');//理财知识采集
Route::any('curl_media','Home\IndexController@curl_media');//媒体报道采集
Route::get('summary','Home\IndexController@summary');//关于我们
Route::get('helper','Home\IndexController@helper');//关于我们
//已修改
Route::get('register','Home\RegisterController@index');//注册
Route::any('login','Home\IndexController@login');//登陆

//后台
Route::any('a','Admin\IndexController@index');//首页
Route::any('admin_recharge','Admin\UserController@recharge_list');//用户充值记录
Route::any('admin_recharge_update','Admin\UserController@recharge_update');//用户充值记录
Route::any('a_login','Admin\IndexController@login');//登陆
Route::any('adm_logout','Admin\LoginController@adm_logout');//登陆
Route::any('admin_income','Admin\IndexController@admin_income');//网站收益
Route::any('info','Admin\IndexController@info');
Route::any('pass','Admin\IndexController@pass');
Route::any('page','Admin\IndexController@page');
Route::any('adv','Admin\IndexController@adv');
Route::any('book','Admin\IndexController@book');
Route::any('column','Admin\IndexController@column');
Route::any('list','Admin\IndexController@a_list');
Route::any('add','Admin\IndexController@add');
Route::any('cate','Admin\IndexController@cate');
// Route::get('/test/{id?}','TestController@test');
 Route::any('test/aa','TestController@aa');
 Route::match(['get','post'],'/test/add','TestController@add');
 Route::get('test/add_do','TestController@add_do');
 Route::get('test/show','TestController@show');
// Route::resource('my','MyController');

// 前台用户注册
Route::post('regadd','Home\RegisterController@add');
Route::get('regsuc','Home\RegisterController@regsuc');
Route::post('test_unique','Home\RegisterController@test_unique');
Route::get('evip','Home\RegisterController@evip');//完善信息
Route::match(['get','post'],'evipadd','Home\RegisterController@evipadd');//信息添加
Route::post('test_card_unique','Home\RegisterController@test_card_unique');//验证唯一
Route::get('evipsuc','Home\RegisterController@evipsuc');//完善信息成功
Route::any('sms','Home\RegisterController@sms');
Route::any('callback','Home\UserController@callback');
Route::any('perfect_bind','Home\UserController@perfectBind');
Route::any('perfect_reg','Home\UserController@perfectReg');
Route::any('checkuser/{user_name}','Home\UserController@checkUser');
Route::any('checkemail/{email}','Home\UserController@checkEmail');


/**
*   用户中心
*/
Route::any('ucenter','Home\UcenterController@index');//用户中心
Route::any('fund','Home\UcenterController@fund');//用户中心
Route::any('recharge','Home\UcenterController@recharge');//用户充值
Route::any('recharge_list','Home\UcenterController@recharge_list');//用户充值记录
Route::any('wechat/businesspay/{money}','Home\WechatController@businessPay');// 微信充值
Route::any('wechat/queryorder','Home\WechatController@queryOrder');// 微信查询订单API
Route::any('wechat/notifyurl','Home\WechatController@notifyUrl');// 微信异步回调地址
Route::any('wechat/callback','Home\WechatController@callback');// 微信异步回调地址
Route::any('wechat/qrcode','Home\WechatController@qrcode');// 微信异步回调地址


Route::any('invite','Home\UcenterController@invite');//邀请注册
Route::any('binding','Home\UcenterController@binding');//绑定银行卡
Route::any('cash','Home\UcenterController@cash');//银行卡提现
Route::any('binding_sole','Home\UcenterController@binding_sole');//银行卡唯验证
Route::any('Account','Home\UcenterController@Account');//设置账户密码等
Route::any('email_code','Home\UcenterController@email_code');//邮箱发送
Route::any('code_verify','Home\UcenterController@code_verify');//code验证
Route::any('up_tel','Home\UcenterController@up_tel');//手机号修改
Route::any('up_email','Home\UcenterController@up_email');//邮箱修改
Route::any('Up_pwd','Home\UcenterController@Up_pwd');//登录密码修改
Route::any('up_Pay_pwd','Home\UcenterController@up_Pay_pwd');//支付密码修改
Route::any('user_bids','Home\UcenterController@user_bids');//用户投资记录
Route::any('user_pawn','Home\UcenterController@user_pawn');//用户质押物添加
Route::any('user_pawn_add','Home\UcenterController@user_pawn_add');//用户质押物添加
Route::any('user_pawnsuc','Home\UcenterController@user_pawnsuc');//用户质押物成功
Route::any('unsetcok','Home\UcenterController@unsetcok');//用户质押物成功跳转
Route::any('turn','Home\UcenterController@turn');//用户大转盘活动
Route::any('my_red_packets','Home\RedpacketsController@my_red_packets');//我的红包
Route::any('exchange_red_packets','Home\RedpacketsController@exchange_red_packets');//兑换红包
Route::any('red_packets_exchange','Home\RedpacketsController@red_packets_exchange');//兑换历史

Route::any('repayment','Home\UcenterController@repayment');//还款计划

Route::any('lend','Home\UcenterController@lend');//

//用户逾期还款计算
Route::any('overdue','Home\ProjectController@Overdue');

//前台我要投资项目列表
Route::any('home_loan_list','Home\LoanController@home_loan_list');//投资列表
Route::any('loan_list_search','Home\LoanController@loan_list_search');//投资列表搜索
Route::any('item_info','Home\LoanController@item_info');//投资详情
Route::post('pay_pass_check','Home\LoanController@pay_pass_check');//投资支付密码验证

//后台我要投资项目列表
Route::any('loan','Admin\LoanController@loan_list');
Route::get('loan_search','Admin\LoanController@loan_search');
Route::get('loan_check','Admin\LoanController@loan_check');
Route::get('cate_change','Admin\LoanController@cate_change');










/**
 * 前台登录
 * 
 */
//验证码
Route::get('user/getverify', 'Home\UserController@getVerify');
Route::post('user/login','Home\UserController@loginPro');
Route::get('user/logout','Home\UserController@logout');
Route::any('callback','Home\UserController@callback');

//文章管理
Route::any('article_list','Admin\ArticleController@article_list');
Route::any('article_add','Admin\ArticleController@article_add');
Route::any('article_del','Admin\ArticleController@article_del');
Route::any('article_update','Admin\ArticleController@article_update');

//新闻管理
Route::any('news_list','Admin\NewsController@news_list');
Route::any('news_del','Admin\NewsController@news_del');
Route::any('news_update','Admin\NewsController@news_update');

//轮播图管理
Route::any('adv','Admin\AdvController@adv');
Route::any('adv_add','Admin\AdvController@adv_add');
Route::any('adv_del','Admin\AdvController@adv_del');
Route::any('adv_update','Admin\AdvController@adv_update');


//后台用户管理
Route::get('user','Admin\UserController@index');// 用户列表展示
Route::get('userinfo/{id}','Admin\UserController@getInfo')
->where('id', '[0-9]+');// 用户信息查看
Route::get('usercheck/{id}','Admin\UserController@userCheck')
->where('id', '[0-9]+');// 管理员审核身份信息页面
Route::match(['get','post'],'recall','Admin\UserController@recall');//七天未登录召回

//抵押物管理
Route::any('pledge_list','Admin\PledgeController@pledge_list');
//质押物验证
Route::any('is_check','Admin\PledgeController@is_check');

Route::any('red_packets_list','Admin\RedpacketsController@red_packets_list');//用户红包管理
Route::get('red_packets_add','Admin\RedpacketsController@red_packets_add');//红包生成
Route::get('red_packets_add_do','Admin\RedpacketsController@red_packets_add_do');//红包生成
Route::get('red_packets_addlist','Admin\RedpacketsController@red_packets_addlist');//红包列表


//Route::any();//登陆
Route::match(['get','post'],'a_login','Admin\LoginController@login');
Route::match(['get','post'],'site','Admin\LoginController@site');
Route::match(['get','post'],'uppw','Admin\AdminController@up_pw');




//权限添加
Route::any('node_add','Admin\NodeController@node_add');
//角色添加
Route::any('role_add','Admin\RoleController@role_add');
Route::any('add_role_rn','Admin\RoleController@add_role_rn');
Route::any('admin_note','Admin\RoleController@admin_note');
//管理员日志
Route::any('admin_log','Admin\RoleController@admin_log');
Route::any('log_del','Admin\RoleController@log_del');
//管理员添加
Route::any('admin_add','Admin\RoleController@admin_add');
//角色列表
Route::any('role_list','Admin\RoleController@role_list');
//后台导航
Route::any('adm_nav','Admin\NevController@index');
Route::any('nev_list','Admin\NevController@nev_list');
Route::any('nev_upd','Admin\NevController@nev_upd');
Route::any('nev_del/{id}','Admin\NevController@nev_del');
Route::any('adm_nav_save','Admin\NevController@adm_nav_save');




Route::get('userexport','Admin\ExcelController@export');
Route::get('userimport','Admin\ExcelController@import');





//关于我们
Route::any('about_websites','Home\AboutController@about_websites');// //网站公告
Route::any('about_jianjie','Home\AboutController@about_jianjie');// //公司简介
Route::any('about_guanli_team','Home\AboutController@about_guanli_team');  // 管理团队
Route::any('about_media_coverage','Home\AboutController@about_media_coverage');// 媒体报道
Route::any('about_hz_partner','Home\AboutController@about_hz_partner');// 合作伙伴
Route::any('about_team_style','Home\AboutController@about_team_style');// 团队风采
Route::any('about_law_policy','Home\AboutController@about_law_policy'); // 法律政策
Route::any('about_law_statement','Home\AboutController@about_law_statement'); // 法律声明
Route::any('about_zifei_explain','Home\AboutController@about_zifei_explain'); // 资费说明
Route::any('about_recruit','Home\AboutController@about_recruit'); // 招贤纳士
Route::any('about_contact_us','Home\AboutController@about_contact_us'); // 联系我们


Route::any('forget_pass','Home\ForgetController@forget_pass'); // 忘记密码
Route::any('forget_pass_do','Home\ForgetController@forget_pass_do');
Route::any('forget_pass3','Home\ForgetController@forget_pass3');
Route::any('send_email','Home\ForgetController@send_email');//发送邮件
Route::any('check_code','Home\ForgetController@check_code');//验证验证码
Route::any('forget_pass4','Home\ForgetController@forget_pass4');
Route::any('up_pwd','Home\ForgetController@up_pwd');//修改密码


Route::any('calculator','Home\ForgetController@calculator');//计算器

Route::any('cache_clean','Admin\AdminController@cache_clean');//清除缓存

