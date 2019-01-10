<?php
require 'util/SqlUtils.php' ;
$userid =$_POST['userid'] ;
//$userid ="97";


$sqlTool =new SqlUtils() ;
$sqlTool->userAddressQuery($userid) ;
/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-6
 * Time: 上午11:05
 */