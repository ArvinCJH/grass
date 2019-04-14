<?php
require 'util/SqlUtils.php' ;
$userid =$_POST['userid'] ;
$infosex =$_POST['infosex'] ;
$infobirth =$_POST['infobirth'] ;
$infomobile =$_POST['infomobile'] ;
$infooccr =$_POST['infooccr'] ;
$sqlTool =new SqlUtils() ;
$sqlTool->userInformationModification($userid ,$infosex,$infobirth,$infomobile,$infooccr) ;
/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-5
 * Time: 下午1:14
 */