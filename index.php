<?php 
  require_once("./templates/header.php");
  require("./classes/dbh.class.php");
  require("./classes/posts.class.php");
  require("./classes/types.class.php");
?>
<div class="text-left">
  <button class="my-5 btn btn-warning" data-toggle="modal" data-target="#addTypeModal">Craete Type</button>
  <button class="my-5 btn btn-primary" data-toggle="modal" data-target="#addPostModal">Craete Post</button>
</div>

<!-- Add New Post Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <!-- form input -->
        <form method="POST" action="processes/post.process.php">
          <div class="form-group">
            <label>Title: </label>
            <input class="form-control" name="post-title" type="text" required>
          </div>
          <div class="form-group">
            <label>Content: </label>
            <textarea class="form-control"  name="post-content" required></textarea>
          </div>
          <div class="form-group">
            <label>Author: </label>
            <input class="form-control" name="post-author" type="text" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Add post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Add New Post Modal Close-->


<!-- Add New Type Modal Start-->
<div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <!-- form input -->
        <form method="POST" action="processes/type.process.php">
          <div class="form-group">
            <label>Type Name: </label>
            <input class="form-control" name="typeName" type="text" required>
          </div>
          <div class="form-group">
            <label>Type Content: </label>
            <textarea class="form-control"  name="typeContent" required></textarea>
          </div>
          <div class="form-group">
            <label>Author: </label>
            <input class="form-control" name="typeAuthor" type="text" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Add Type</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Add New Type Modal Close-->

<!--show type-->
<div class="row">
  <?php $types = new Types(); ?>
    <?php if($types->getType()) : ?>
      <?php foreach($types->getType() as $type) : ?>
        <div class="col-md-6 mt-4">
          <div class="card">
            <div class="card-body">
              <h5 class='card-title'><?= $type['typeName'] ?></h5>
              <!--
              <p class='card-text'><?= $type['typeContent'] ?></p>
              <h6 class='card-subtitle text-muted text-right'>Author: <?= $type['typeAuthor'] ?></h6>
              -->
              <a  href='editType.php?id=<?= $type['typeID'] ?>' class='btn btn-warning'>Edit</a>
              <a href='processes/type.process.php?send=del&typeID=<?=$type['typeID']?>' class='btn btn-danger'>Delete</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else : ?>
      <p class='mt-5 mx-auto'>There is no type</p>
    <?php endif?>  
</div>

<?php 
  require_once("./templates/footer.php");
?>