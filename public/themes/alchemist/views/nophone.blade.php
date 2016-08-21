<form action="bindclub" method="post">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="text" name="std_id" value="">
  <input type="text" name="name" value="">
  <input type="text" name="surname" value="">
  <input type="text" name="email" value="">
  <input type="text" name="fb" value="">
  <input type="text" name="faculty" value="">
  <input type="text" name="std_secret_code" value="">
  <input type="submit" name="submit" value="submit">
</form>
