<?php
require 'util/SqlUtils.php' ;
$userid =$_POST['userid'] ;
$infosex =$_POST['infosex'] ;
$infobirth =$_POST['infobirth'] ;
$infomobile =$_POST['infomobile'] ;
$infooccr =$_POST['infooccr'] ;
//$userid =97;
//$infoname =$_POST['username'] ;
//$infosex =$_POST['user_sex'] ;
//$infobirth =$_POST['birthday'] ;
//$infomobile =$_POST['moblie'] ;
//$infooccr =$_POST['occupation'] ;
//echo $infoname ,$infosex ,$infobirth ,$infomobile ,$infooccr ,$userid;
$sqlTool =new SqlUtils() ;
$sqlTool->userInformationModification($userid ,$infosex,$infobirth,$infomobile,$infooccr) ;
/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-5
 * Time: 下午1:14
 */