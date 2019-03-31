<?php
header('Content-type:text/html;charset=utf-8');
require 'util/SqlUtils.php' ;
$sqliteUtil =new SqlUtils() ;
$sqliteUtil->productInformationDisplay();
/**
 * Created by IntelliJ IDEA.
 * User: CaiLing
 * Date: 2019/3/31
 * Time: 13:44
 */