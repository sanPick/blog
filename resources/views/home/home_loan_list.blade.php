<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link href="home/css/index.css" rel="stylesheet" type="text/css">
<link href="home/css/detail.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>

</head>
<body>
<?php include('layouts/header.blade.php');?>
<!--列表-->
<div class="page-filter wrap">
  <div class="breadcrumbs"><a href="index.html">首页</a>&gt;<span class="cur">散标投资列表</span></div>
  <div class="invest-filter" data-target="sideMenu">
    <div class="filter-inner clearfix">
      <div class="filter-item">
        <div class="hd">
          <h3>筛选投资项目</h3>
          <label></label>
        </div>
        <input type="hidden" id="_token" value="<?php echo csrf_token(); ?>">
        <div class="search">
          {{--条件start--}}
          @foreach ($config as $key => $val)

          <dl>
            <dt>{{$key}}</dt>
            <dd>
              @foreach ($val as $k => $v)
              <li class="n1"><a href="javascript:void(0);" id="{{$k}}" class="<?php if($v=='不限') echo 'active';?>">{{$v}}</a></li>
              @endforeach
            </dd>
          </dl>
          @endforeach
          {{--条件end--}}




<script>
  /**
   一个用作js模板替换的代码
   template格式和数组格式如下
   var template = "<div><h1>{title}</h1><p>{content}</p></div>";
   var data = [{title:"a",content:"aaaa"},{title:"b",content:"bbb"},{title:"c",content:"ccc"}];
   只需要数据格式对应
   */
  var template = '<div class="item" id="">\
                <ul>\
                  <li class="col-330 col-t">\
                    <a class="f18" href="/item_info?product_id={product_id}">\
                      <td>{title}</td></a></li>\
                  <li class="col-180"><span class="f20 c-333">{total_money}</span>元</li>\
                  <li class="col-110 relative"><span class="f20 c-orange">{rate}%</span></li>\
                  <li class="col-150"> <span class="f20 c-333">{term}</span>个月 </li>\
                  <li class="col-150">{repay_way}</li>\
                  <li class="col-120">\
                    <div class="circle">\
                      <div class="left progress-bar">\
                        <div class="progress-bgPic progress-bfb{progress_flag}">\
                          <div class="show-bar">{progress_bar}% </div>\
                        </div>\
                      </div>\
                    </div>\
                  </li>\
                  <li class="col-120-2"> <a class="ui-btn btn-gray" href="item_info?product_id={product_id}">{staus}</a> </li>\
                </ul>\
              </div>'
    var dataTemplate = function(template,data){
    var outPrint="";
    for(var i = 0 ; i < data.length ; i++){
      var matchs = template.match(/\{[a-zA-Z_]+\}/gi);
      var temp="";
      for(var j = 0 ; j < matchs.length ;j++){
        if(temp == "")
          temp = template;
        var re_match = matchs[j].replace(/[\{\}]/gi,"");
        temp = temp.replace(matchs[j],data[i][re_match]);
      }
      outPrint += temp;
    }
    return outPrint;
  }

  function page(p,where){
    var data = '';
    if (where=='') {
      data = 'page='+p;
    }else{
      data = 'page='+p+'&'+where;
    }
 $.ajaxSetup({  
    async : false  
});
    $.get("loan_list_search", data,function(msg){
      if (msg.success==1){
        var _data = [];
        $.each(msg.list, function(i, v) {
          switch (v.repay_way)
          {
            case 1:
              x="等额本息";
              break;
            case 2:
              x="到期本息";
              break;
          }
          if (v.total_money*1> v.real_money*1){
            y = "投标中";
          }else{
            y = "已满标";
          }
          q = Math.round(v.real_money*10/v.total_money);
          s = changeTwoDecimal_f(v.real_money*100/v.total_money);
          _data.push({
            'product_id': v.product_id,
            'title': v.title,
            'total_money': v.total_money,
            'rate': v.rate,
            'term': v.term,
            'repay_way': x,
            'progress_flag': q,
            'progress_bar': s,
            'staus': y,
          })
        });

        $('#box').html(dataTemplate(template,_data));
        $('#page').html(msg.str_page);
      }else{
        $('#box').html('');
        $('#page').html('');
      }
    },'json');
  }
  function changeTwoDecimal_f(x) {
      var f_x = parseFloat(x);
      if (isNaN(f_x)) {
          alert('function:changeTwoDecimal->parameter error');
          return false;
      }
      var f_x = Math.round(x * 100) / 100;
      var s_x = f_x.toString();
      var pos_decimal = s_x.indexOf('.');
      if (pos_decimal < 0) {
          pos_decimal = s_x.length;
          s_x += '.';
      }
      while (s_x.length <= pos_decimal + 2) {
          s_x += '0';
      }
      return s_x;
  }
  $(document).ready(function(){
    // 页面加载
    page(1,'');
    // 多条件的ajax
    $(".search a").click(function () {
      $(this).addClass("active").parent().siblings().children().removeClass("active");
      var str = [];
      var obj = $('.search a[class=active]');
      $.each(obj, function(i, v){
        str.push($(v).attr('id'));
      });
      data = str.join('&');

      page(1,data);
    });
    // 排序的ajax
    $('#order_list a').click(function(){
      var _this = $(this);
      var order = '';
      if(_this.hasClass('desc')){
        order = 'asc';
        _this.removeClass();
        _this.addClass(order);
        _this.parent().siblings().children().removeClass();
      }else{
        order = 'desc';
        _this.removeClass();
        _this.addClass(order);
        _this.parent().siblings().children().removeClass();
      }
      var str = [];
      var obj = $('.search a[class=active]');
      str.push("order_filed="+_this.attr('name'));
      str.push("order="+order);
      $.each(obj, function(i, v){
        str.push($(v).attr('id'));
      });
      data = str.join('&');

      page(1,data);
    })




  });
</script>


          <body>


          </body>
        </div>
      </div>





      <div class="common-problem">
        <h3>常见问题</h3>
        <ul>
          <li><a href="#">什么是债权贷？</a></li>
          <li><a href="#">关于"债权贷"产品的说明</a></li>
          <li><a href="#">易贷网P2P理财收费标准</a></li>
          <li><a href="#">债权贷和房易贷、车易贷有什么区别？</a></li>
        </ul>
      </div>
    </div>

</div>
  <div class="invest-list mrt30 clearfix">
    <div class="hd">
      <h3>投资列表</h3>
      <div class="count">
        <ul>
          <li class="line">散标投资交易金额&nbsp;&nbsp;<span class="f20 bold">{{$total_money}}元</span></li>
          <li>累计赚取收益&nbsp;&nbsp;<span class="f20 bold">{{$total_user_grows}}元</span></li>
        </ul>
      </div>
    </div>
    <div class="bd">
      <div class="invest-table clearfix">
        <div class="title clearfix">
          <ul id="order_list">
            <li class="col-330">借款标题</li>
            <li class="col-180"><a href="javascript:void(0);" name="total_money" class="">借款金额</a> </li>
            <li class="col-110"><a href="javascript:void(0);" name="rate" class="">年利率</a> </li>
            <li class="col-150"><a href="javascript:void(0);" name="term" class="">借款期限</a> </li>
            <li class="col-150">还款方式</li>
            <li class="col-120">借款进度</li>
            <li class="col-120-t">操作</li>
          </ul>
        </div>

        <!------------投资列表-------------->




    <span id="box">

     </span>
        <!------------投资列表-------------->
      </div>


      {{--分页--}}
      <div id="page">

      </div>


    </div>
  </div>
</div>




<!--网站底部-->
<?php include('layouts/foot.php') ?>
</body>
</html>
<script>



</script>







</div>



