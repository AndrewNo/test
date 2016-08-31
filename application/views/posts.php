<div class="container">
    <?php foreach ($posts as $post) { ?>
        <a href="<?= base_url(); ?>index.php/post/view/<?= $post['id'] ?>"><h2><?= $post['title']; ?></h2></a>
        <img src="<?= base_url(); ?>uploads/<?= $post['img'] ?>" alt="">
        <p><?= $post['content']; ?></p>
        <p><?= $post['author']; ?></p>
        <p><?= $post['dt']; ?></p>

        <form action="" method="post">
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <label for="author">Name</label><br><?=form_error('author')?>
            <input type="author" name="author" id="author" value="<?=set_value('author');?>"><br>
            <label for="content">Comment</label><br><?=form_error('content')?>
            <textarea name="content " id="comments" value="<?=set_value('content');?>"></textarea><br>
            <input type="submit" value="Send comment" name="add"><br>
        </form>
    <?php } ?>
    <div class="pagination">
        <?= $this->pagination->create_links(); ?>
    </div>
</div>