<div class="container">
    <form action="<?=base_url()?>index.php/post/create/" method="post" enctype="multipart/form-data">
        <br><input type="text" name="title">Title<br>
        <textarea name="content"></textarea>Content<br>
        <input type="file" name="userfile">Image<br><br>
        <input type="submit" name="new_post">
    </form>
</div>