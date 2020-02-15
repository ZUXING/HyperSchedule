<?php
	$TTDB="DRIVER=Microsoft Access Driver (*.mdb);DBQ=".realpath("C:/DB_HyperSchedule/DB_TimeTable.mdb");
    $TTCON=odbc_connect($TTDB,"","",SQL_CUR_USE_ODBC );
	$event_date=$_POST['year']."/".$_POST['month']."/".$_POST['day'];
    $event_time=$_POST['hr'].":".$_POST['min'];
    $Do=iconv('utf-8', 'gb2312',$_POST['Do']);
    $Tag=iconv('utf-8', 'gb2312',$_POST['Tag']);
	$newevent = "insert into 1992599855(Do,EventTime,EventDate,Tag) values('{$Do}',#$event_time#,#$event_date#,'{$Tag}')";
	odbc_do($TTCON, $newevent);
?>
	<script>
		alert("添加成功");
	</script>
<?php
    header("location: ../index.php");
?>