
// register
//  自动判断是否正确函数
// document

//  密码
$(function () {


    // $("#affirm_password_input").focus(function () {
    //     $("#affirm_password_label").text("") ;
    // })
    // .blur(function () {		// 离开时判断
    //     if ($("#affirm_password_input").val() ==$("#login_password_input").val() ){
    //         $("#affirm_password_label").text("samepass") ;
    //     }
    // }) ;

    // $("#login_envelope_input").focus(function () {
    //     $("#login_envelope_label").text("") ;
    // }).blur(function () {
    //     // $("#login_envelope_label").text("===") ;
    //     var request =new XMLHttpRequest() ;
    //     var url ="php/register.php" ;
    //     $.ajax({
    //         url:url+"?usermail="+$("#login_envelope_input").val(),
    //         type:"GET",
    //         dataType:"json",
    //         async:false ,
    //         success:function (data) {
    //             alert(data.msg) ;
    //             // var dataObj=eval("("+data+")");//转换为json对象
    //             // if (data.success)
    //             //     $("#login_envelope_label").text("data1"+data) ;
    //             // else $("#login_envelope_label").text("data2"+data.msg) ;
    //             // alert("test") ;
    //             // alert(data +"=\n-"+dataObj+"\n---"+dataObj.msg) ;
    //         },error:function () {
    //             alert("error"+request.status) ;
    //         }
    //     })
    // }) ;
})

// ajax