<div class="page-header">
	<div class="page-header-top">
		<div class="container">
			<div class="page-logo">
				<a href="/"><img src="<?php echo url(""); ?>/themes/alchemist/assets/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>

			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown dropdown-user dropdown-dark">
						<a class="btn yellow-gold" href="{{ url('auth/logout') }}">
              <i class="icon-key"></i> Log Out
            </a>
					<li>
        </ul>
			</div>
		</div>
	</div>
</div>

<div class="page-container">
	<div class="page-head">
		<div class="container">
			<div class="page-title">
				<h1><small>Hello.</small> {{ $name }} <small>{{ $faculty }}</small></h1>

			</div>

		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-red-sunglo">
								<i class="icon-settings font-red-sunglo"></i>
								<span class="caption-subject bold uppercase"> Input Information</span>
							</div>
						</div>
            <div class="portlet-body form">
              <form role="form" action="confirmclub" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-body col-md-6 col-md-offset-3">
                    <div class="form-group form-md-line-input has-info">
                      <input type="text" class="form-control input-lg" name="club_id" id="form_control_1" placeholder="Input Club Secret Code">
                      <label for="form_control_1">Club Code</label>
                      <span class="help-block">Club Secret Code 5 Digit</span>
                    </div>
                </div>
                <div class="form-actions noborder">
                  <center>
                    <button type="submit" class="btn blue">Submit</button>
                  </center>
                </div>
                @if ($errors->has())
					        <div class="alert alert-danger">
					            @foreach ($errors->all() as $error)
					                {{ $error }}<br>
					            @endforeach
					        </div>
				        @endif
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
</div>
