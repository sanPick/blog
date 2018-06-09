
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Dashboard</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->

</head>

<body>
		<!-- 包含页头 -->
		@include('article.common.header')
			<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="borrowShow"><span class="glyphicon glyphicon-dashboard">借款列表</span></a></li>
			<li class="active"><a href="borrowGram"><span class="glyphicon glyphicon-dashboard">统计图</span></a></li>
			<li class="active"><a href="refundShow"><span class="glyphicon glyphicon-dashboard">还款列表</span></a></li>
			<li class="active"><a href="dealShow"><span class="glyphicon glyphicon-dashboard">交易列表</span></a></li>
			<li class="active"><a href="tradelogShow"><span class="glyphicon glyphicon-dashboard">交易流水</span></a></li>
			<li class="active"><a href="imgAdd"><span class="glyphicon glyphicon-dashboard">轮播图添加</span></a></li>
			<li class="active"><a href="imgShow"><span class="glyphicon glyphicon-dashboard">轮播图列表</span></a></li>
		
		</ul>
		<div class="attribution">More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></div>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
	
			<!-- 继承后插入的内容 -->
			@yield('content')
		</div>
								
		</div><!--/.col-->
	</div><!--/.row-->
</div>	<!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
