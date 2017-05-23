<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Home</title>

</head>

<body>

<div class="article">
    <?php foreach ($article as $value): ?>
        <h1><?php echo $value['title'] ?></h1>
        <span><?php echo date('Y-m-d H:i:s', $value['time']) ?></span>
        <div class="content">
            <?php echo $value['content'] ?>
        </div>
    <?php endforeach; ?>
</div>

</body>

</html>