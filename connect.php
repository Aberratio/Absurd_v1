<?php
$host = "sql8.netmark.pl";
$db_user = "filipmar_asia";
$db_password = "asia123";
$db_name = "filipmar_asia";

$con = mysqli_connect($host, $db_user, $db_password, $db_name) or die("Connection was not established");

$con->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
$con->query("SET CHARSET utf8");
