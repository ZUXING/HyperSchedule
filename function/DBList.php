<?php
    $Past_Query=odbc_do($TTCON,"SELECT Day".(date('w')+1)." ,TimeTable , Meta".(date('w')+1)." FROM ".$_COOKIE["activeUID"]." 
                        IN 'C:\DB_HyperSchedule\DB_ClassTable.mdb' WHERE Day".(date('w')+1)."<>'' AND TIMETABLE<TIME() 
                        UNION SELECT Do,EventTime,Tag FROM ".$_COOKIE["activeUID"]." WHERE EventTime<TIME() AND EventDate=Date()
                        Order by TIMETABLE;");
    $Future_Query=odbc_do($TTCON,"SELECT Day".(date('w')+1)." ,TimeTable , Meta".(date('w')+1)." FROM ".$_COOKIE["activeUID"]." 
                        IN 'C:\DB_HyperSchedule\DB_ClassTable.mdb'WHERE Day".(date('w')+1)."<>'' AND TIMETABLE>=TIME()
                        UNION SELECT Do,EventTime,Tag FROM ".$_COOKIE["activeUID"]." WHERE EventTime>=TIME() AND EventDate=Date()
                        Order by TIMETABLE;");
			//ѡ��γ̱�������ʱ���ɸѡ��ѡ���ճ̱����ݺ�ʱ���ɸѡ�������ʱ������
?>