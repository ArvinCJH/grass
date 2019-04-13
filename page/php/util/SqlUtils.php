<?php
header('Content-type:text/html;charset=utf-8');
include 'Utils.php' ;
class SqlUtils{

    function sqlLink(){
        $mysqlHost ="localhost" ;
        $mysqlName ="grass" ;
        $mysqlPass ="123456" ;
        $mysqlDBName ="shop" ;

        //造连接对象
        $db= new mysqli($mysqlHost,$mysqlName,$mysqlPass,$mysqlDBName);
        if (!$db){
            die("could not connect:".mysqli_error()) ;
        }else {
            $db->query("set names utf8") ;
//            echo'succ sql' ;
            return $db ;
        }
    }

    function closeDB(){
        mysqli_close($this->sqlLink()) ;
    }

    function utilTool(){
//        require ()
        return new Utils() ;
    }


    /*
     * 用户信息部分
     * */
    function sqlLogin($uid ,$pwd){      //  登录
        /*
         * code 0 success
         * code 1   用户名或密码错误
         * code 2   用户名或密码为空
         * */
        $arr =null ;
        $sql = "select userpass ,id from user_table where username='{$uid}'";   //  sql 语句 ，核对密码
        if($this->utilTool()->hasTwoWord($uid ,$pwd))       //  判断是否为空
        {
            $reslut = $this->sqlLink()->query($sql);        //  执行语句
            $n = $reslut->fetch_row();      //取出数组
            if($n[0]==$pwd)
            {
                $code =0 ;
                $arr=array('userid'=>$n[1],'username'=>$uid) ;
            }
            else
            {
                $code = 1 ;
//                echo "用户名或密码错误！";
            }
        }
        else
        {
            $code =2 ;
//            echo "用户名密码不能为空";
        }
        $this->utilTool()->combinationOfData("login" ,$code ,$arr) ;
        $this->closeDB() ;
    }

    function sqlRegister($uid, $pwd, $email){   //  注册
        /*
         * code 0 success
         * code 1 插入失败
         * code 3 用户已存在
         * code 2 请检查填写是否为空
         * */

        $arr =null ;
        $sql = "INSERT INTO user_table(username, userpass, user_mail)
            VALUES ('$uid', '$pwd', '$email')";     //  插入语句
        $isExitSql ="SELECT user_mail FROM user_table where username='{$uid}'" ;    //  查询是否存在语句
        if ($this->utilTool()->hasThreeWord($uid ,$pwd ,$email)){
            $reslut = $this->sqlLink()->query($isExitSql);
            $n = $reslut->fetch_row();
            if ($n[0] ==$email||$n[0] !=null){      //  用户存在的两个条件，用户名相同或者邮箱相同
                $code =3 ;
//                echo "用户已存在" ;
            }else{      //  用户不存在 ，进行插入操作
                if ($this->sqlLink()->query($sql) ===TRUE){
                    $code =0 ;
//                    echo "插入成功" ;
                }else{
                    $code =1 ;
//                    echo "插入失败" ;
//                    echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
                }
            }
        }else{
            $code =2 ;
//            echo "请检查填写是否为空" ;
        }
        $this->utilTool()->combinationOfData("register" ,$code ,$arr) ;
        $this->closeDB() ;
    }

    function userInformationQuery($userId){     //  用户信息查询 ,根据用户ID查询
        /*
         * code 0 查询成功
         * code 1 查询失败
         * code 2 userId 为空
         * */
        $arr =null ;
        $sqllite ="SELECT user_sex ,username ,mobile ,birthday ,occupation FROM user_table where id='{$userId}'" ;
        if ($this->utilTool()->hasWord($userId)){
            $reslut = $this->sqlLink()->query($sqllite);
            $n = $reslut->fetch_row();
            if ($n[1] !=null){      // 有值，查询成功
                $code =0 ;
                $arr=array("usersex"=>$n[0] ,"username"=>$n[1] ,"mobile"=>$n[2] ,"birthday"=>$n[3] ,"job"=>$n[4]);
            }else{  // 无值，查询失败
                $code =1 ;
            }
        }else{
            $code =2 ;
        }
        $this->utilTool()->combinationOfData("checkUserInfo" ,$code ,$arr) ;
        $this->closeDB() ;
    }

    function userInformationModification($userid ,$infosex,$infobirth,$infomobile,$infooccr)
    {     //  用户信息修改
        /*
         * code 0 插入成功
         * code 1 插入失败
         * code 2 默认值为空
         * */
//        $sql = "UPDATE `user_table` SET `user_year` = "+$infoname+", `user_sex` = "+$infosex+", `mobile` = "+$infomobile+", `birthday` = "+$infobirth+", `occupation` = "+$infooccr+" WHERE `user_table`.`userid` = "+$userid;
        $sql = "UPDATE user_table SET user_sex='{$infosex}',mobile='{$infomobile}' ,birthday='{$infobirth}' ,occupation='{$infooccr}'
            WHERE id='{$userid}'";
        $arr = null;
        if ($this->utilTool()->hasWord($infosex)) {  // 查询时以性别是否为空判断是否含有数据，所以
            if ($this->sqlLink()->query($sql) === TRUE) {
                $code = 0;
    //            echo "succ" ;
//                $arr=array("usersex"=>$n[0] ,"useryear"=>$n[1] ,"mobile"=>$n[2] ,"birthday"=>$n[3] ,"job"=>$n[4]);
            } else {
                $code = 1;
    //            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
            }
        }else $code =2 ;
        $this->utilTool()->combinationOfData("updateUserInfo" ,$code ,$arr) ;
        $this->closeDB() ;
    }

    function forgetPass(){     //   忘记密码

    }

    function passChange($id ,$forPass ,$newPass){     //   修改密码
        /*
         * code 0 密码修改成功
         * code 1 原密码错误
         * code 2 数据为空
         * code 3 密码修改失败
         * code 4
         * */
        $sql = "select userpass from user_table where id='{$id}'";   //  sql 语句 ，核对密码
        $arr = null;
        if($this->utilTool()->hasTwoWord($id ,$forPass))       //  判断是否为空
        {
            $reslut = $this->sqlLink()->query($sql);        //   执行语句
            $n = $reslut->fetch_row();      //取出数组
            if($n[0]==$forPass) {
                $changPasssql = "UPDATE user_table SET userpass='{$newPass}' WHERE id='{$id}'";
                if ($this->sqlLink()->query($changPasssql) === TRUE) {
                    $code = 0;
                    //            echo "succ" ;
                } else {
                    $code = 3;
//                    echo "密码修改失败！";
                    //            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
                }
            }
            else {
                $code = 1 ;
//                echo "原密码错误！";
            }
        }
        else
        {
            $code =2 ;
//            echo "数据为空";
        }
        $this->utilTool()->combinationOfData("passChange" ,$code ,$arr) ;
        $this->closeDB() ;
    }


    /*
     * 地址管理部分
     * */
    function userAddressAdd($userRegion ,$postalCode ,$stressId ,$consignee ,
                                     $receive_phone ,$address_default ,$userid){     //  用户地址增加
        /*
         * code 0 插入成功
         * code 1 插入失败
         * */
        $address_detail =$userRegion.$stressId ;
        if ($address_default==1){
            $defsql ="UPDATE  address_manager_table SET address_default='0' where user_id='{$userid}'" ;
            $this->sqlLink()->query($defsql) ;
        }
//        $sql = "UPDATE `user_table` SET `user_year` = "+$infoname+", `user_sex` = "+$infosex+", `mobile` = "+$infomobile+", `birthday` = "+$infobirth+", `occupation` = "+$infooccr+" WHERE `user_table`.`userid` = "+$userid;
        $sql = "INSERT INTO address_manager_table(region, postal_code, address_stress ,consignee ,receive_phone ,address_default ,address_detail ,user_id)
            VALUES ('$userRegion' ,'$postalCode' ,'$stressId' ,'$consignee' ,'$receive_phone' ,'$address_default' ,'$address_detail' ,'$userid')";     //  插入语句
        $arr =null ;
        if ($this->sqlLink()->query($sql) ===TRUE){
            $code =0 ;
//            echo "succ" ;
        }else{
            $code =1 ;
//            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
        }

        $this->utilTool()->combinationOfData("addUserAddress" ,$code ,$arr) ;
        $this->closeDB() ;
    }

    function userAddressQuery($userid){        //  用户地址查询
        /* queryUserAddress
         * 查询规则，用户ID即可查询到当前ID的所有信息
         *
         * mysqli_fetch_array($result ,$resulttype)
         *  //  默认为混合数组     ;
         *      MYSQLI_ASSOC   关联数组(下标是字符串)，相当于mysqli_fetch_assoc()
         *      MYSQLI_NUM     枚举数组(下标是整数) ，相当于mysqli_fetch_row()
         *
         * */
        $sql ="select * from address_manager_table where user_id='{$userid}'" ;
        $result["data"] = array();
        if ($res =$this->sqlLink()->query($sql)){
            $code =0 ;
            while ($row =mysqli_fetch_assoc($res)){
//            while ($row =mysqli_fetch_array($res ,MYSQLI_ASSOC)){
//                $result[] =$row ;
                array_push($result["data"] ,$row) ;

            }
            mysqli_free_result($res) ;
        }else{
            $code =1 ;
//            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
        }
//        echo $result ;
//        print_r($result) ;
        $this->utilTool()->combinationOfData("userAddressQuery" ,$code ,$result) ;
        $this->closeDB() ;

    }

    function userAddressDel($userid ,$addressid){        //  用户地址删除
        /* userAddressDel
         * code 0 success
         * code 1 fail
         * */
        $sql ="Delete from address_manager_table where user_id='{$userid}' and id='{$addressid}'" ;
        $result = null;
        if ($res =$this->sqlLink()->query($sql)){
            $code =0 ;

        }else{
            $code =1 ;
//            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
        }
        $this->utilTool()->combinationOfData("userAddressDel" ,$code ,$result) ;
        $this->closeDB() ;
    }

    function userAddressUpdate($userRegion ,$postalCode ,$stressId ,$consignee ,
                            $receive_phone ,$address_default ,$userid ,$addressid){     //  用户地址修改
        /*
         * code 0 修改成功
         * code 1 修改失败
         * */
        $address_detail =$userRegion.$stressId ;
        if ($address_default==1){
            $defsql ="UPDATE  address_manager_table SET address_default='0' where user_id='{$userid}'" ;
            $this->sqlLink()->query($defsql) ;
        }
//        $sql = "UPDATE `user_table` SET `user_year` = "+$infoname+", `user_sex` = "+$infosex+", `mobile` = "+$infomobile+", `birthday` = "+$infobirth+", `occupation` = "+$infooccr+" WHERE `user_table`.`userid` = "+$userid;
//        $sql = "INSERT INTO address_manager_table(region, postal_code, address_stress ,consignee ,receive_phone ,address_default ,address_detail ,user_id)
//            VALUES ('$userRegion' ,'$postalCode' ,'$stressId' ,'$consignee' ,'$receive_phone' ,'$address_default' ,'$address_detail' ,'$userid')";     //  插入语句

        $sql = "UPDATE address_manager_table SET region='{$userRegion}' ,postal_code='{$postalCode}' ,address_stress='{$stressId}' ,consignee='{$consignee}' ,receive_phone='{$receive_phone}' ,address_default='{$address_default}' ,address_detail='{$address_detail}' WHERE user_id='{$userid}' and id='{$addressid}'" ;
        $arr =null ;
        if ($this->sqlLink()->query($sql) ===TRUE){
            $code =0 ;
//            echo "succ" ;
        }else{
            $code =1 ;
//            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
        }

        $this->utilTool()->combinationOfData("userAddressUpdate" ,$code ,$arr) ;
        $this->closeDB() ;
    }

    function userAddressSetDefault($userid ,$addressid){        //  用户地址设为默认
        /* userAddressSetDefault
         * code 0 success
         * code 1 fail
         * */
//        $sql = "UPDATE user_table SET user_sex='{$infosex}',mobile='{$infomobile}' ,birthday='{$infobirth}' ,occupation='{$infooccr}'
//            WHERE id='{$userid}'";

        $defsql ="UPDATE  address_manager_table SET address_default='0' where user_id='{$userid}'" ;
        $this->sqlLink()->query($defsql) ;
        $sql ="UPDATE  address_manager_table SET address_default='1' where user_id='{$userid}' and id='{$addressid}'" ;
        $result = null;
        if ($res =$this->sqlLink()->query($sql)){
            $code =0 ;

        }else{
            $code =1 ;
//            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
        }
        $this->utilTool()->combinationOfData("userAddressSetDefault" ,$code ,$result) ;
        $this->closeDB() ;
    }

    /*
     * 商品类信息部分
     * */
    function productInformationAddition($inforArray){          //  商品信息添加
        $sql ="INSERT INTO product_table (name ,price ,pic_urls ,merchants_address ,merchants_serve ,merchants_sales ,
                 quantity_available ,quantity_purchased ,evaluate_num ,collection_num ,monthly_sale) 
                  values ('{$inforArray['data']}' ,'{$inforArray['data']}','{$inforArray['data']}','{$inforArray['data']}','{$inforArray['data']}',
                    '{$inforArray['data']}','{$inforArray['data']}','{$inforArray['data']}','{$inforArray['data']}','{$inforArray['data']}')" ;
        $arr =null ;
        if ($this->sqlLink()->query($sql) ===TRUE){
            $code =0 ;
//            echo "succ" ;
        }else{
            $code =1 ;
//            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
        }

        $this->utilTool()->combinationOfData("productInformationAddition" ,$code ,$arr) ;
        $this->closeDB() ;
    }

    function commodityInformationModification(){    //  商品信息修改

    }

    function  commodityInformationDeletion(){       //  商品信息删除，对应添加者ID

    }

    function commodityInformationIdQuery($productId){           //  根据ID查询
        $sql ="select name ,price ,pic_urls ,merchants_address ,merchants_serve ,merchants_sales ,product_classify_ids ,
                quantity_available ,quantity_purchased ,evaluate_num ,collection_num ,monthly_sale from product_table 
                  where id='{$productId}'" ;
        $result["data"] = array();
        if ($res =$this->sqlLink()->query($sql)){
            $code =0 ;
            while ($row =mysqli_fetch_assoc($res)){
//            while ($row =mysqli_fetch_array($res ,MYSQLI_ASSOC)){
//                $result[] =$row ;
                array_push($result["data"] ,$row) ;

            }
            mysqli_free_result($res) ;
        }else{
            $code =1 ;
//            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
        }
        $this->utilTool()->combinationOfData("commodityInformationIdQuery" ,$code ,$result) ;
        $this->closeDB() ;
    }
    function commodityInformationQuery($keyWord){           //  商品信息查询,搜索框，模糊查询
        $sql ="select id ,name from product_table where name LIKE '%$keyWord%'" ;
        $result["data"] = array();
        if ($res =$this->sqlLink()->query($sql)){
            $code =0 ;
            while ($row =mysqli_fetch_assoc($res)){
//            while ($row =mysqli_fetch_array($res ,MYSQLI_ASSOC)){
//                $result[] =$row ;
                array_push($result["data"] ,$row) ;

            }
            mysqli_free_result($res) ;
        }else{
            $code =1 ;
//            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
        }
        $this->utilTool()->combinationOfData("commodityInformationQuery" ,$code ,$result) ;
        $this->closeDB() ;

    }

    function productInformationDisplay(){           //  商品信息展示，前10条
        // host sale
//        评价数 、商品名称 、商品图片 、收藏数 、月销量 、价格
//        evaluate_num ,name ,pic_url  ,collection_num ,monthly_sale ,price
//        $sql="select id ,name ,price ,pic_url ,evaluate_num ,collection_num ,monthly_sale from product_table order by id limit 10;" ;       // 前十条
        $sql="select id ,name ,merchants_sales ,price ,pic_url ,evaluate_num ,collection_num ,monthly_sale from product_table limit 10" ;       // 随机显示前十条
        $result["data"] = array();
        if ($res =$this->sqlLink()->query($sql)){
            $code =0 ;
            while ($row =mysqli_fetch_assoc($res)){
//            while ($row =mysqli_fetch_array($res ,MYSQLI_ASSOC)){
//                $result[] =$row ;
                array_push($result["data"] ,$row) ;

            }
            mysqli_free_result($res) ;
        }else{
            $code =1 ;
//            echo "Error:".$sql ."<br>".$this->sqlLink() ->error ;
        }
//        echo $result ;
//        print_r($result) ;
        $this->utilTool()->combinationOfData("productInformationDisplay" ,$code ,$result) ;
        $this->closeDB() ;
    }
}



/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-2
 * Time: 上午11:27
 */