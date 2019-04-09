// float
function buffer(a, b, c) {              //  b 反应时间
    var d;
    return function () {
        if (d) return;
        d = setTimeout(function () {
            a.call(this), d = undefined
        }, b)
    }
}

(function () {
    function e() {
        var d = document.body.scrollTop || document.documentElement.scrollTop;
        d > b ? (a.className = "div1 fixedMsg", c && (a.style.top = d - b + "px")) : a.className = "div1"
    }

    var a = document.getElementById("item_fixed_part");
    if (a == undefined) return !1;
    var b = 0, c, d = a;
    while (d) b += d.offsetTop, d = d.offsetParent;
    c = window.ActiveXObject && !window.XMLHttpRequest;
    if (!c || !0) window.onscroll = buffer(e, 150, this)
})();