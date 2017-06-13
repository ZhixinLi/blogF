/**
 * Created by Administrator on 2017/6/12.
 */
var cc_text = '';
var _typei = 0;
var isbusy = false;
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

$(document).ready(function () {
    var width = document.documentElement.clientWidth - 200 - imagewidth;
    var height = document.documentElement.clientHeight - 180 - imageheight;

    var cwidth = document.documentElement.clientWidth - 100;
    var cheight = document.documentElement.clientHeight - 20;

    var docMouseMoveEvent = document.onmousemove;
    var docMouseUpEvent = document.onmouseup;

    $('body').append(
        '<div id="cc_body">' +
        '<div id="cc_skin">' +
        '</div>' +
        '<div id="cc_dialog">' +
        '<div id="cc_dialog_top">' +//头部
        '</div>' +
        '<div id="cc_dialog_body">' +
        '<div id="cc_tempsay">' +
        '</div>' +
        '<div id="cc_menu">' +
        '<ul class="cc_mlist" id="cc_notice">显示公告</ul>' +
        '<ul class="cc_mlist" id="cc_chat">聊天</ul>' +
        '<ul class="cc_mlist" id="cc_admin">博客后台</ul>' +
        '<ul class="cc_mlist" id="cc_lifetime">生存时间</ul>' +
        '<ul class="cc_mlist" id="cc_close">关闭春菜</ul>' +
        '</div>' +
        '<div id="cc_showmenu"> ' +
        '</div>' +
        '</div>' +
        '<div id="cc_dialog_footer">' +//底部
        '</div>' +
        '</div>' +
        '</div>' +
        '<div id="addinput">' +
        '<div id="inp_l">' +
        '<input id="talk" type="text" name="mastersay" value="" /> ' +
        '<input id="inp_r" type="button" value="X" /> ' +
        '<input id="talkto" type="button" value="搜索" />' +
        '</div>' +
        '</div>' +
        '<div id="cc_call">召唤春菜</div>'
    );

    setSkin(1);
    chuncaiSay('eeee');

    var cc_jq = $("#cc_body");//jQuery对象
    var cc_do = document.getElementById("cc_body");//HTML DOM对象


    cc_jq.css('left', width + 'px');
    cc_jq.css('top', height + 'px');
    cc_jq.css('width', imagewidth + 'px');
    cc_jq.css('height', imageheight + 'px');
    $("#cc_call").attr("style", "top:" + cheight + "px; left:" + cwidth + "px; text-align:center;");

    cc_do.onmousedown = function () {
        var ent = getEvent();//获取点击事件
        var moveX = ent.clientX;
        var moveY = ent.clientY;

        var moveTop = parseInt(cc_do.style.top);
        var moveLeft = parseInt(cc_do.style.left);

        document.onmousemove = function () {//移动
            var ent = getEvent();
            var x = moveLeft + ent.clientX - moveX;
            var y = moveTop + ent.clientY - moveY;

            cc_do.style.left = x + "px";
            cc_do.style.top = y + "px";
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

    cc_do.addEventListener('touchstart', function (event) {//点击
        var touch = event.targetTouches[0];  // 把元素放在手指所在的位置
        touchX = touch.clientX;
        touchY = touch.clientY;

        touchTop = parseInt(cc_do.style.top);
        touchLeft = parseInt(cc_do.style.left);
    }, false);

    cc_do.addEventListener('touchmove', function (event) {//移动
        event.preventDefault();//阻止其他事件
        if (event.targetTouches.length == 1) {// 如果这个元素的位置内只有一个手指的话
            var touch = event.targetTouches[0];  // 把元素放在手指所在的位置

            var x = touchLeft + touch.clientX - touchX;
            var y = touchTop + touch.clientY - touchY;

            cc_do.style.left = x + 'px';
            cc_do.style.top = y + 'px';
        }
    }, false);

    talkSelf(talktime);

    //春菜的操作
    $("#cc_call").click(function () {
        setSkin(2);
        callchuncai();
    });

    $("#cc_close").click(function () {
        setSkin(3);
        closechuncai();
    });

    $("#cc_chat").click(function () {
        isbusy = false;
        $('#talk').bind('keypress', function (event) {
            if (event.keyCode == 13) {
                askdata();
            }
        });
        showInput();
    });

    $("#talkto").click(function () {
        askdata();
    });

    $("#inp_r").click(function () {
        closeInput();
        chuncaiSay('不聊天了吗？(→_→)');
        setSkin(3);
    });

    $("#cc_showmenu").click(function () {
        chuncaiMenu();
        setSkin(1);
    });

    $('#cc_admin').click(function () {
        closeChuncaiMenu();
        // closeNotice();
        $("#cc_menu").css("display", "none");
        chuncaiSay("马上就跳转到后台管理页面去了哦～～～");
        setSkin(2);
        setTimeout(function () {
            window.location.href = './admin-index';
        }, 2000);
    })

});