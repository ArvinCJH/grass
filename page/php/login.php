<?php
header("Content-type:text/html;charset=utf-8") ;
require 'util/SqlUtils.php' ;
$uid = $_POST["username"];
$pwd = $_POST["password"];
$sqliteUtil =new SqlUtils() ;
$sqliteUtil->sqlLogin($uid ,$pwd) ;

/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 18-12-15
 * Time: 下午5:43
 */