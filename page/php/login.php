<?php
require 'util/SqlUtils.php' ;
$uid = $_POST["username"];
$pwd = $_POST["password"];
$sqliteUtil =new SqlUtils() ;
$sqliteUtil->sqlLogin($uid ,$pwd) ;

//$uid = $_GET["username"];
//$pwd = $_GET["password"];

    ////造连接对象
    //$db = new MySQLi("localhost","grass","123456","shop");
    ////$db = mysqli_connect("localhost","test","123456","shop");
    ////$db = mysqli_connect($mysql_conf['localhost'], $mysql_conf['root'], $mysql_conf['root']);
    //if (!$db){
    //    die("could not connect:".mysqli_error()) ;
    //}

//写SQL语句

//$sql = "select userpass from user_table where username='{$uid}'";
    ////执行SQL语句
    //$reslut = $db->query($sql);
    //
    //$n = $reslut->fetch_row();
    //
    //if($uid!="" && $pwd !="" )
    //{
    //    if($n[0]==$pwd)
    //    {
    ////        header("location:main.php");
    //        echo "登录成功！";
    //        header('Location: localhost');    // 跳页面
    //    }
    //    else
    //    {
    //        echo "用户名或密码错误！";
    //    }
    //}
    //else
    //{
    //    echo "用户名密码不能为空";
    //}
    //mysqli_close($db) ;
/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 18-12-15
 * Time: 下午5:43
 */