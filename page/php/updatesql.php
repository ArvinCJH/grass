<?php
/**
 * 修改
 * */

$userName ;
$userId ;
$userSex ;
$userYear ;
$mobile ;
$db = new MySQLi("localhost","grass","123456","shop");
if ($db->connect_error){
    die("could not connect:".mysqli_error()) ;
}

//$sql = "insert into user_insert_test (username ,userpass ,user_email) values ($uid ,$pwd ,$email)";
//$sql = "INSERT INTO user_table (username, userpass, user_email)
//VALUES ('$uid', '$pwd', '$email')";
//mysqli_query($db,"UPDATE user_table SET user_sex='$userSex',user_year='$userYear',mobile='$mobile'
//WHERE username='$userName' AND userid='$userId'");
$sql ="UPDATE user_table SET user_sex='$userSex',user_year='$userYear',mobile='$mobile' 
WHERE username='$userName' AND userid='$userId'";

if ($db ->query($sql)  ===TRUE){
    echo "记录修改成功" ;
}else{
    echo "Error:".$sql ."<br>".$db ->error ;
}

$db ->close() ;

/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 18-12-21
 * Time: 下午10:09
 */