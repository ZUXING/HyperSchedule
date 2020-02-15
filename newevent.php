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
	<link href="css/newevent.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="css/noCSS3.js"></script>
	
	<link type="text/css" href="./css/jquery.marquee.css" rel="stylesheet" title="default" media="all" />
	<script type="text/javascript" src="./js/jquery-1.4a2.min.js"></script>
	<script type="text/javascript" src="./js/jquery.marquee.js"></script>
</head>
<script>
	function timeselect(i,mode){
		var date = new Date();
		this.year = date.getFullYear();
		this.month = date.getMonth() + 1;
		this.date = date.getDate();
		this.hour = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
		this.minute = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
		this.second = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
		switch (mode){
			case 1:this.modetime=this.year;break;
			case 2:this.modetime=this.month;break;
			case 3:this.modetime=this.date;break;
			case 4:this.modetime=this.hour;break;
			case 5:this.modetime=this.minute;break;
		}
		if(i==this.modetime)return(" selected=\"selected\"");
		else return("");
	}
</script>
<body><div id="viewlayer">
	<div class="body" id="header">
		<a href="newevent.php"><div id="add">左按钮</div></a><!--左按钮-->
		<!--<ul id="title" class="marquee"><!--中间字幕-->
			<!--<li style="line-height: 32px;">
				今天的任务，你还有4件事情，保持好的生活节奏~如果电脑端没有触摸屏，也没有滚轮，请使用Page Up/Down键翻动列表。今天的任务，你还有4件事情，保持好的生活节奏~如果电脑端没有触摸屏，也没有滚轮，请使用Page Up/Down键翻动列表。
		</li></ul>-->
		<div id="right">右按钮</div><!--右按钮-->
    </div>
	
	<div class="body" id="newevent">
		<?php
            //数据库连接
			include 'function/DBConnect.php';
			//数据库准备
            //选择表-已经发生过的事情
            $Event_Query=odbc_do($TTCON,"SELECT Do,EventTime,Tag FROM 1992599855 WHERE Do<>'' AND EventDate>Date()-1 AND EventDate<Date()+1");//选择课程表天数、时间表并筛选，选择日程表内容和时间表并筛选，最后按照时间排序
            //循环输出每一件发生过的事情
			for($i=1;odbc_fetch_into($Event_Query,$outArray,$i);$i++) {
                echo "<div class='eventli'><span class='timetable'>" .
                    substr($outArray[1], -8, 5) .
                    "</span>" . iconv('gb2312', 'utf-8', $outArray[0]) . "</div>";
            }
		?>
        <form action="Server.Do/newevent.php" method="post">
        安排计划：<input type="text" name="Do"><br/>
        日期：<select name="year"><script>var i;
			for(i=1970;i<=2038;i++)document.write("<option value="+i+timeselect(i,1)+">"+i+"</option>");
				</script></select>年
				<select name="month"><script>var i;
			for(i=0;i<=12;i++)document.write("<option value="+i+timeselect(i,2)+">"+i+"</option>");
				</script></select>月
				<select name="day" id="day"><script>var i;
			for(i=0;i<=31;i++)document.write("<option name=\"day\" value="+i+timeselect(i,3)+">"+i+"</option>");
				</script></select>日<button type="button" onclick="btnDay()">
				明天</button><br/>
		时间：<select name="hr"><script>var i;
			for(i=0;i<=23;i++)document.write("<option value="+i+timeselect(i,4)+">"+i+"</option>");
				</script></select>点
				<select name="min"><script>var i;
			for(i=0;i<=59;i++)document.write("<option value="+i+timeselect(i,5)+">"+i+"</option>");
				</script></select>分<br/>
        备注：<input type="text" name="Tag">
        <input type="submit" value="   好   ">
        </form>
  </div>
	<div class="body" id="footer">
		<div id="ft1">今天</div>
		<div id="ft2">课程表</div>
		<div id="ft3">烂笔头</div>
		<div id="ft4">我</div>
	</div>
</div></body>
<script>
	var today = document.getElementById("day").selectedIndex;
	function btnDay(){
		document.getElementById("day").selectedIndex = today + 1;
	}
</script>
</html>
