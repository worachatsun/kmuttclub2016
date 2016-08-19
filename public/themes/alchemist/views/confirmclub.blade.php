<form class="" action="addclub" method="post">
  <input type="text" name="club_name" value="{{ $club_name }}" disabled>
  <input type="text" value="{{ $club_secret_code }}" disabled>
  <input type="hidden" name="club_id" value="{{ $club_secret_code }}">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="submit" name="submit" value="submit">
</form>
