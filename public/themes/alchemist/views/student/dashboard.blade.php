<div class="page-container">
	<div class="page-content club-list-container">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<h1>Club List</h1>
				</div>
			</div>

			<div class="row">
				<div class="table-scrollable table-scrollable-borderless">
					<table class="table table-hover table-light center-club-table">
						<thead>
							<tr class="uppercase">
								<th>รายชื่อชมรมที่ลงทะเบียน</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								@foreach($clubs as $club)
									<td>{{ $club['club_name'] }}</td>
								@endforeach
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 std-regis-btn">
					<center><button class="btn btn-lg green-meadow" type="button">REGISTER CLUB</button></center>
				</div>
			</div>

		</div>
	</div>
</div>
