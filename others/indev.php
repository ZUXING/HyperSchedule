<?php
$TTDB="DRIVER={Microsoft Access Driver (*.mdb)};Dbq=".realpath("C:/DB_HyperSchedule/DB_TimeTable.mdb");
$TTCON=odbc_pconnect($TTDB,"","",SQL_CUR_USE_ODBC );
$Past_Query=odbc_do($TTCON," SELECT Do,EventTime,Tag FROM 1992599855  Order by EventTime;");

for($i=1;odbc_fetch_into($Past_Query,$outArray,$i);$i++)
			{
                echo "<div class='schedule'><span class='timetable'>" .
                    substr($outArray[1],-8,5) .
                    "</span>" . iconv('gb2312', 'utf-8', $outArray[0]) . "</div>";
			}
?>
WHERE Day".date('w')."<>'' AND TIMETABLE<TIME()
WHERE Do<>'' AND TIME<TIME() AND Date=Date()
WHERE Day".date('w')."<>'' AND TIMETABLE>=TIME()
WHERE Do<>'' AND TIME>=TIME() AND Date=Date()