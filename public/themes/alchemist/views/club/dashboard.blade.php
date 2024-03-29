<div class="page-container">
	<div class="page-content club-list-container">
		<div class="container">
      @if ($role !== null)	
      <div class="row">
        <div class="col-xs-12">
            <p class="clearfix">
              <a href="{{ url('/student/dashboard')}}">
                <button class="btn yellow-gold pull-left" type="button">
                  Switch To Student
                </button>
              </a>
              <a href="{{ url('/club/report')}}">
                <button class="btn pull-right  yellow-gold" type="button">
                  Download Report
                </button>
              </a>
            </p>
        </div>
      </div>
			@endif

      <div class="row">
        
        <div class="col-md-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light yellow-gold" href="javascript:;">
					<div class="visual">
						<i class="fa fa-group fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 {{ $club->club_name }}
						</div>
						<div class="desc">
							 Club name
						</div>
					</div>
					</a>
				</div>
        
        <div class="col-md-3 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light yellow-gold" href="javascript:;">
					<div class="visual">
						<i class="fa fa-group fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 {{ $member_amount }}
						</div>
						<div class="desc">
							 Registered
						</div>
					</div>
					</a>
				</div>
				
        <div class="col-md-3 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light yellow-gold" href="{{ url('club/regis') }}">
					<div class="visual">
						<i class="fa fa-group fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							Register
						</div>
						<div class="desc">
						</div>
					</div>
					</a>
				</div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="portlet light">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-cogs font-yellow-gold"></i>
                <span class="caption-subject font-yellow-gold bold uppercase">รายชื่อสมาชิกชมรม</span>
              </div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title="">
                </a>
                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                </a>
                <a href="javascript:;" class="reload" data-original-title="" title="">
                </a>
                <a href="javascript:;" class="remove" data-original-title="" title="">
                </a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-scrollable table-scrollable-borderless">
                <table class="table table-hover table-light">
                  <thead>
                    <tr class="uppercase">
                      <th>
                        #
                      </th>
                      <th>
                        STUDENT ID
                      </th>
                      <th>
                        NAME - SURNAME
                      </th>
                      <th>
                        FACULTY
                      </th>
                      <th>
                        EMAIL
                      </th>
                      <th>
                        FACEBOOK
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($members as $key => $member)
                    <tr>
                      <td>
                        {{ $key+1 }}
                      </td>
                      <td>
                        {{ $member['std_id'] }}
                      </td>
                      <td>
                        {{ $member['name'] }} {{ $member['surname']}}
                      </td>
                      <td>
                        {{ $member['faculty'] }}
                      </td>
                      <td>
                        {{ $member['email'] }}
                      </td>
                      <td>
                        {{ $member['facebook'] }}
                      </td>
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
	</div>
</div>
