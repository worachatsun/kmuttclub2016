<div class="logo">
    <img src="<?php echo url(""); ?>/themes/alchemist/assets/img/logo-big-white.png" alt="" width="200">
</div>

<div class="alert alert-danger text-center">
	<strong>BETA!</strong> Testing
</div>

<div class="content">
  @if ($errors->has())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
  @endif
	{{ Form::open(array('url' => '/auth/login')) }}

		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>

    <center> <span style="font-size:1.5em; color:#fff;"> Login with KMUTT Account </span></center>
    <br>
		<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="{{ old('username') }}">
			</div>
		</div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password">
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
</div>
