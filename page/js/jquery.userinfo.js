$(function () {
    /*
    * 主要用于用户基本页面信息的交互
    * */

    /*
            * 获取选中值，三种方法都可以：

            $('input:radio:checked').val()；

            $("input[type='radio']:checked").val();

            $("input[name='rd']:checked").val();
            * */
    var userid = $.cookie('userid');
    if (userid!=null){      // cookie 不为空 ，说明已经登录
        // alert("empty is not") ;
        var request =new XMLHttpRequest() ;
        var radios =$(".userinfo_sex") ;
        var url="../php/userInfo.php" ;
        var myData ="userid="+userid ;
        $.ajax({
            url:url ,
            type:"POST" ,
            dataType:"json" ,
            data:myData ,
            success:function (data) {
                // console.log(data) ;
                if (data.code ==0){
                    // alert("成功") ;
                    // radios.eq(0).attr("checked" ,true) ;
                    // radios.eq(1).attr("checked" ,false) ;
                    $("#userinfo_name").val(data.useryear) ;
                    $("#userinfo_birth").val(data.birthday) ;
                    $("#userinfo_mobile").val(data.mobile) ;
                    $("#userinfo_occu").val(data.job) ;
                    if (data.usersex ==1){
                        radios.eq(0).attr("checked" ,true) ;
                        radios.eq(1).attr("checked" ,false) ;
                    }else {
                        radios.eq(1).attr("checked" ,true) ;
                        radios.eq(0).attr("checked" ,false) ;
                    }
                }else if (data.code ==1){
                    alert("查询失败") ;
                } else if (data.code ==2){
                    alert("userId 为空") ;
                }
            } ,error:function () {
                alert("error"+request.status) ;
            }

        }) ;

    }else {     // cookie 为空，未登录或者是 cookie 超时，跳转到登录界面
        alert("cookie 为空") ;
    }

    $("#userinfo_button").click(function () {
        var infoname =$("#userinfo_name").val() ;
        var infosex =$("input[type='radio']:checked").val();
        var infobirth =$("#userinfo_birth").val() ;
        var infomobile =$("#userinfo_mobile").val() ;
        var infooccr =$("#userinfo_occu").val() ;

        var myData ="infoname="+infoname+"&infosex="+infosex+
            "&infobirth="+infobirth+"&infomobile="+infomobile+
            "&infooccr="+infooccr+"&userid="+userid ;

        getUserInfo(1 ,myData) ;
        // $.ajax({
        //     url:url ,
        //     type:"POST" ,
        //     dataType:"json" ,
        //     data:myData ,
        //     async:false ,
        //     success:function (data) {
        //         // alert(data) ;
        //         // console.log(data) ;
        //         if (data.code ==0){
        //             alert("插入成功") ;
        //         }else if (data.code ==1){
        //             alert("插入失败") ;
        //         }else if (data.code ==2){
        //             alert("请检查数据是否为空") ;
        //         }
        //     } ,error:function () {
        //         alert("error"+request.status) ;
        //     }
        //
        // }) ;

    }) ;


    function getUserInfo(num ,myData){
        var reqUrl ="" ;
        if (num ==1){
            reqUrl ="userInfoSubmit" ;
        }

        getMyResponData(reqUrl ,myData ,function (data) {
            if (data.code ==0){
                // alert("插入成功") ;
                showTip(num) ;
            }else if (data.code ==1){
                // alert("插入失败") ;
                showTip(-num) ;
            }else if (data.code ==2){
                showTip(7)
            }
        })

    }

})