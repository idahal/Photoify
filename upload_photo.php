<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else {$user = $_SESSION['user'];}?>
<article class="create-account">

<!-- upload photo -->
<h1>Share your photos</h1>
<form class="share-photos" action="app/posts/store.php" method="post" enctype="multipart/form-data">
    <div class="upload-file-style">
     <label for="file-upload" class="custom-file-upload">
    <i class="far fa-image fa-lg"></i>
    Photo
  </label>
  <input type="file"  value="upload file" name="post" id="file-upload" style="display:none;" accept=".png, .jpeg, .jpg" multiple required >
  <input id="uploadFile" placeholder=" No File Choosen" disabled="disabled" />
</div> <!-- end upload-file-style -->
  <!-- <p>Add text to your photo</p> -->
      <input type="text" name="content" placeholder=" Add some text....">

  <button class="upload-photo" type="submit">Share</button>
</form>
</article>
<?php require __DIR__.'/views/footer.php'; ?>
