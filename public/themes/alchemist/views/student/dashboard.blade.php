<div class="page-container">
	<div class="page-content club-list-container">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<h1>Club List</h1>
				</div>
			</div>

			@if (count($clubs) === 0)
				<div class="row">
					<div class="note note-success note-bordered">
						<h4 class="block">How to register club</h4>
						<p>
							First visit about club and click in "Register Club" and put Club Secret Code in to the field.
						</p>
					</div>
				</div>

				<div class="row">
					<div class="top-news margin-top-10 col-xs-12">
						<div class="btn yellow-gold btn-block">
							<span class="title">
								<center>Register club not found</center>
							</span>
						</div>
					</div>
				</div>
			@else
				@foreach($clubs as $club)
				<div class="row">
					<div class="top-news margin-top-10 col-xs-12">
						<div class="btn yellow-gold btn-block">
							<div class="tools" style="float: right;">
								<form action="deletingclub" method="POST">
									<input type="hidden" name="club_id" value="{{ $club['club_id'] }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="btn yellow-gold" type="submit"> X </button>
								</form>
									</a>
								</div>
							<span class="title">
								{{ $club['club_name'] }}
							</span>
							<em>
								<i class="fa fa-tags"></i>
								สมัครเมื่อ {{ $club['created_at'] }} </em>
						</div>
						<!-- <form action="deletingclub" method="POST">
							<input type="hidden" name="club_id" value="{{ $club['club_id'] }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="btn btn-block blue" type="submit">X</button>
						</form> -->
					</div>
				</div>
				@endforeach
				@endif

			<div class="row">
				<div class="col-md-12 std-regis-btn">
					<center><a href="<?php echo url(""); ?>/club/addclub"><button class="btn btn-block blue" type="button">REGISTER CLUB</button></a></center>
				</div>
			</div>

		</div>
	</div>
</div>
