<?php
/**
 * Created by IntelliJ IDEA.
 * User: CaiLing
 * Date: 2019/4/3
 * Time: 21:49
 */

require 'util/SqlUtils.php' ;
$productId =$_POST["productid"] ;

$db =new SqlUtils() ;
$db->commodityInformationIdQuery($productId);
