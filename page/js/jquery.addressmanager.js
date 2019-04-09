$(function () {
    var userid = $.cookie('userid');
    // var userid =1;
    if (userid ==null){
        window.location.href="../../index.html" ;
    }else {
        addressGetData() ;
    }
    // $("#addressManagerFrom").hide() ;
    $("#add_newaddress_btn").click(function () {
        // $("#addressManagerFrom").fadeIn(2000) ;      // 淡入淡出效果
        // $("#addressManagerFrom").slideDown(1000) ;      // 滑动效果
        $("#addressManagerFrom").slideToggle(1000) ;      // 滑动效果
        // $("#addressManagerFrom").show() ;

    }) ;
    $("#adrress_cancel").click(function () {
        // $("#addressManagerFrom").fadeOut(2000) ;
        $("#addressManagerFrom").slideUp(500) ;
        // $("#addressManagerFrom").hide() ;
    }) ;

    $("#address_new").click(function () {
        var userRegion = $("#address_name").val();
        var postalCode = $("#postal_code").val();
        var stressId = $("#address_streetid").val();
        var consignee = $("#address_username").val();
        var receive_phone = $("#address_phone").val();
        // $("input[type='checkbox']").is(':checked');选中为true,未选中为false；
        var address_default =$("#address_default").is(":checked") ;
        // if (userRegion.length !=null &&postalCode !=null &&stressId !=null &&consignee !=null &&receive_phone !=null){
        if (userRegion.length !=0 &&postalCode.length !=0 &&stressId.length !=0 &&consignee.length !=0 &&receive_phone.length !=0){
            var defaultStatu =2 ;
            if (address_default) defaultStatu =1 ;
            var url="../php/addressManagerAdd.php" ;
            var myData ="userRegion="+userRegion+"&postalCode="+postalCode+
                "&stressId="+stressId+"&consignee="+consignee+
                "&receive_phone="+receive_phone+"&address_default="+defaultStatu+"&userid="+userid;
            $.ajax({
                url:url ,
                type:"POST" ,
                dataType:"json" ,
                data:myData ,
                success:function (data) {
                    // alert(data) ;
                    // console.log(data) ;
                    if (data.code ==0){
                        window.location.reload(true) ;      //  刷新当前页面
                        // alert("增加成功") ;
                    }else if (data.code ==1){
                        alert("增加失败") ;
                    }else if (data.code ==2){
                        alert("请检查数据是否为空") ;
                    }
                } ,error:function () {
                    alert("error"+request.status) ;
                }
            }) ;
        } else {
            alert("请检查是否为空") ;
        }
    });

    function addressGetData() {      //  查询数据
        var request = new XMLHttpRequest();
        var url = "../php/addressManagerQuery.php";
        var myData = "userid=" + userid;
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: myData,
            success: function (data) {
                // alert(data) ;
                console.log(data);
                if (data.code == 0) {
                    jsonMsg(data.data);
                    if((data.data).length ==0){
                        // alert("空") ;
                        var trs ="<lable>未添加地址</lable>" ;
                        $("#hasAddress_tbody").prepend(trs) ;
                    }
                    // alert("查询成功");
                } else if (data.code == 1) {
                    alert("查询失败");
                } else if (data.code == 2) {
                    alert("请检查数据是否为空");
                }
            }, error: function () {
                alert("error" + request.status);
            }
        });
    }


    function jsonMsg(jsonData) {
        var msgBody ="" ;
        $.each(jsonData ,function (n, value) {
            var addressdefault ="设置默认" ;
            if (value.address_default ==1) {
                addressdefault ="默认地址" ;
            }
            var trs ="" ;
            trs +="<tr><td id=\"address_realname\">"+value.consignee+"</td><td id=\"address_realaddress\">"+value.address_detail+"</td><td id=\"address_realphone\">"+value.receive_phone+"</td><td id=\"address_realisdefault\">"+addressdefault+"</td></tr>" ;
            msgBody +=trs ;
        }) ;
        $("#hasAddress_tbody").prepend(msgBody) ;
    }
})