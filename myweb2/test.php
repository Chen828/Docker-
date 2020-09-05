<?php
    $con = mysql_connect(getenv("MYSQL_ADDR"),getenv("MYSQL_USER"),getenv("MYSQL_PASS"));
    echo " 1 ";
    if (!$con)
    {
        die('Fail:' . mysql_error());
    }
    else
    {
	echo " 2 ";
        mysql_query("SET NAMES utf8");
        #$mysql_select_db("docker_user", $con);
        $db_selected = mysql_select_db("docker_user", $con);
	#mysql_query("use docker_user");
	
	echo " 3 ";
	if (!$db_selected)
        {
                echo " 4 ";
		die ("Can\'t use database : " . mysql_error());
        }
	echo " 5 ";
        $result = mysql_query("SELECT * FROM port_pass" ,$con);
        if (!$result)
        {
                echo " 4.5 ";
                die ("Can\'t use mysql_query : " . mysql_error());
        }
	echo " 6 ";
	$num = 1;
	while($row = mysql_fetch_array($result))
        {
            echo $num . "<br />";
	    echo $row['port'] . " " . $row['pass'] . "<br />";
	    echo $row[0] . " " . $row[1] . "<br />";
	    $num += 1; 
        }
    }
    echo "Over! ";
    mysql_close($con);
?>
#连接到指定的mysql服务端，查询scores.name_score表，并按每条一行方式输出查询结果。
