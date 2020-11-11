<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/home" class="active"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
                @if(auth()->user()->role == 'Admin')
                    <li><a href="/lihatakun"><i class="fa fa-user"></i> <span>Kelola Akun</span></a></li>
                    <li><a href="/peserta"><i class="fa fa-user"></i> <span>Data Peserta</span></a></li>
                    <li><a href="/pengajar"><i class="fa fa-user"></i> <span>Data Pengajar</span></a></li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-book"></i> <span>Kelola Jadwal</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                <li><a href="/jadwal" class="">Data Mata Pelajaran</a></li>
                                <li><a href="/presensi-pengajar" class="">Presensi Pengajar</a></li>
                                <li><a href="/presensi-peserta" class="">Presensi Peserta</a></li>
                                <li><a href="/laporan-kbm" class="">Data Laporan KBM</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="/nilai"><i class="fa fa-graduation-cap"></i> <span>Nilai UAS</span></a></li>
                    <li><a href="/kafalah"><i class="fa fa-envelope"></i> <span>Kafalah Pengajar</span></a></li>
                    <li><a href="#"><i class="fa fa-money"></i> <span>Data Pembayaran Peserta</span></a></li>
                @elseif(auth()->user()->role == 'Pengajar')
                    <li><a href="/pengajar/{{auth()->user()->pengajar->id}}/profil"><i class="fa fa-user-circle-o"></i> <span>Profil</span></a></li>
                    <li><a href="/pengajar/{{auth()->user()->pengajar->id}}/jadwal"><i class="fa fa-calendar-o"></i> <span>Jadwal Mengajar</span></a></li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-edit"></i> <span>Laporan KBM</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                <li><a href="/jadwal" class="">Input Laporan KBM</a></li>
                                <li><a href="/presensi-pengajar" class="">Data Presensi Pengajar</a></li>
                                <li><a href="/presensi-peserta" class="">Data Presensi Peserta</a></li>
                            </ul>
                        </div>
                    </li>
                
                @elseif(auth()->user()->role == 'Peserta')
                    <li><a href="/peserta/{{auth()->user()->peserta->id}}/profil"><i class="fa fa-user-circle-o"></i> <span>Profil</span></a></li>
                    <li><a href="/peserta/{{auth()->user()->peserta->id}}/rencana-studi"><i class="fa fa-book"></i> <span>Rencana Studi</span></a></li>
                    <li><a href="/peserta/{{auth()->user()->peserta->id}}/daftar-studi"><i class="fa fa-tasks"></i> <span>Daftar Rencana Studi</span></a></li>
                    <li><a href="/peserta/{{auth()->user()->peserta->id}}/hasil-studi"><i class="fa fa-graduation-cap"></i> <span>Hasil Studi</span></a></li>
                    <li><a href="#"><i class="fa fa-calendar-check-o"></i> <span>Presensi</span></a></li>
                    <li><a href="#"><i class="fa fa-money"></i> <span>Status Pembayaran</span></a></li>

                @endif

            </ul>
        </nav>
    </div>
</div>