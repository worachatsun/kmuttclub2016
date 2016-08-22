<form class="" action="addclub" method="post">

  <div class="col-xs-12">
    <div class="note note-success" style="margin-right: 0px;">
      <h1 class="block text-center">Confirm Page</h1>
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      <label for="label">CLUB NAME</label>
      <input type="text" class="form-control input-circle" name="club_name" value="{{ $club_name }}" disabled >
    </div>
    <div class="form-group">
      <label for="label">CLUB SECRET CODE</label> 
      <input type="text" class="form-control input-circle" value="{{ $club_secret_code }}" disabled >
    </div>
    <hr>
    <input type="hidden" name="club_id" value="{{ $club_secret_code }}">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    <!--<div class="form-group">
      <label for="label">STUDENT NAME</label> 
      <input type="text" class="form-control input-circle" value="" disabled >
    </div>
    <div class="form-group">
      <label for="label">STUDENT ID</label> 
      <input type="text" class="form-control input-circle" value="" disabled >
    </div>-->
  </div>
  <button type="submit" class="btn btn-block blue" style="font-size: 20px; padding: 20px 0; margin-bottom: 70px;">Confirm Registration</button>
</form>
