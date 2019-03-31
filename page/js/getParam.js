UrlParam = function() { // url参数
    var data, index;
    (function init() {
        data = []; //值，如[["1","2"],["zhangsan"],["lisi"]]
        index = {}; //键:索引，如{a:0,b:1,c:2}
        var u = window.location.search.substr(1);
        if (u != '') {
            var params = decodeURIComponent(u).split('&');
            for (var i = 0, len = params.length; i < len; i++) {
                if (params[i] != '') {
                    var p = params[i].split("=");
                    if (p.length == 1 || (p.length == 2 && p[1] == '')) {// p | p= | =
                        data.push(['']);
                        index[p[0]] = data.length - 1;
                    } else if (typeof(p[0]) == 'undefined' || p[0] == '') { // =c 舍弃
                        continue;
                    } else if (typeof(index[p[0]]) == 'undefined') { // c=aaa
                        data.push([p[1]]);
                        index[p[0]] = data.length - 1;
                    } else {// c=aaa
                        data[index[p[0]]].push(p[1]);
                    }
                }
            }
        }
    })();
    return {
        // 获得参数,类似request.getParameter()
        param : function(o) { // o: 参数名或者参数次序
            try {
                return (typeof(o) == 'number' ? data[o][0] : data[index[o]][0]);
            } catch (e) {
            }
        },
        //获得参数组, 类似request.getParameterValues()
        paramValues : function(o) { // o: 参数名或者参数次序
            try {
                return (typeof(o) == 'number' ? data[o][0] : data[index[o]][0]);
            } catch (e) {}
        },
        //是否含有paramName参数
        hasParam : function(paramName) {
            return typeof(paramName) == 'string' ? typeof(index[paramName]) != 'undefined' : false;
        },
        // 获得参数Map ,类似request.getParameterMap()
        paramMap : function() {
            var map = {};
            try {
                for (var p in index) { map[p] = data[index[p]]; }
            } catch (e) {}
            return map;
        }
    }
}();


function showTip(tipmsg) {
    var tipStr ="" ;
    var hasReflash =true ;
    if (tipmsg =="0"){
        tipStr ="提交成功" ;
    } else if (tipmsg =="1"){
        tipStr ="增加成功" ;
    } else if (tipmsg =="2"){
        tipStr ="修改成功" ;
    } else if (tipmsg =="3"){
        tipStr ="删除成功" ;
    } else if (tipmsg =="4"){
        tipStr ="查询成功" ;
    } else if (tipmsg =="5"){
        tipStr ="分享成功" ;
        hasReflash =false ;
    } else if (tipmsg =="6"){
        tipStr ="取消分享" ;
        hasReflash =false ;
    } else if (tipmsg =="-1"){
        tipStr ="增加失败" ;
    } else if (tipmsg =="-2"){
        tipStr ="修改失败" ;
    } else if (tipmsg =="-3"){
        tipStr ="删除失败" ;
    } else if (tipmsg =="-4"){
        tipStr ="查询失败" ;
    } else if (tipmsg =="-5"){
        tipStr ="提交失败" ;
    } else if (tipmsg =="-6"){
        tipStr ="分享失败" ;
    } else if (tipmsg =="7"){
        tipStr ="请检查数据是否为空" ;
    } else {
        tipStr ="请检查输入值" ;
    }
    var tip ="<div id='tipbox' class='showTip' style='display:none;'>"+tipStr+"</div>" ;
    $("body").append(tip) ;
    $ ('#tipbox').show ().delay (500).fadeOut (1000,function () {
        $(this).remove() ;
        if (hasReflash){
            window.location.reload() ;
        } else return ;

    });
}


var showCheckDialog = function(param){
    var title = param.title,
        content = param.content,
        yesText = param.yesText || '确定',
        noText = param.noText,
        yesFn = param.yesFn ;

    var htm = "";
    htm += '<div class="showChecktip"><div class="showChecktip_bg">';
    if (title) htm += '<header class="showChecktip_title">' + title + '</header>';
    htm += '<div class="showChecktip_context">' + content + '</div></div>';
    if (!noText){
        htm += '<footer class="showChecktip_footer">' +
            '<a href="#" class=" showChecktip_btn showChecktip_btn-lg" data-role="closeBtn" id="yes_long_btn">' + yesText + '</a>' +
            '</footer>';
        htm += '</div>';
    }
    else{
        htm += '<footer class="showChecktip_footer">' +
            '<a href="#" class=" showChecktip_btn showChecktip_btn-st" id="yes_btn">' + yesText + '</a>' +
            '<a href="#" class=" showChecktip_btn showChecktip_btn-st" data-role="closeBtn">' + noText + '</a>' +
            '</footer>';
        htm += '</div>';
    }

    $("body").append(htm);

    var closeBtn = $(".showChecktip");
    closeBtn.on("click", '[data-role="closeBtn"]', function() {
        $(".showChecktip").remove();
    });

    $("#yes_btn,#yes_long_btn").bind("click" , function () {
        $(".showChecktip").remove();
        if(param.yesFn){
            param.yesFn();
        }
        param = {};
    });
}