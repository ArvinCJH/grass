<?php
/**
 * Created by IntelliJ IDEA.
 * User: CaiLing
 * Date: 2019/4/6
 * Time: 11:46
 */

include_once 'util/SqlUtils.php' ;
$userid =$_POST["userid"] ;
$forPass =$_POST["userpass"] ;
$newPass =$_POST["newpass"] ;


$db =new SqlUtils() ;           # sql finish
$db->passChange($userid ,$forPass ,$newPass) ;