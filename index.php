<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>待完成-任务计划表</title>
    <!--移动端强制全视图 禁止页面缩放-->
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!--移动端强制全视图 禁止页面缩放-->
	<link href="css/global.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="css/noCSS3.js"></script>
	
	<link type="text/css" href="./css/jquery.marquee.css" rel="stylesheet" title="default" media="all" />
	<script type="text/javascript" src="./js/jquery-1.4a2.min.js"></script>
	<script type="text/javascript" src="./js/jquery.marquee.js"></script>
	<style>body{font-family: 'ZUXINGHW';}</style>
</head>

<body><div id="viewlayer">
	<!--头部-->
	<div class="body" id="header">
		<a href="newevent.php"><div id="add">左按钮</div></a><!--左按钮-->
		<!--<ul id="title" class="marquee"><!--中间字幕-->
			<!--<li style="line-height: 32px;">
				今天的任务，你还有4件事情，保持好的生活节奏~如果电脑端没有触摸屏，也没有滚轮，请使用Page Up/Down键翻动列表。今天的任务，你还有4件事情，保持好的生活节奏~如果电脑端没有触摸屏，也没有滚轮，请使用Page Up/Down键翻动列表。
		</li></ul>-->
		<div id="right">右按钮</div><!--右按钮-->
	</div>
        
	<div class="body" id="schedule">
		<?php
            //数据库连接
            include 'function/DBConnect.php';
            include 'function/DBList.php';
            //选择表-已经发生过的事情
            //循环输出每一件发生过的事情
			for($i=1;odbc_fetch_into($Past_Query,$outArray,$i);$i++)
			{
                echo "<div class='finished'><span class='timetable'>" .
                    substr($outArray[1],-8,5) .
                    "</span>" . iconv('gb2312', 'utf-8', $outArray[0]) . "</div>";
			}
			//选择表-接下来要做的事情
            //先输出要做的第一件事
            odbc_fetch_into($Future_Query,$outArray,1);
            echo "<div class='schedule' id='current'>
                    <div id='moreinfo'>下一个要做的事情 ". substr($outArray[1],-8,5) ."</div>
                    <div id='currtitle'>".iconv('gb2312', 'utf-8', $outArray[0])."</div>
                    <div id='moreinfo'>".iconv('gb2312', 'utf-8', $outArray[2])."</div>
                    </div>";
            //输出接下来要做的事情
            for($i=2;odbc_fetch_into($Future_Query,$outArray,$i);$i++)
            {
                echo "<div class='next'><span class='timetable'>" .
                    substr($outArray[1],-8,5) .
                    "</span>" . iconv('gb2312', 'utf-8', $outArray[0]) . "</div>";
            }
		?>
	</div>
	<div class="body" id="footer">
		<div id="ft1">今天</div>
		<div id="ft2">课程表</div>
		<div id="ft3">烂笔头</div>
		<div id="ft4">我</div>
	</div>
</div>
<script>
	$(document).ready(function (){
		$("#title").marquee({yScroll: "top",pauseSpeed: 1500});
	});
</script>
</body>
</html>
