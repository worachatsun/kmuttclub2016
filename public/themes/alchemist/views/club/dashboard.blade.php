<div class="page-container">
	<div class="page-content club-list-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Club dashboard</h1>
				</div>
			</div>
			<div class="row">
                <div class="col-md-12">
                    @foreach ($members as $member)
						<p>{{ $member['name'] }}</p>
					@endforeach
                </div>
			</div>


			<div class="clearfix">
				<div class="panel panel-success">
					<!-- Table -->
					<table class="table">
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Faculty</th>
								<th>Facebook</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($members as $member)
								<tr>
									<td>{{ $member['name']}}  {{ $member['surname'] }}</td>
									<td>{{ $member['faculty']}}</td>
									<td>{{ $member['facebook']}}</td>
									<td>{{ $member['email']}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			
			</div>
		</div>
	</div>
</div>
