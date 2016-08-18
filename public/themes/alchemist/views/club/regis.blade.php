<div class="page-container">
	<div class="page-content club-list-container">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<h1>Club regis</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
				<form action="/club/regis" method="post" >
					<input type="text" name="sc"><br>
					<input type="submit" value="Register">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
