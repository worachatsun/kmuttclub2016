<div class="page-container">
	<div class="page-content club-list-container">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<h1>Club List</h1>
				</div>
			</div>

			
				@foreach($clubs as $club)
				<div class="row">
					<div class="top-news margin-top-10 col-xs-12">
						<div class="btn yellow-gold btn-block">
							<span class="title">
								{{ $club['club_name'] }}
							</span>
							</div>
					</div>
				</div>
				@endforeach

			<div class="row">
				<div class="col-md-12 std-regis-btn">
					<center><a href="<?php echo url(""); ?>/club/addclub"><button class="btn btn-block blue" type="button">REGISTER CLUB</button></a></center>
				</div>
			</div>

		</div>
	</div>
</div>
