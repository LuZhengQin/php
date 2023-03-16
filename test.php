<?php
$mysqli = mysql_connect("bj-cynosdbmysql-grp-nofx4lqu.sql.tencentcdb.com:25980","root","Lzqzxc,.","dainsai");

//如果有错误，存在错误号
if (!$mysqli)
{
    die('Could not connect: ' . mysql_error());
} else {
    echo "succeed";
}
