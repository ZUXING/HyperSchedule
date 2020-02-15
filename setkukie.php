<?php
	setcookie("activeUID", 1992599855, time()+60);
		//cookie名字, 值, [有效期], [有效路径], [域名]
		//设置一个n秒过期的cookie，可以使用time()函数
	echo("Done!");
?>