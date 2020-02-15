<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>待完成-任务计划表</title>
    <!--移动端强制全视图 禁止页面缩放-->
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <!--移动端强制全视图 禁止页面缩放-->
<link href="css/global.css" rel="stylesheet" type="text/css">
</head>

<body><div id="viewlayer">
	<div class="body" id="header"><div id="add"></div><div id="title"><!--<marquee>今天的任务，你还有4件事情，保持好的生活节奏~如果电脑端没有触摸屏，也没有滚轮，请使用Page Up/Down键翻动列表</marquee>--></div><div id="right"></div></div>
	<div class="body" id="schedule">
		<?php
            include 'function/Uodbc_num_rows.php';
            //数据库连接
			$TTDB="DRIVER=Microsoft Access Driver (*.mdb);DBQ=".realpath("C:/DB_HyperSchedule/DB_TimeTable.mdb");
			$TTCON=odbc_connect($TTDB,"","",SQL_CUR_USE_ODBC );
			//数据库准备
            //选择表-已经发生过的事情
            $Past_Query=odbc_do($TTCON,"SELECT Day".date('w')." ,TimeTable , Meta".date('w')." FROM 1992599855 
                        IN 'C:\DB_HyperSchedule\DB_ClassTable.mdb' WHERE Day".date('w')."<>'' AND TIMETABLE<TIME() 
                        UNION SELECT Do,Time,Tag FROM 1992599855 WHERE Do<>'' AND TIME<TIME() AND Date=Date()
                        Order by TIMETABLE;");//选择课程表天数、时间表并筛选，选择日程表内容和时间表并筛选，最后按照时间排序
            //循环输出每一件发生过的事情
			for($i=1;odbc_fetch_into($Past_Query,$outArray,$i);$i++)
			{
                echo "<div class='finished'><span class='timetable'>" .
                    substr($outArray[1],-8,5) .
                    "</span>" . iconv('gb2312', 'utf-8', $outArray[0]) . "</div>";
			}
			//选择表-接下来要做的事情
			//$Future_Query=odbc_do($TTCON,"SELECT * FROM [1992599855] WHERE Date = Date() AND TIME >= Time() ORDER BY TIME");
            $Future_Query=odbc_do($TTCON,"SELECT Day".date('w')." ,TimeTable , Meta".date('w')." FROM 1992599855 
                        IN 'C:\DB_HyperSchedule\DB_ClassTable.mdb' WHERE Day".date('w')."<>'' AND TIMETABLE>=TIME() 
                        UNION SELECT Do,Time,Tag FROM 1992599855 WHERE Do<>'' AND TIME>=TIME() AND Date=Date()
                        Order by TIMETABLE;");//选择课程表天数、时间表并筛选，选择日程表内容和时间表并筛选，最后按照时间排序
            //echo Uodbc_num_rows($Past_Query)+Uodbc_num_rows($Future_Query);
            //先输出要做的第一件事
            odbc_fetch_into($Future_Query,$outArray,1);
            echo "<div class=\"schedule\" id=\"current\">
                    <div id=\"moreinfo\">下一个要做的事情 ". substr($outArray[1],-8,5) ."</div>
                    <div id=\"currtitle\">".iconv('gb2312', 'utf-8', $outArray[0])."</div>
                    <div id=\"moreinfo\">".iconv('gb2312', 'utf-8', $outArray[2])."</div>
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
</div></body>
</html>
