<?php
/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-4-13
 * Time: 上午9:09
 */
include_once 'util/SqlUtils.php' ;
$userRegion =$_POST['userRegion'] ;
$postalCode =$_POST['postalCode'] ;
$stressId =$_POST['stressId'] ;
$consignee =$_POST['consignee'] ;
$receive_phone =$_POST['receive_phone'] ;
$address_default =$_POST['address_default'] ;
$userid =$_POST['userid'] ;
$addressid =$_POST['addressid'] ;
//$userRegion ="region" ;
//$postalCode ="514021" ;
//$stressId ="stress" ;
//$consignee ="ses" ;
//$receive_phone ="13435500345" ;
//$address_default =0 ;
//$userid =1 ;
//$addressid =20 ;

$sqlTool =new SqlUtils() ;
$sqlTool->userAddressUpdate($userRegion ,$postalCode ,$stressId ,$consignee ,$receive_phone ,$address_default ,$userid ,$addressid) ;