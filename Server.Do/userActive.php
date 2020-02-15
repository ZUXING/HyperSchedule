<?php

	/*if(!isset($_POST['submit'])){  
		exit('No cookie : (');
		header("location: ../index.php");
	}*/
	//isset = 检测变量是否设置

	$activeUID = 1992599855;//$_POST['activeUID'];  
	//$activeUPWD = MD5($_POST['activeUPWD']); 

	$UDB="DRIVER=Microsoft Access Driver (*.mdb);DBQ=".realpath("C:/DB_HyperSchedule/DB_User.mdb");
    $UCON=odbc_connect($UDB,"","",SQL_CUR_USE_ODBC );
	//$userActive = "Select UID,UPWD FROM UserID where UID={$activeUID} and UPWD={$activeUPWD}";
	$userActive = odbc_do($UCON,"Select UID,UPWD FROM UserID where UID='$activeUID'");//without password - !only for SU
	
	if($result = odbc_fetch_array($userActive)){
		setcookie("activeUID", $activeUID, time()+60, "/");
	}
?>
<?php
    //header("location: ../index.php");
?>