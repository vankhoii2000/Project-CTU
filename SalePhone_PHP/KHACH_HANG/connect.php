<?php
$config = require 'config/data.php';
$connect = mysqli_connect($config['host'],$config['user'],$config['password'],$config['name']);
$connect->set_charset("utf8");
?>