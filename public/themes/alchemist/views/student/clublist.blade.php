<div class="page-container">
	<div class="page-content club-list-container">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<h1>Club List</h1>
				</div>
			</div>

			<div class="row">
				@foreach($clubs as $club)
					@if($club->confirmed == 1)
						<div class="col-xs-12 club-block">
							<div class="col-xs-8 club-name"> {{ $club->name }} </div>
							<div class="col-xs-4 confirmation-status confirmed"> Confirmed </div>
						</div>
					@else
						<div class="col-xs-12 club-block">
							<div class="col-xs-8 club-name"> {{ $club->name }} </div>
							<div class="col-xs-4 confirmation-status pending"> Pending </div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>
