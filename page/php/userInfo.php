<?php
    /* 接收用户ID ，获取用户信息 */
require 'util/SqlUtils.php' ;
$userid =$_POST["userid"] ;
$sqlTool =new SqlUtils() ;
$sqlTool->userInformationQuery($userid) ;

/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-5
 * Time: 上午10:22
 */