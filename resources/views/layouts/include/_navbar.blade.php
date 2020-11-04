<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="/"><img src="{{asset('admin/assets/img/logo.png')}}" width="40" height="35" alt="" class="d-inline-block align-top">SIAKAD SQI UNJ</a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>{{ auth()->user()->name}} - {{ auth()->user()->role}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>