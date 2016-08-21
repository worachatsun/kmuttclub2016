<form action="bindclub" method="post">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="text" name="student" value="">
  <input type="text" name="club" value="">
  <input type="submit" name="submit" value="submit">
</form>
