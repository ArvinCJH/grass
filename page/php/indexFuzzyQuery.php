<?php
/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-4-14
 * Time: 下午2:22
 */
require 'util/SqlUtils.php' ;
$keyWord = $_POST["fuzzyKeyWord"];
$sqliteUtil =new SqlUtils() ;
$sqliteUtil->commodityInformationQuery($keyWord) ;