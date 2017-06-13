/**
 * Created by Administrator on 2017/6/12.
 */
/**
 * 获取点击事件
 * @returns {Event|*}
 */
function getEvent() {
    return window.event || arguments.callee.caller.arguments[0];//arguments.callee.caller.arguments[0]火狐中的获取事件
}

/**
 * 初始化创建皮肤
 * @param a
 * @param b
 * @param c
 */
function createSkin(a, b, c) {
    $("head").append('<div id="hiddenskin"><img id="skin1" src="' + a + '" /><img id="skin2" src="' + b + '" /><img id="skin3" src="' + c + '" /></div>');
}

/**
 * 设置皮肤
 * @param num
 */
function setSkin(num) {
    obj = document.getElementById("skin" + num).src;
    $("#cc_skin").attr("style", "background:url(" + obj + ") no-repeat scroll 50% 0% transparent; width:" + imagewidth + "px;height:" + imageheight + "px;");
}

/**
 * 文字输出特效
 */
function typeWords() {
    var p = 1;
    var str = cc_text.substr(0, _typei);
    var w = cc_text.substr(_typei, 1);
    if (w == "<") {
        str += cc_text.substr(_typei, cc_text.substr(_typei).indexOf(">") + 1);
        p = cc_text.substr(_typei).indexOf(">") + 1;
    }
    _typei += p;
    document.getElementById("cc_tempsay").innerHTML = str;
    txtst = setTimeout("typeWords()", 20);
    if (_typei > cc_text.length) {
        clearTimeout(txtst);
        _typei = 0;
    }
}

/**
 * 自言自语
 * @param talktime
 */
function talkSelf(talktime) {
    if (!isbusy) {
        talktime++;
        var yushu = talktime % talkself;
        if (parseInt(yushu) == parseInt(9)) {
            closeChuncaiMenu();
            // closeNotice();
            // closeInput();
            tsi = Math.floor(Math.random() * talkself_arr.length + 1) - 1;
            chuncaiSay(talkself_arr[tsi][0]);
            setSkin(talkself_arr[tsi][1]);
        }
        talkobj = window.setTimeout("talkSelf(" + talktime + ")", 1000);
    }
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
                var str = '<a href="' + data.url + '" target="_blank">' + data.text + '</a>';
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
    $("#cc_body").fadeIn('normal');
    $("#cc_call").css("display", "none");
    closeChuncaiMenu();
    // closeNotice();
    chuncaiSay("我回来啦～");
}

/**
 * 关闭春菜
 */
function closechuncai() {
    chuncaiSay("记得再叫我出来哦...");
    $("#cc_menu").css("display", "none");
    setTimeout(function () {
        $("#cc_body").fadeOut(1200);
        $("#cc_call").css("display", "block");
    }, 2000);
}

/**
 * 说话
 */
function chuncaiSay(s) {
    clearChuncaiSay();
    $("#cc_tempsay").append(s);
    $("#cc_tempsay").css("display", "block");
    cc_text = s;
    typeWords();
}

/**
 * 清空说话
 */
function clearChuncaiSay() {
    document.getElementById("cc_tempsay").innerHTML = '';
}

/**
 * 打开提示
 */
// function showNotice() {
//     $("#cc_tempsay").css("display", "block");
// }

/**
 * 关闭提示
 */
// function closeNotice() {
//     $("#chuncaisaying").css("display", "none");
// }

/**
 * 打开输入框
 */
function showInput() {
    closeChuncaiMenu();
    // closeNotice();
    chuncaiSay("............?");
    $("#addinput").css("display", "block");
}

/**
 * 关闭输入框
 */
function closeInput() {
    setSkin(3);
    $("#addinput").css("display", "none");
    isbusy = true;
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
    // closeInput();
    chuncaiSay("准备做什么呢？");
    $("#cc_menu").css("display", "block");
    $("#cc_showmenu").css("display", "none");
    $("#cc_tempsay").css("display", "none");
}

/**
 * 关闭菜单
 */
function closeChuncaiMenu() {
    clearChuncaiSay();
    $("#cc_menu").css("display", "none");
    // showNotice();
    $("#cc_showmenu").css("display", "block");
}