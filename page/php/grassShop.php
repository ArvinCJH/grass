<?php
require 'util/handlerUtil.php' ;
$MYHandler=$_POST["handler"] ;

$handlerU =new handlerUtil() ;
$handlerU ->requestHanler($MYHandler) ;


/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-31
 * Time: 上午2:53
 */