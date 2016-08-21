<form action="nophone" method="post">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <label for="">std_id</label>
  <input type="text" name="std_id" value="">
  <label for="">name</label>
  <input type="text" name="name" value="">
  <label for="">surname</label>
  <input type="text" name="surname" value="">
  <label for="">email</label>
  <input type="text" name="email" value="">
  <label for="">fb</label>
  <input type="text" name="fb" value="">
  <label for="">faculty</label>
  <input type="text" name="faculty" value="">
  <label for="">std_secret_code</label>
  <input type="text" name="std_secret_code" value="">
  <input type="submit" name="submit" value="submit">
</form>
