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
						<h4 class="block">How to Register Club</h4>
						<p>
							First Visit about club and click in "Register Club" and put Club Secret Code in to the field.
						</p>
					</div>
				</div>
			@else
				@foreach($clubs as $club)
				<div class="row">
					<div class="top-news margin-top-10 col-xs-12">
						<div class="btn yellow-gold btn-block">
							<div class="tools pull-right">
								<button type="button" class="btn yellow-gold" data-toggle="modal" data-target="#std-delete-club" data-club-name="{{ $club['club_name'] }}" data-club-id="{{ $club['id'] }}">
									&times;
								</button>
								</div>
							<span class="title">
								{{ $club['club_name'] }}
							</span>
							<em>
								<i class="fa fa-tags"></i>
								สมัครเมื่อ {{ $club['created_at'] }} </em>
						</div>
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

<!-- Modal -->
<div class="modal fade" id="std-delete-club" tabindex="-1" role="dialog" aria-labelledby="std-delete-club-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<form action="deletingclub" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="std-delete-clubL-label">Canceling Registration !</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="club_id" id="club_id-input">
					<span class="forn-control">Are you cancel <b></b> registration ?</span>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger btn-block" type="submit">Yes. Cancaling registration</button>
					<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
				</div>
			</form>
    </div>
  </div>
</div>

<script>
	
	window.onload = function(){
			$('#std-delete-club').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var club_id = button.data('club-id')+0
			var club_name = "\""+button.data('club-name')+"\"";

			var modal = $(this)
			modal.find('.modal-body b').text(club_name)
			modal.find('.modal-body #club_id-input').val(club_id)
		})
	}

</script>