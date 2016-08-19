<div class="page-header">
<div class="page-header-top">
  <div class="container">
    <div class="page-logo">
      <a href="index.html"><img src="../../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
    </div>

    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <li class="dropdown dropdown-user dropdown-dark">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <img alt="" class="img-circle" src="../../assets/admin/layout3/img/avatar9.jpg">
          <span class="username username-hide-mobile">กรรชัย</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-default">
            <li>
              <a href="extra_profile.html">
              <i class="icon-user"></i> My Profile </a>
            </li>
            <li>
              <a href="page_calendar.html">
              <i class="icon-calendar"></i> My Calendar </a>
            </li>
            <li class="divider">
            </li>>
            <li>
              <a href="login.html">
              <i class="icon-key"></i> Log Out </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="page-header-menu">
  <div class="container">
    <form class="search-form" action="extra_search.html" method="GET">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="query">
        <span class="input-group-btn">
        <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
        </span>
      </div>
    </form>
  </div>
</div>
</div>
<div class="page-container">
<div class="page-head">
  <div class="container">
    <div class="page-title">
      <h1>สวัสดี <small>กรรชัย สดหอม</small> <small>คณะเทคโนโลยีสารสนเทศ</small></h1>
    </div>
  </div>
</div>
<div class="page-content">
  <div class="container">
    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
             Widget settings form goes here
          </div>
          <div class="modal-footer">
            <button type="button" class="btn blue">Save changes</button>
            <button type="button" class="btn default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
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
            <form role="form" action="addclub" method="post">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="form-body col-md-6 col-md-offset-3">
                  <div class="form-group form-md-line-input has-info">
                    <input type="text" class="form-control input-lg" name="club_id" id="form_control_1" placeholder="กรอกรหัสชมรม">
                    <label for="form_control_1">Club Code</label>
                    <span class="help-block">Club Code 5 digit</span>
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
