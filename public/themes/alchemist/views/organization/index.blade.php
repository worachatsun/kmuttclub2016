<div class="page-container">
  <div class="page-head">
    <div class="container">
      <div class="page-title">
        <h1>Dashboard <small>ORGANIZATION</small></h1>
      </div>
    </div>
  </div>
  <div class="page-content">
    <div class="container">
      <ul class="page-breadcrumb breadcrumb">
        <li>
          <a href="#">Home</a><i class="fa fa-circle"></i>
        </li>
        <li>
          <a href="layout_blank_page.html">หน้าสอง</a>
          <i class="fa fa-circle"></i>
        </li>
        <li class="active">
          หน้าสาม
        </li>
      </ul>

      <div class="row">
        <div class="col-md-12">
          <!-- BEGIN SAMPLE TABLE PORTLET-->
          <div class="portlet light">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Light Table #1</span>
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
                        CLUB SECRET CODE
                      </th>
                      <th>
                        MEMBER
                      </th>
                      <th>
                        STATUS
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
                        {{ $club['club_name'] }}
                      </td>
                      <td>
                        {{ $club['club_secret_code'] }}
                      </td>
                      <td>
                        0 คน
                      </td>
                      <td>
                        <span class="bold theme-font">INCOMPLETE</span>
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