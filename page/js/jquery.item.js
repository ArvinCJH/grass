var itemId ="" ;
$(function () {
    itemId =UrlParam.paramValues("itemId") ;
    getCommInfo() ;
    $(document).ready(function ($) {
        $('#itemTab').tabulous({effect:'scale'})
    })


})

function getCommInfo() {
    var num =4 ;
    var myData ="productid="+itemId ;
    forServiceData(num ,myData) ;
}

function forServiceData(num ,myData){
    var reqUrl ="" ;
    if (num==4){
        reqUrl ="commIDInfo" ;
    }


    getMyResponData(reqUrl ,myData ,function (data) {
        console.log(data) ;
        setCommInfo(data.data)
    })
}

function setCommInfo(data) {
    $.each(data ,function (n ,value) {
        $("#item-merchants_sales").text(value.merchants_sales) ;
        $("#item-price").text(value.price) ;
        $("#item-collection_num").text(value.collection_num) ;
        $("#item-evaluate_num").text(value.evaluate_num) ;
        $("#itemFix-evaluate_num").text(value.evaluate_num) ;
        $("#item-h1-name").html(value.name) ;
        // console.log(value.name)
        // value.pic_url ;

        $("#itemPic-img-picUrl").attr("src" ,value.pic_url) ;
        $("#item-quantity_available").text(value.quantity_available) ;

    }) ;

}