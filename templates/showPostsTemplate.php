<!--show post-->
<div class="row">
    <?php $posts = new Posts(); ?>
    <?php if($posts->getPost()) : ?>
        <?php foreach($posts->getPost() as $post) : ?>
            <?php if ($post['type']==$type['typeName']) : ?>
                <div class="col-md-6 mt-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class='card-title'><?= $post['title'] ?></h5>
                        <p class='card-text'><?= $post['body'] ?></p>
                        <h6 class='card-subtitle text-muted text-right'>Author: <?= $post['author'] ?></h6>
                        <a  href='editForm.php?id=<?= $post['id'] ?>' class='btn btn-warning'>Edit</a>
                        <a href='processes/post.process.php?send=del&id=<?=$post['id']?>' class='btn btn-danger'>Delete</a>
                    </div>
                    </div>
                </div>
            <?php else : ?>
                <p class='mt-5 mx-auto'>There is no posts in this type</p>
            <?php endif?>
        <?php endforeach ?>
    <?php endif?>  
</div>