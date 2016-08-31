<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .header, .footer {
        width: 100%;
        min-width: 1000px;
        height: 100px;
        background-color: #2eb7d6;
        text-align: right;
    }

    .footer {
        text-align: center;
        background-color: #27d6a8;
        height: 50px;
    }

    .footer > .container p {
        padding-top: 10px;
    }
    .container {
        width: 80%;
        min-width: 800px;
        margin: 0 auto;
    }
    .pagination {
        text-align: center;
    }
</style>
<body>
<div class="header">
    <div class="container">
        <?php if (!empty($data['user'])) {?>
            <a href="<?=base_url();?>index.php/user/logout">Exit</a><br><br>
            <a href="<?=base_url();?>index.php/post/create"">Add post</a>

        <?php } else {?>
        <br><a href="<?=base_url();?>index.php/user/auth">Enter</a> || <a href="<?=base_url();?>index.php/user/reg">Regestration</a>
        <?php } ?>
    </div>
</div>

