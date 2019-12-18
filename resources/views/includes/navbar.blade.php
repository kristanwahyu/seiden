<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="index.html"><img src="{{ asset('img/seiden2.jpeg') }}" alt="Seidensticker Indonesia" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>{{Auth::user()->username}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        <li>
                            <a href="{{url('/logout')}}">
                            <i class="lnr lnr-exit"></i> <span>
                            Logout
                            </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="modal-info">
    <div class="modal-dialog modal-small modal-center">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center">DIPA Papua - E-Silaku</h3>
                <p class="text-center">v.1.0.0 (Beta Version)</p>
                <hr>
                <p class="text-center text-muted">Developed By <a href="#">Kroyokan Developer</a></p>
            </div>
        </div>
    </div>
</div>
{{-- END EDIT JOBSHEET --}}
