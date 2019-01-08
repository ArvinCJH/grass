<?php
require 'util/SqlUtils.php' ;
$userRegion =$_POST['userRegion'] ;
$postalCode =$_POST['postalCode'] ;
$stressId =$_POST['stressId'] ;
$consignee =$_POST['consignee'] ;
$receive_phone =$_POST['receive_phone'] ;
$address_default =$_POST['address_default'] ;
$userid =$_POST['userid'] ;

$sqlTool =new SqlUtils() ;
$sqlTool->userAddressAdd($userRegion ,$postalCode ,$stressId ,$consignee ,$receive_phone ,$address_default ,$userid) ;
/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-6
 * Time: 上午2:12
 */