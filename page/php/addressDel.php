<?php
/**
 * Created by IntelliJ IDEA.
 * User: CaiLing
 * Date: 2019/4/6
 * Time: 12:07
 *地址删除
 */

include_once 'util/SqlUtils.php' ;

$userId =$_POST['userid'] ;
$addressId =$_POST["addressid"] ;

$db =new SqlUtils() ;           # sql finish
$db->userAddressDel($userId ,$addressId) ;