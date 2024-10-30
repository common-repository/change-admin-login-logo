
<?php wp_enqueue_media(); ?>
<div class="container">
<div class="panel panel-primary" style="margin-top: 10px;">
  <div class="panel-heading">Add Image
  <!-- <a href="admin.php?page=prt-playlist" class="btn btn-info pull-right" style="margin-top:-8px;box-shadow: -4px 1px;">All Playlist</a> -->
  </div>
  <div class="panel-body">
  <form class="form-horizontal" action="javascript:void(0)" id="frmAddPlaylist">
  <!-- <div class="form-group">
    <label class="control-label col-sm-2" for="email">Image Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" required="" id="name" name="name" placeholder="Enter name">
    </div>
  </div> -->

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Upload Image:</label>
    <div class="col-sm-10">
      <!-- <input type="file" class="form-control" id="file" name="file"> -->
      <button class="btn btn-info" type="button" id="media-gallery">Upload Image from Media</button>
      <input type="hidden" id="upload-img" name="upload-img" />
    </div>
  </div>
  <div class="alert-success" id="msg">
</div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
  </div>
</div>
</div>