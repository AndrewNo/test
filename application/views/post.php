<div class="container">

        <h2><?=$post['title'];?></h2>
        <img src="<?= base_url(); ?>uploads/<?= $post['img'] ?>" alt="">
        <p><?=$post['content'];?></p>
        <p><?=$post['author'];?></p>
        <p><?=$post['dt'];?></p>

    <form action="" method="post">
        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
        <label for="author">Name</label><?=form_error('author')?><br>
        <input type="text" name="author" id="author" value="<?=set_value('author');?>"><br>
        <label for="content">Comment</label><br><?=form_error('content')?>
        <textarea name="content " id="content" value="<?=set_value('content');?>"></textarea><br>
        <input type="submit" value="Send comment" name="add"><br>
    </form>
</div>
