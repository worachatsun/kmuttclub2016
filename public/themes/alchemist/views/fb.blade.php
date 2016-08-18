
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.html"><img src="<?php echo url(""); ?>/themes/alchemist/assets/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->

			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a class="btn yellow-gold" href="{{ url('auth/logout') }}">
              <i class="icon-key"></i> Log Out 
            </a>
					<li>
        </ul>						
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
	</div>
	<!-- END HEADER TOP -->
	<!-- BEGIN HEADER MENU -->
	<div class="page-header-menu">
		<div class="container">
			<!-- BEGIN HEADER SEARCH BOX -->
			<form class="search-form" action="extra_search.html" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN MEGA MENU -->
			<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
		</div>
	</div>
	<!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Hello <small>{{ $name }}</small> <small>{{ $faculty }}</small></h1>

			</div>
			<!-- END PAGE TITLE -->

		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
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
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-red-sunglo">
								<i class="icon-settings font-red-sunglo"></i>
								<span class="caption-subject bold uppercase"> Input Information</span>
							</div>
						</div>
						<div class="portlet-body form">
							<form role="form" action="main/register" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								<div class="form-body">
									<div class="form-group form-md-line-input has-error">
										<input type="text" class="form-control" readonly value="{{ $name }}" id="form_control_1">
										<label for="form_control_1">Name</label>
									</div>
									<div class="form-group form-md-line-input">
										<input type="text" class="form-control" name="fb" id="form_control_1" placeholder="Enter your Facebook Name">
										<label for="form_control_1">Facebook Name</label>
										<span class="help-block">e.g. Kanison Sutham</span>
									</div>
									<div class="form-group form-md-line-input">
										<input type="email" class="form-control" name="email" id="form_control_1" placeholder="Enter your Email">
										<label for="form_control_1">Email</label>
										<span class="help-block">e.g. alchemist@gmail.com</span>
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
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="container">
		 2016 &copy; Alchemist ITBangmod
	</div>
</div>
