/**
 * Created by Administrator on 2017/6/2.
 */
var weichuncai_text = '';
var _typei = 0;

$(document).ready(function () {
    var width = document.documentElement.clientWidth - 200 - imagewidth;
    var height = document.documentElement.clientHeight - 180 - imageheight;

    var cwidth = document.documentElement.clientWidth - 100;
    var cheight = document.documentElement.clientHeight - 20;

    var docMouseMoveEvent = document.onmousemove;
    var docMouseUpEvent = document.onmouseup;

    $("body").append('' +
        '<div id="smchuncai" onfocus="this.blur();" style="color:#626262;z-index:999;"><div id="chuncaiface">' +
        '</div>' +
        '<div id="dialog_chat">' +
        '<div id="chat_top">' +
        '</div>' +
        '<div id="dialog_chat_contents">' +
        '<div id="dialog_chat_loading">' +
        '</div>' +
        '<div id="tempsaying">' +
        '</div>' +
        '<div id="showchuncaimenu">' +
        '<ul class="wcc_mlist" id="shownotice">显示公告</ul>' +
        '<ul class="wcc_mlist" id="chatTochuncai">聊天</ul>' +
        '<ul class="wcc_mlist" id="blogmanage">博客后台</ul>' +
        '<ul class="wcc_mlist" id="lifetimechuncai">生存时间</ul>' +
        '<ul class="wcc_mlist" id="closechuncai">关闭春菜</ul>' +
        '</div>' +
        '<div>' +
        '<ul id="chuncaisaying"></ul>' +
        '</div>' +
        '<div id="getmenu"> ' +
        '</div>' +
        '</div>' +
        '<div id="chat_bottom">' +
        '</div>' +
        '</div>'
    );

    var chuncai = $("#smchuncai");//jQuery对象

    $("body").append('' +
        '<div id="addinput">' +
        '<div id="inp_l">' +
        '<input id="talk" type="text" name="mastersay" value="" /> ' +
        '<input id="talkto" type="button" value=" " />' +
        '<input id="inp_r" type="button" value="X" /> ' +
        '</div>'
    );

    $("body").append('<div id="callchuncai">召唤春菜</div>');

    setFace(1);

    chuncai.css('left', width + 'px');
    chuncai.css('top', height + 'px');
    chuncai.css('width', imagewidth + 'px');
    chuncai.css('height', imageheight + 'px');
    $("#callchuncai").attr("style", "top:" + cheight + "px; left:" + cwidth + "px; text-align:center;");

    smcc = document.getElementById("smchuncai");//HTML DOM对象

    //PC端的移动效果
    smcc.onmousedown = function () {
        var ent = getEvent();//获取点击事件
        var moveX = ent.clientX;
        var moveY = ent.clientY;

        var obj = document.getElementById("smchuncai");
        var moveTop = parseInt(obj.style.top);
        var moveLeft = parseInt(obj.style.left);

        document.onmousemove = function () {//移动
            var ent = getEvent();
            var x = moveLeft + ent.clientX - moveX;
            var y = moveTop + ent.clientY - moveY;

            obj.style.left = x + "px";
            obj.style.top = y + "px";
        };

        document.onmouseup = function () {//移动结束
            document.onmousemove = docMouseMoveEvent;
            document.onmouseup = docMouseUpEvent;
        };
    };

    //移动端的移动效果
    var touchX = 0;
    var touchY = 0;
    var touchTop = 0;
    var touchLeft = 0;

    smcc.addEventListener('touchstart', function (event) {//点击
        var touch = event.targetTouches[0];  // 把元素放在手指所在的位置
        touchX = touch.clientX;
        touchY = touch.clientY;

        var obj = document.getElementById("smchuncai");
        touchTop = parseInt(obj.style.top);
        touchLeft = parseInt(obj.style.left);
    }, false);

    smcc.addEventListener('touchmove', function (event) {//移动
        event.preventDefault();//阻止其他事件
        if (event.targetTouches.length == 1) {// 如果这个元素的位置内只有一个手指的话
            var touch = event.targetTouches[0];  // 把元素放在手指所在的位置

            var x = touchLeft + touch.clientX - touchX;
            var y = touchTop + touch.clientY - touchY;

            smcc.style.left = x + 'px';
            smcc.style.top = y + 'px';
        }
    }, false);

    //春菜的操作
    $("#callchuncai").click(function () {
        setFace(2);
        callchuncai();
    });

    $("#closechuncai").click(function () {
        setFace(3);
        closechuncai();
    });

    $("#getmenu").click(function () {
        chuncaiMenu();
        setFace(1);
    });

    $("#chatTochuncai").click(function () {
        showInput();
    });

    $("#talkto").click(function () {
        askdata();
    });

    $("#inp_r").click(function () {
        closeInput();
        chuncaiSay('不聊天了吗？(→_→)');
        setFace(3);
    });

    $("#lifetimechuncai").click(function () {
        closeChuncaiMenu();
        closeNotice();
        setFace(2);
    });

    // talkSelf(talktime);

    // document.getElementById("smchuncai").onmouseover = function () {
    //     if (talkobj) {
    //         clearTimeout(talkobj);
    //     }
    //     talktime = 0;
    //     talkSelf(talktime);
    // }
});

var isbusy = true;//空闲时自言自语
var talktime = 0;
var talkself = 30;//设置自言自语频率（单位：秒）
var talkobj;
var tsi = 0;
var talkself_arr = [
    ["白日依山尽，黄河入海流，欲穷千里目，更上.....一层楼？", "1"],
    ["我看见主人熊猫眼又加重了！", "3"],
    ["我是不是很厉害呀～～？", "2"],
    ["5555...昨天有个小孩子跟我抢棒棒糖吃.....", "3"],
    ["昨天我好像看见主人又在众人之前卖萌了哦～", "2"]
];

function talkSelf(talktime) {
    talktime++;
    var yushu = talktime % talkself;
    if (parseInt(yushu) == parseInt(9)) {
        closeChuncaiMenu();
        closeNotice();
        closeInput();
        tsi = Math.floor(Math.random() * talkself_arr.length + 1) - 1;
        chuncaiSay(talkself_arr[tsi][0]);
        setFace(talkself_arr[tsi][1]);
    }
    talkobj = window.setTimeout("talkSelf(" + talktime + ")", 1000);
}

/**
 * 图灵机器人问问题
 */
function askdata() {
    $.ajax({
        type: 'POST',
        url: 'http://www.tuling123.com/openapi/api?key=3b98268b94f1488d838c011b5710ec30&info=' + $('#talk').val(),
        dataType: 'json',
        success: function (data) {
            if (data.url) {
                var str = '<a href="' + data.url + '">' + data.text + '</a>';
                chuncaiSay(str);
            } else {
                chuncaiSay(data.text);
            }
        },
        error: function () {
            chuncaiSay('好像出错了，是什么错误呢...请联系管理猿');
        }
    });
}

/**
 * 开启春菜
 */
function callchuncai() {
    $("#smchuncai").fadeIn('normal');
    $("#callchuncai").css("display", "none");
    closeChuncaiMenu();
    closeNotice();
    chuncaiSay("我回来啦～");
}

function closechuncai() {
    chuncaiSay("记得再叫我出来哦...");
    $("#showchuncaimenu").css("display", "none");
    setTimeout(function () {
        $("#smchuncai").fadeOut(1200);
        $("#callchuncai").css("display", "block");
    }, 2000);
}

/**
 * 创建皮肤
 * @param a
 * @param b
 * @param c
 */
function createFace(a, b, c) {
    $("head").append('<div id="hiddenfaces"><img id="hf1" src="' + a + '" /><img id="hf2" src="' + b + '" /><img id="hf3" src="' + c + '" /></div>');
    // setFace(1);
}

/**
 * 设置皮肤
 * @param num
 */
function setFace(num) {
    obj = document.getElementById("hf" + num).src;
    $("#chuncaiface").attr("style", "background:url(" + obj + ") no-repeat scroll 50% 0% transparent; width:" + imagewidth + "px;height:" + imageheight + "px;");
}

/**
 * 获取事件
 * @returns {Event|*}
 */
function getEvent() {
    return window.event || arguments.callee.caller.arguments[0];
}

/**
 * 说话
 */
function chuncaiSay(s) {
    clearChuncaiSay();
    $("#tempsaying").append(s);
    $("#tempsaying").css("display", "block");
    weichuncai_text = s;
    typeWords();
}

function clearChuncaiSay() {
    document.getElementById("tempsaying").innerHTML = '';
}

/**
 * 打开提示
 */
function showNotice() {
    $("#chuncaisaying").css("display", "block");
}

function closeNotice() {
    $("#chuncaisaying").css("display", "none");
}

/**
 * 打开输入框
 */
function showInput() {
    closeChuncaiMenu();
    closeNotice();
    chuncaiSay("............?");
    $("#addinput").css("display", "block");
}

function closeInput() {
    setFace(3);
    $("#addinput").css("display", "none");
}

/**
 * 清空输入框
 */
function clearInput() {
    document.getElementById("talk").value = '';
}

/**
 * 打开菜单
 */
function chuncaiMenu() {
    clearChuncaiSay();
    closeInput();
    chuncaiSay("准备做什么呢？");
    $("#showchuncaimenu").css("display", "block");
    $("#getmenu").css("display", "none");
    $("#chuncaisaying").css("display", "none");
}

function closeChuncaiMenu() {
    clearChuncaiSay();
    $("#showchuncaimenu").css("display", "none");
    showNotice();
    $("#getmenu").css("display", "block");
}

/**
 * 文字输出特效
 */
function typeWords() {
    var p = 1;
    var str = weichuncai_text.substr(0, _typei);
    var w = weichuncai_text.substr(_typei, 1);
    if (w == "<") {
        str += weichuncai_text.substr(_typei, weichuncai_text.substr(_typei).indexOf(">") + 1);
        p = weichuncai_text.substr(_typei).indexOf(">") + 1;
    }
    _typei += p;
    document.getElementById("tempsaying").innerHTML = str;
    txtst = setTimeout("typeWords()", 20);
    if (_typei > weichuncai_text.length) {
        clearTimeout(txtst);
        _typei = 0;
    }
}
