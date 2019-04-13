<?php
/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-4-13
 * Time: 上午5:43
 */

include_once 'util/SqlUtils.php' ;

$userId =$_POST['userid'] ;
$addressId =$_POST["addressid"] ;

$db =new SqlUtils() ;           # sql finish
$db->userAddressSetDefault($userId ,$addressId) ;