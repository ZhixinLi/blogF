<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>

<body>
<h2>Hello,<?php echo $userinfo['nick']; ?></h2>
<button id="add">新增</button>
<div id="article" style="width:50%;margin: 0 auto">
    <?php foreach ($article as $value): ?>
        <h3><?php echo date('Y-m-d H:i:s', $value['time']) ?>****<?php echo $value['title'] ?></h3>
        <button>修改</button>
        <button>删除</button>
        <hr>
    <?php endforeach; ?>

</div>
</body>
</html>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('#add').click(function () {
        if ($('#title').length == 0) {
            $('#article').append('<label>标题: <input type="text" id="title"> </label> <br><br><label>内容: <textarea id="content" style="width: 80%;height: 200px"> </textarea></label> <button id="commit">提交</button>');
        }
    });

    $(document).on('click', '#commit', function () {
        $.ajax({
            type: 'POST',
            url: "<?php echo dirname($_SERVER['PHP_SELF']) . '/admin-add'?>",
            data: {
                title: $('#title').val(),
                content: $('#content').val()
            },
            success: function () {
                location.reload();
            },
            error: function () {
                alert('请求错误，请刷新重试!')
            }
        });
    });
</script>