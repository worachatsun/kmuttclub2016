<div class="page-header">
	<div class="page-header-top">
		<div class="container">
			<div class="page-logo">
				<a href="index.html"><img src="<?php echo url(""); ?>/themes/alchemist/assets/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<a href="javascript:;" class="menu-toggler"></a>
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
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN MEGA MENU -->
			<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
			<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
			<div class="hor-menu">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="/organization/">Dashboard</a>
					</li>
					<li>
						<a href="/organization/report">Download Report</a>
					</li>
				</ul>
			</div>
			<!-- END MEGA MENU -->
		</div>
	</div>
	<!-- END HEADER MENU -->
</div>
