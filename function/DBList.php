<?php
    $Past_Query=odbc_do($TTCON,"SELECT Day".(date('w')+1)." ,TimeTable , Meta".(date('w')+1)." FROM ".$_COOKIE["activeUID"]." 
                        IN 'C:\DB_HyperSchedule\DB_ClassTable.mdb' WHERE Day".(date('w')+1)."<>'' AND TIMETABLE<TIME() 
                        UNION SELECT Do,EventTime,Tag FROM ".$_COOKIE["activeUID"]." WHERE EventTime<TIME() AND EventDate=Date()
                        Order by TIMETABLE;");
    $Future_Query=odbc_do($TTCON,"SELECT Day".(date('w')+1)." ,TimeTable , Meta".(date('w')+1)." FROM ".$_COOKIE["activeUID"]." 
                        IN 'C:\DB_HyperSchedule\DB_ClassTable.mdb'WHERE Day".(date('w')+1)."<>'' AND TIMETABLE>=TIME()
                        UNION SELECT Do,EventTime,Tag FROM ".$_COOKIE["activeUID"]." WHERE EventTime>=TIME() AND EventDate=Date()
                        Order by TIMETABLE;");
			//选择课程表天数、时间表并筛选，选择日程表内容和时间表并筛选，最后按照时间排序
?>