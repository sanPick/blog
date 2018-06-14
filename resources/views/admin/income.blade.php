<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="admin/css/pintuer.css">
<link rel="stylesheet" href="admin/css/admin.css">
<script src="admin/js/jquery.js"></script>
<script src="admin/js/pintuer.js"></script>

<meta charset="utf-8"><link rel="icon" href="https://static.jianshukeji.com/highcharts/images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://img.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>
<script src="https://img.hcharts.cn/highcharts/highcharts.js"></script>
<script src="https://img.hcharts.cn/highcharts/modules/exporting.js"></script>
<script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
<script src="https://img.hcharts.cn/highcharts/themes/sand-signika.js"></script>
</head>
<body>

<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 网站收益</strong></div>
  <div class="body-content">
    <div id="container" style="min-width:400px;height:400px"></div>
  </div>
</div>
</body>


<script>
  $(function () {
    $('#container').highcharts({
      chart: {
        type: 'line'
      },
      title: {
        text: '网站收益'
      },

      xAxis: {
        categories: [
          "<?php echo substr(date('Y-m-d',$arr[0]['date']),-5) ?>",
          "<?php echo substr(date('Y-m-d',$arr[1]['date']),-5) ?>",
          "<?php echo @substr(date('Y-m-d',$arr[2]['date']),-5) ?>",
          "<?php echo @substr(date('Y-m-d',$arr[3]['date']),-5) ?>",
          "<?php echo @substr(date('Y-m-d',$arr[4]['date']),-5) ?>",
          "<?php echo @substr(date('Y-m-d',$arr[5]['date']),-5) ?>",
          "<?php echo @substr(date('Y-m-d',$arr[6]['date']),-5) ?>"
        ]
      },
      yAxis: {
        title: {
          text: ''
        }
      },
      plotOptions: {
        line: {
          dataLabels: {
            enabled: true          // 开启数据标签
          },
          enableMouseTracking: false // 关闭鼠标跟踪，对应的提示框、点击事件会失效
        }
      },
      series: [{
        name: 'pv*100',
        data: [
          <?php echo isset($arr[0]['pv'])?$arr[0]['pv']*10:0 ;?>,
          <?php echo isset($arr[1]['pv'])?$arr[1]['pv']*10:0 ;?>,
          <?php echo isset($arr[2]['pv'])?$arr[2]['pv']*10:0 ;?>,
          <?php echo isset($arr[3]['pv'])?$arr[3]['pv']*10:0 ;?>,
          <?php echo isset($arr[4]['pv'])?$arr[4]['pv']*10:0 ;?>,
          <?php echo isset($arr[5]['pv'])?$arr[5]['pv']*10:0 ;?>,
          <?php echo isset($arr[6]['pv'])?$arr[6]['pv']*10:0 ;?>
        ]
      }, {
        name: 'uv*100',
        data: [
          <?php echo isset($arr[0]['uv'])?$arr[0]['uv']*100:0 ;?>,
          <?php echo isset($arr[1]['uv'])?$arr[1]['uv']*100:0 ;?>,
          <?php echo isset($arr[2]['uv'])?$arr[2]['uv']*100:0 ;?>,
          <?php echo isset($arr[3]['uv'])?$arr[3]['uv']*100:0 ;?>,
          <?php echo isset($arr[4]['uv'])?$arr[4]['uv']*100:0 ;?>,
          <?php echo isset($arr[5]['uv'])?$arr[5]['uv']*100:0 ;?>,
          <?php echo isset($arr[6]['uv'])?$arr[6]['uv']*100:0 ;?>
        ]
      },{
        name: 'π',
        data: [
          <?php echo isset($arr[0]['income'])?$arr[0]['income']:0 ;?>,
          <?php echo isset($arr[1]['income'])?$arr[1]['income']:0 ;?>,
          <?php echo isset($arr[2]['income'])?$arr[2]['income']:0 ;?>,
          <?php echo isset($arr[3]['income'])?$arr[3]['income']:0 ;?>,
          <?php echo isset($arr[4]['income'])?$arr[4]['income']:0 ;?>,
          <?php echo isset($arr[5]['income'])?$arr[5]['income']:0 ;?>,
          <?php echo isset($arr[6]['income'])?$arr[6]['income']:0 ;?>
        ]
      }
      ]
    });
  });
</script>
