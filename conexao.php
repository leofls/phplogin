<?php
//DB Information
define('SERVER', 'localhost');
define('BANCO', 'login');
define('USER', 'root');
define('SENHA', '');


//DB conect
$pdo = new PDO('mysql: host='.SERVER.'; dbname='.BANCO, USER, SENHA);
?>