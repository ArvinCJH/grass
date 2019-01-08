<?php

/**
 * 删除
 * */


$uid = $_POST["username"] ;
$pwd = $_POST["password"] ;
$email = $_POST["envelope"] ;
$db = new MySQLi("localhost","grass","123456","shop");
if ($db->connect_error){
    die("could not connect:".mysqli_error()) ;
}

//$sql = "insert into user_insert_test (username ,userpass ,user_email) values ($uid ,$pwd ,$email)";
$sql = "INSERT INTO user_table (username, userpass, user_email)
VALUES ('$uid', '$pwd', '$email')";

if ($db ->query($sql)  ===TRUE){
    echo "记录插入成功" ;
}else{
    echo "Error:".$sql ."<br>".$db ->error ;
}

$db ->close() ;

/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 18-12-21
 * Time: 下午10:10
 */