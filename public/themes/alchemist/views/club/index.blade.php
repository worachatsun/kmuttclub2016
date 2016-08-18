
<div class="logo">
		<img src="<?php echo url(""); ?>/themes/alchemist/assets/img/logo-big-white.gif" alt="">
	</div>

<div class="content">

	<!-- BEGIN LOGIN FORM -->
	{{ Form::open(array('url' => 'club/dashboard')) }}

		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">CLUB SECRET CODE</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Club Secret Code" name="club_id">
			</div>
		</div>
		<div class="form-actions">

			<button type="submit" class="btn blue pull-right btn-block">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>


		<div class="create-account">
		</div>

	{{ Form::close() }}
	<!-- END LOGIN FORM -->
</div>
