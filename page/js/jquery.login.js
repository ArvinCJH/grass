// 登录JS，仅限于登录操作
// document.write("<script type='text/javascript' src='jquery.cookie.js'></script>");
// 引入 cookie 库
$(function () {
    $('#login_button').click(function () {
        var loginname =$("#login_name").val() ;
        var loginpass =$("#login_pass").val() ;
        if (loginname.length !=0 && loginpass.length !=0){
            var handler ="login" ;
            // var url="php/login.php" ;
            var myData ="handler="+handler+"&username="+loginname+"&password="+loginpass  ;
            // alert("empty is not") ;
            // var request =new XMLHttpRequest() ;
            // $.ajax({
            //     url:url ,
            //     type:"POST" ,
            //     dataType:"json" ,
            //     data:myData ,
            //     success:function (data) {
            //         console.log(data) ;
            //         if (data.code ==0){
            //             $userid =data.userid ;
            //             $username =data.username ;
            //             if ($.cookie('userid')&&$.cookie('username')) { // 存在
            //                 window.location.href="http://localhost" ;
            //             }else {     //  不存在
            //                 $.cookie("userid" ,$userid ,{ path: '/' }) ;
            //                 $.cookie("username" ,$username,{  path: '/' }) ;
            //                 window.location.href="../../index.html" ;
            //             }
            //         }else if (data.code ==1){
            //             alert("用户名或密码错误") ;
            //         } else if (data.code ==2){
            //             alert("用户名或密码为空") ;
            //         }
            //     } ,error:function () {
            //         alert("error"+request.status) ;
            //     }
            // })

            getMyResponData(myData ,function (data) {
                if (data.code ==0){
                    $userid =data.userid ;
                    $username =data.username ;
                    if ($.cookie('userid')&&$.cookie('username')) { // 存在
                        window.location.href="http://localhost" ;
                    }else {     //  不存在
                        $.cookie("userid" ,$userid ,{ path: '/' }) ;
                        $.cookie("username" ,$username,{  path: '/' }) ;
                        window.location.href="../../index.html" ;
                    }
                }else if (data.code ==1){
                    alert("用户名或密码错误") ;
                } else if (data.code ==2){
                    alert("用户名或密码为空") ;
                }
            })
        } else {
            alert("is empty") ;
        }
    }) ;
})