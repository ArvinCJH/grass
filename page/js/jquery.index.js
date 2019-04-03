$(function () {
    //	监控登录，消息、购物车、收藏、登录按钮的事件监听及事件处理
    var islogin =false ;
    var userid = $.cookie('userid');
    var username = $.cookie('username');
    getHotMsg() ;
    var afterLogin ="<div id=\"showLoginHide\">\n" +
        "<ul>\n" +
        "<li><a href=\"javascript:void(0)\" id=\"user_center\">个人中心</a></li>\n" +
        "<li><a href=\"javascript:void(0)\" id=\"user_exit\">退出登录</a></li>\n" +
        "</ul>\n" +
        "\n" +
        "</div>" ;
    if (username !=null&& userid !=null) {
        islogin =true ;
        $('#login_name').text(username) ;
        $('#login_name').append(afterLogin) ;
    }else {
        $('#login_name').text("登录") ;
    }

    $("#user_center").click(function () {
        window.location.href = "./page/user.html";

    });
    $("#user_exit").click(function () {
        if (username !=null&& userid !=null) {
            $.cookie("userid" ,"", {expires: -1} ) ;
            $.cookie("username" ,"", {expires: -1}) ;
            userid = $.cookie('userid');
            username = $.cookie('username');
        }
        window.location.href = "./index.html";

    });

    $("#index_login").click(function () {
        if (islogin){
            $("#showLoginHide").show() ;
            // window.location.href = "http://localhost/page/user.html";
        }else {
            window.location.href = "./page/login.html";
        }
    });
    // $("#showLoginHide").hide() ;
    $("#index_login").hover(function () {       //这是鼠标下拉菜单（个人中心，退出）
        if (islogin){		//	登录状态下跳转到对应的页面 ，未登录的情况下都跳转到登录界面
            $("#showLoginHide").show() ;
            // window.location.href = "http://localhost/page/user.html";
        }
    },function () {
        $("#showLoginHide").hide() ;
    });
    $("#login_name").hover(function () {
        if (islogin){		//	登录状态下跳转到对应的页面 ，未登录的情况下都跳转到登录界面
            $("#showLoginHide").show() ;
            // window.location.href = "http://localhost/page/user.html";
        }
    },function () {
        $("#showLoginHide").hide() ;
    });

    $("#index_shopcar").click(function () {
        if (islogin){
            window.location.href = "./page/user.html";
        }else {
            window.location.href = "./page/login.html";
        }
    });
    $("#index_collect").click(function () {
        if (islogin){
            window.location.href = "./page/user.html";
        }else {
            window.location.href = "./page/login.html";
        }
    });
    $("#index_msg").click(function () {
        if (islogin){
            window.location.href = "./page/user.html";
        }else {
            window.location.href = "./page/login.html";
        }
    });

    // //	监控登录，消息、购物车、收藏、登录按钮的事件监听及事件处理
    // var islogin =false ;
    // var userid = $.cookie('userid');
    // var username = $.cookie('username');
    // if (username !=null&& userid !=null) {
    //     islogin =true ;
    //     $('#login_name').text(username) ;
    // }
    // $("#index_login").click(function () {
    //     if (islogin){		//	登录状态下跳转到对应的页面 ，未登录的情况下都跳转到登录界面
    //         window.location.href = "http://localhost/page/user.html";
    //     }else {
    //         window.location.href = "http://localhost/page/login.html";
    //     }
    // });
    // $("#index_shopcar").click(function () {
    //     if (islogin){
    //         window.location.href = "http://localhost/page/user.html";
    //     }else {
    //         window.location.href = "http://localhost/page/login.html";
    //     }
    // });
    // $("#index_collect").click(function () {
    //     if (islogin){
    //         window.location.href = "http://localhost/page/user.html";
    //     }else {
    //         window.location.href = "http://localhost/page/login.html";
    //     }
    // });
    // $("#index_msg").click(function () {
    //     if (islogin){
    //         window.location.href = "http://localhost/page/user.html";
    //     }else {
    //         window.location.href = "http://localhost/page/login.html";
    //     }
    // });
});

function getHotMsg() {      //  获取热卖列表
    var data ="" ;
    var request ="selling" ;
    getData(request ,data) ;
}


function setHostMsg(data) {
    var body="" ;
    $.each(data ,function (n ,value) {
        // value.id ;
        // value.name ;
        // value.price ;
        // value.pic_url ;
        // value.evaluate_num ;
        // value.collection_num ;
        // value.monthly_sale ;
        body +="<ul class='bottom_commodity_ul'><li><a><img src='"+value.pic_url+"'></a><a style='width: 200px '>"+value.name+"</a><div style='padding: 20px'><a>评价<em>"+value.evaluate_num+"</em></a><a style='padding-left: 20px'>收藏<em>"+value.collection_num+"</em></a></div><div><a style='color: red ;font-size: 20px'><span>￥</span><em>"+value.price+"</em></a><a style='color: grey ;font-size: 10px ;text-decoration:line-through '><span>￥</span><em>40</em></a><a style='float: right;color: grey'>月销<em>"+value.monthly_sale+"</em>笔</a></div></li></ul>"

    }) ;

    $("#botton_guessULike").html(body) ;
}

function getData(request ,myData) {
    getMyResponData(request ,myData ,function (data) {
        console.log(data) ;
        if (data.code ==0){
            setHostMsg(data.data)
        }else if (data.code ==1){
            alert("插入失败") ;
        }else if (data.code ==2){
            alert("请检查数据是否为空") ;
        }
    })
}

/*  简单记录
* 数据在页面之前的传递方式
*   1.用户信息数据通过 cookie 方式传递
*   2.其它信息用 url 方式传递
*       传递页
*       var obj = a.value; //传给弹出页面参数
        var url = 'jxb.html?obj='+obj;
        url = encodeURI(url);
        window.open(url, "", "width=600,height=400");


        接收页
        var url = decodeURI(window.location.href);

        var argsIndex = url .split("?obj=");
        var arg = argsIndex[1];
* */


function msgToNextPage(url ,message) {
    var url =url+'?'+message ;
    url =encodeURI(url) ;
    window.location.href =url ;
}

function msgFormUpPage() {
    // var url =decodeURI(window.location.href) ;
    // var argsIndes =url.split("?") ;
    // return argsIndes[1] ;

    msg =$.query.get("pass") ;
    msg2 =$.query.get("name") ;

    $("#name").text("msg") ;
}

