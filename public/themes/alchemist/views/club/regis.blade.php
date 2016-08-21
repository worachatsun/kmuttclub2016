<div class="page-content">
  <div class="container">
    
    <div class="row">
      <div class="col-md-12 ">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption font-red-sunglo">
              <i class="icon-settings font-red-sunglo"></i>
              <span class="caption-subject bold uppercase"> Input Information</span>
            </div>
          </div>
          <div class="portlet-body form">
            <form role="form" action="{{ url('club/regis') }}" method="post">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="form-body col-md-6 col-md-offset-3">
                  <div class="form-group form-md-line-input has-info">
                    <input type="text" class="form-control input-lg" name="club_id" id="form_control_1" placeholder="">
                    <label for="form_control_1">Input student secret code</label>
                    <span class="help-block">Input student code 5 digit</span>
                  </div>
              </div>
              <div class="form-actions noborder">
                <center>
                  <button type="submit" class="btn blue">Submit</button>
                </center>
              </div>

            </form>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
<div class="page-footer">
<div class="container">
   2016 &copy; Alchemist ITBangmod
</div>
