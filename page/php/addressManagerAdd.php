<?php
require 'util/SqlUtils.php' ;
$userRegion =$_POST['userRegion'] ;
$postalCode =$_POST['postalCode'] ;
$stressId =$_POST['stressId'] ;
$consignee =$_POST['consignee'] ;
$receive_phone =$_POST['receive_phone'] ;
$address_default =$_POST['address_default'] ;
$userid =$_POST['userid'] ;
//$userRegion ='userRegion' ;
//$postalCode ='postalCode' ;
//$stressId ='stressId' ;
//$consignee ='consignee' ;
//$receive_phone ='receive_phone' ;
//$address_default ='address_default';
//$userid =1 ;

$sqlTool =new SqlUtils() ;
$sqlTool->userAddressAdd($userRegion ,$postalCode ,$stressId ,$consignee ,$receive_phone ,$address_default ,$userid) ;
/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-6
 * Time: 上午2:12
 */