<?php
    function Uodbc_num_rows($resource){
        for($i=1;odbc_fetch_into($resource,$outArray,$i);$i++);
        return $i-1;
    }
?>