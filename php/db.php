<?php
/* Conexão banco de dados */
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'hifreela';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
