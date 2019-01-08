<?php

//header('Access-Control-Allow-Origin:*');
//header('Access-Control-Allow-Methods:POST,GET');
//header('Access-Control-Allow-Credentials:true');
//header('Content-Type: text/xml;charset=utf-8');             //  返回 xml 数据
//exit($xml) ;
//header('Content-Type: application/json;charset=utf-8');     //  返回 json 数据
//$arr =array('a'=>1 ,'b'=>2) ;
//exit(json_encode($data)) ;

require 'util/SqlUtils.php' ;
$uid = $_POST["username"] ;
$pwd = $_POST["password"] ;
$email = $_POST["envelope"] ;
$sqliteUtil =new SqlUtils() ;
$sqliteUtil->sqlRegister($uid ,$pwd ,$email) ;

//echo "register" ;
//$uid = $_POST["username"] ;
//$pwd1 = $_POST["password"] ;
//$pwd2 = $_POST["passwords"];
//header("Access-Control-Allow-Origin:*");
//$email =$_GET["usermail"] ;
//$newemail =$email."+usermail" ;
//$array =array($newemail ,"22222") ;
//echo json_encode($array) ;
//$arr = array ('success'=>1,'msg'=>2,'c'=>3,'d'=>4,'e'=>5);

//echo json_encode($arr) ;
//echo '{"success":"true","msg":"error"}' ;
//return ;
//$pwdIsRight =$utilTools->checkIsSamePass($pwd ,$pwd2) ;

//if ($_SERVER["REQUEST_METHOD"]=="POST"){
////    $utilTools->checkIsEmail($email) ;
//    echo '{"success":false."msg":"error"}' ;
//    return ;
//}



//php返回json,xml,JSONP等格式的数据
//
//返回json数据：
//
//header('Content-Type:application/json; charset=utf-8');
//
//$arr = array('a'=>1,'b'=>2);
//
//exit(json_encode($data));
//
//注意：如果不加header直接输出json_encode的值的话，返回的是字符串不是对象，js那边就需要先eval('('+data+')')转化为对象，在取值
//
//
//
//返回xml数据：
//
//header('Content-Type:text/xml; charset=utf-8');
//
//exit($xml);
//
//
//
//返回jsonp数据：
//
//$arr = array('a'=>1, 'b'=>2, 'c'=>3);
//
//$json = json_encode($arr);
//
//$callback = $_GET['callback'];
//
//exit($callback."($json)");
//
////注意callback是js传过来的参数名称
//
//
//
//thinkphp如何返回各种数据：
//
//$this->ajaxReturn (json_encode($arr),'JSON');
//
//$this->ajaxReturn (json_encode($arr),'JSONP');
//
//$this->ajaxReturn (json_encode($arr),'XML');
//
//
//
//json_encode有个参数禁止unicode编码
//
//JSON_UNESCAPED_UNICODE
//
//json_encode('中文',JSON_UNESCAPED_UNICODE);
//
//
//
//默认中文编码
//
//header('Content-Type:application/json; charset=gbk');
//
//$data = $db->select($sql);
//$data = json_encode($data);
//$data=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'gbk', pack('H4', '\\1'))", $data);
//
// exit($data);


//header("Access-Control-Allow-Origin:*");



//$db = new MySQLi("localhost","grass","123456","shop");
//if ($db->connect_error){
//    die("could not connect:".mysqli_error()) ;
//}
//
//$sql = "INSERT INTO user_table (username, userpass, user_email)
//    VALUES ('$uid', '$pwd', '$email')";
//if ($utilTools->hasThreeWord($uid ,$pwd ,$email)){      //  不为空时执行
//
//    if ($db ->query($sql)  ===TRUE){
//        echo "记录插入成功" ;
//    }else{
//        echo "Error:".$sql ."<br>".$db ->error ;
//    }
//}
//else{
//    echo "请检查填写是否为空" ;
//}
//    //$sql = "insert into user_insert_test (username ,userpass ,user_email) values ($uid ,$pwd ,$email)";
//    $sql = "INSERT INTO user_table (username, userpass, user_email)
//    VALUES ('$uid', '$pwd', '$email')";
//
//
//    if ($db ->query($sql)  ===TRUE){
//        echo "记录插入成功" ;
//    }else{
//        echo "Error:".$sql ."<br>".$db ->error ;
//    }
//
//    $db ->close() ;

/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 18-12-18
 * Time: 下午9:12
 */