<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/home" class="active"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
                @if(auth()->user()->role == 'Admin')
                    <li><a href="/peserta"><i class="fa fa-user"></i> <span>Data Peserta</span></a></li>
                    <li><a href="/pengajar"><i class="fa fa-user"></i> <span>Data Pengajar</span></a></li>
                @elseif(auth()->user()->role == 'Pengajar')
                @elseif(auth()->user()->role == 'Peserta')
                @endif
                <!-- <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="page-profile.html" class="">Profile</a></li>
                            <li><a href="page-login.html" class="">Login</a></li>
                            <li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
                        </ul>
                    </div>
                </li> -->
            </ul>
        </nav>
    </div>
</div>