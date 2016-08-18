<div class="page-container">
  <div class="page-content">
    <div class="container">
      <ul class="page-breadcrumb breadcrumb">
        <li>
          <a href="{{ URL::to('organization/')  }}">หน้าแดชบอร์ด</a>
          <i class="fa fa-circle"></i>
        </li>
      </ul>
      <div class="row">
        <div class="col-md-6 col-xs-12">
          <a class="dashboard-stat dashboard-stat-light green-haze" href="javascript:;">
            <div class="visual">
              <i class="fa fa-group fa-icon-medium"></i>
            </div>
            <div class="details">
              <div class="number">
                Dashboard
              </div>
              <div class="desc">
                หน้าแดชบอร์ด
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a class="dashboard-stat dashboard-stat-light green-haze" href="javascript:;">
            <div class="visual">
              <i class="fa fa-group fa-icon-medium"></i>
            </div>
            <div class="details">
              <div class="number">
                2321 คน
              </div>
              <div class="desc">
                จำนวนนักศึกษาที่ลงทะเบียนสำเร็จ
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a class="dashboard-stat dashboard-stat-light green-haze" href="javascript:;">
            <div class="visual">
              <i class="fa fa-group fa-icon-medium"></i>
            </div>
            <div class="details">
              <div class="number">
                2321 คน
              </div>
              <div class="desc">
                จำนวนนักศึกษาทั้งหมดในระบบ
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- BEGIN SAMPLE TABLE PORTLET-->
          <div class="portlet light">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">รายชื่อชมรมทั้งหมด</span>
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
                        CLUB NAME
                      </th>
                      <th>
                        SECRET CODE
                      </th>
                      <th>
                        MEMBER
                      </th>
                      <th>
                        
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($clubs as $key => $club)
                    <tr>
                      <td>
                        {{ $key+1 }}
                      </td>
                      <td>
                        <a href="{{ URL::to('organization/club/' . $club['club_id'])  }}">
                          {{ array_get($club,'club_name',"Null") }}
                        </a>
                      </td>
                      <td>
                        {{ $club['club_secret_code'] }}
                      </td>
                      <td>
                        {{ $club['amount_member'] }} คน
                      </td>
                      <td>
                        <a href="{{ URL::to('organization/club/' . $club['club_id'])  }}" class="btn default btn-xs green-stripe">
													View </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END SAMPLE TABLE PORTLET-->
        </div>
      </div>
    </div>
  </div>
</div>