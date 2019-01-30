<?php

class Utils
{

    /*
     * -1 邮箱错误; 0 邮箱未初始化;   1 邮箱格式正确,   2 邮箱为空
     * */
    function checkIsEmail($email)
    {
        $isEmail = 0;
        $checkmail = "/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";//定义正则表达式
        if (hasWord($email)) {            //判断文本框中是否有值
            if (preg_match($checkmail, $email)) {                        //用正则表达式函数进行判断
                echo "电子邮箱格式正确";
                $isEmail = 1;
            } else {
                echo "电子邮箱格式不正确";
                $isEmail = -1;

            }
        } else {
            $isEmail = 2;
        }
        return $isEmail;
    }

    /*
     *  0 未初始化  1 正常   2 pass1 为空  3 pass2 为空  4 都为空    5 两者相等
     * */
    function checkIsSamePass($pass1, $pass2)
    {
        $passDifferent = 0;
        if (hasWord($pass1) && hasWord($pass2)) {     // 都不为空
            if (strcmp($pass1, $pass2)) {
                $passDifferent = 5;
            } else {
                $passDifferent = 1;
            }
        } else {
            if (!hasWord($pass1) && hasWord($pass2)) {
                $passDifferent = 2;

            } else if (hasWord($pass1) && !hasWord($pass2)) {
                $passDifferent = 3;
            } else $passDifferent = 4;
        }
        return $passDifferent;
    }


    function hasWord($str)
    {
        if (isset($str) && $str != "") {   //判断文本框中是否有值
            return true;       // 不为空
        }
        return false;          // 空
    }

    function hasTwoWord($str1 ,$str2)
    {
        if ($this->hasWord($str1)&& $this->hasWord($str2)) {   //判断文本框中是否有值
            return true;       // 不为空
        }
        return false;          // 空
    }

    function hasThreeWord($str1 ,$str2 ,$str3)
    {
        if ($this->hasWord($str1)&&$this->hasWord($str2)&&$this->hasWord($str3))
            return true ;
        else return false ;
    }

    function hasMoreWords($str1 ,$str2 ,$str3 ,$str4 ,$str5 ,$str6)
    {
        if ($this->hasWord($str1)&&$this->hasWord($str2)&&$this->hasWord($str3))
            return true ;
        else return false ;
    }


    function combinationOfData($handler ,$code ,$arr){     //  数据组合，code 1 为失败 ，code 0 为成功
        $arr2 = array('myhander'=>$handler, 'code'=>$code);
        if ($code ==0){
            if (empty($arr)) $myarr =$arr2 ;
            else $myarr =array_merge($arr2 ,$arr);
        }else $myarr =$arr2 ;
        echo json_encode($myarr) ;
    }

    // 毫秒级时间戳
    function getMillisecond() {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
    }

}


/**
 * Created by IntelliJ IDEA.
 * User: Arvin
 * Date: 18-12-18
 * Time: 下午9:17
 */