<?php
include "SqlUtils.php";
class handlerUtil{
    function requestHanler($handler){
        $login_handler ="login" ;
        $register_handler ="register" ;
        $check_user_info ="checkUserInfo" ;
        $update_user_info ="updateUserInfo" ;
        $add_user_address ="addUserAddress" ;
        $user_address_query ="userAddressQuery" ;

        if ($this->checkHandler($handler ,$login_handler)){
            $this->indexLogin() ;
            return ;
        }
        if ($this->checkHandler($handler ,$register_handler)){
            return ;
        }
        if ($this->checkHandler($handler ,$check_user_info)){
            return ;
        }
        if ($this->checkHandler($handler ,$update_user_info)){
            return ;
        }
        if ($this->checkHandler($handler ,$add_user_address)){
            return ;
        }
        if ($this->checkHandler($handler ,$user_address_query)){
            return ;
        }
    }

    function checkHandler($sendHandler ,$handler){
        return $sendHandler ==$handler ? true: false ;
    }

    function indexLogin(){
        $uid = $_POST["username"];
        $pwd = $_POST["password"];
        $sqliteUtil =new SqlUtils() ;
        $sqliteUtil->sqlLogin($uid ,$pwd) ;
    }
}

/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-31
 * Time: 上午3:54
 */