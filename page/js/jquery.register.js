$(function () {
    /*
    * 注册界面的处理
    * */
    //     jquery 禁用按钮
    //     $("#btn").attr('disabled',true);
    //     $("#btn").attr('disabled','disabled');
    //     $("#btn").prop('disabled','disabled');

    $("#register_password_input").focus(function () {   // 密码框
        $("#affirm_password_label").text("") ;
    })
        .blur(function () {		// 离开时判断
            var password =$("#register_password_input").val() ;
            var passwords =$("#affirm_password_input").val() ;

            if (passwords.length !=0){		// 确认密码框为空时，不判断密码是否相等
                if (password !=passwords ){     //  当密码不相同时，禁用注册按钮
                    $("#affirm_password_label").text("differentpass") ;
                    $("#register_btn").attr('disabled',true);
                }else $("#register_btn").attr('disabled',false);
            }

        }) ;
    $("#affirm_password_input").focus(function () {     // 密码确认框
        $("#affirm_password_label").text("") ;
    })
        .blur(function () {		// 离开时判断
            if ($("#register_password_input").val() !=$("#affirm_password_input").val() ){
                $("#affirm_password_label").text("differentpass") ;
                $("#register_btn").attr('disabled',true);
            }else $("#register_btn").attr('disabled',false);
        }) ;


    $("#register_btn").click(function () {      // 提交按钮
        var username =$("#register_username").val() ;
        var password =$("#register_password_input").val() ;
        var passwords =$("#affirm_password_input").val() ;
        var envelope =$("#register_envelope_input").val() ;

        // 判断需要的所有数据是否为空
        if (username.length !=0 && password.length !=0
            && passwords.length !=0&& envelope.length !=0) {
            // 用户名未规定规则
            // 两个密码是否相等
            var myData ="username="+username+"&password="+password+"&passwords="+passwords+"&envelope="+envelope ;
            // if (password ==passwords ){		// 密码相等，进行网络请求
            var num =9 ;
            forServiceData(num ,myData) ;
            // }

            // 邮箱为自动判断是否符合规则
        }else {
            showTip(7) ;
        }
    });
})


function forServiceData(num ,myData) {
    var reqUrl ="" ;
    if (num ==9){
        reqUrl ="register" ;
    }

    getMyResponData(reqUrl ,myData ,function (data) {
        if (data.code ==0){
            var userid = $.cookie('userid');
            var username = $.cookie('username');
            if (username !=null&& userid !=null) {
                $.cookie("userid" ,"", {expires: -1} ) ;
                $.cookie("username" ,"", {expires: -1}) ;
            }
            showTip(9) ;
            window.location.href="http://localhost/page/login.html" ;
        }else if (data.code ==1){
            showTip(-9) ;
        } else if (data.code ==2){
            alert("请检查填写是否为空") ;
        }else if (data.code==3){
            alert("用户已存在");
        }
    })
}