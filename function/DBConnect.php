<?php
    $TTDB="DRIVER=Microsoft Access Driver (*.mdb);DBQ=".realpath("C:/DB_HyperSchedule/DB_TimeTable.mdb");
    $TTCON=odbc_connect($TTDB,"","",SQL_CUR_USE_ODBC );
?>