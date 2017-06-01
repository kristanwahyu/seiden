<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
              <li class="sb-nav-child"><a href="{{ url('/dashboard-admin') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
              {{-- <li class="sb-nav-child sb-has-child">
                  <a href="#report" data-toggle="collapse" class="collapsed"><i class="fa fa-book"></i> <span>Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="report" class="collapse ">
                      <ul class="nav">
                          <li><a href="{{ url('/user') }}" class=""><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
                      </ul>
                  </div>
              </li> --}}
              <li class="sb-nav-child"><a href="{{ url('/user') }}"><i class="fa fa-group"></i> <span>User</span></a></li>
              <li class="sb-nav-child"><a href="{{ url('/tahun-anggaran') }}"><i class="fa fa-calendar-check-o"></i> <span>Tahun Anggaran</span></a></li>
              <li class="sb-nav-child"><a href="{{ url('/satuan-kerja') }}"><i class="fa fa-users"></i> <span>Satuan Kerja</span></a></li>
              <li class="sb-nav-child"><a href="{{ url('/dipa') }}"><i class="fa fa-stack-overflow"></i> <span>DIPA</span></a></li>
            </ul>
        </nav>
    </div>
</div>
