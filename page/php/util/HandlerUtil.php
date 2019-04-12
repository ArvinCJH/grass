<?php
include "SqlUtils.php";
class HandlerUtil{
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
            $this->indexRegister() ;
            return ;
        }
        if ($this->checkHandler($handler ,$check_user_info)){
            $this->indexCheckUserInfo() ;
            return ;
        }
        if ($this->checkHandler($handler ,$update_user_info)){
            $this->indexUpdataUserInfo() ;
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

    private function indexLogin(){
        $uid = $_POST["username"];
        $pwd = $_POST["password"];
        $sqliteUtil =new SqlUtils() ;
        $sqliteUtil->sqlLogin($uid ,$pwd) ;
    }

    private function indexRegister(){
        $uid = $_POST["username"] ;
        $pwd = $_POST["password"] ;
        $email = $_POST["envelope"] ;
        $sqliteUtil =new SqlUtils() ;
        $sqliteUtil->sqlRegister($uid ,$pwd ,$email) ;
    }

    private function indexUpdataUserInfo(){
        $userid =$_POST['userid'] ;
        $infoname =$_POST['infoname'] ;
        $infosex =$_POST['infosex'] ;
        $infobirth =$_POST['infobirth'] ;
        $infomobile =$_POST['infomobile'] ;
        $infooccr =$_POST['infooccr'] ;
        $sqlTool =new SqlUtils() ;
        $sqlTool->userInformationModification($userid ,$infoname,$infosex,$infobirth,$infomobile,$infooccr) ;
    }

    private function indexCheckUserInfo(){
        $userid =$_POST["userid"] ;
        $sqlTool =new SqlUtils() ;
        $sqlTool->userInformationQuery($userid) ;
    }
}

/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 19-1-31
 * Time: 上午3:54
 */