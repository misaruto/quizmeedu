<?php 

$host = 'localhost';
/*
$user = 'root';
$pass = '';
$db = 'bd_jogo';
*/
//pra web

$user = 'id2884356_jogo123';
$pass = 'jogo123';
$db = 'id2884356_bd_jogo';

ini_set('post_max_size', '64M');

$con = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset( $con, 'utf8');
?>
