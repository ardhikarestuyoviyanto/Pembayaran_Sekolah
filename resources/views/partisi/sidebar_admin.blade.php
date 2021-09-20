<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{asset('assets/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image elevation-5" style="opacity: .8">
        <br>
    </a>
    
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/img/unnamed.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Hai Administrator</a>
            </div>
        </div>
    
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    @if($sidebar == "Dashboard")
                    <a href="{{url('admin/dashboard')}}" class="nav-link active">
                    @else   
                    <a href="{{url('admin/dashboard')}}" class="nav-link">
                    @endif
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                        Dashboard
                        </p>
                    </a>
                </li>
    
                @if($sidebar == "Data Kelas" || $sidebar == "Data Siswa")
                <li class="nav-item menu-open"> 
                    <a href="#" class="nav-link active">
                @else
                <li class="nav-item"> 
                    <a href="#" class="nav-link">
                @endif
                    <i class="fas fa-book nav-icon"></i>
                        <p>
                        Modul Siswa
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if($sidebar == "Data Kelas")
                                <a href="{{url('admin/modulsiswa/kelas')}}" class="nav-link active">
                            @else 
                                <a href="{{url('admin/modulsiswa/kelas')}}" class="nav-link">
                            @endif
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if($sidebar == "Data Siswa")
                                <a href="{{url('admin/modulsiswa/siswa')}}" class="nav-link active">
                            @else 
                                <a href="{{url('admin/modulsiswa/siswa')}}" class="nav-link">
                            @endif
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
    

                @if($sidebar == "Data Pembayaran" || $sidebar == "Data Tagihan")
                <li class="nav-item menu-open"> 
                    <a href="#" class="nav-link active">
                @else
                <li class="nav-item"> 
                    <a href="#" class="nav-link">
                @endif
                    <i class="fas fa-poll nav-icon"></i>
                        <p>
                        Modul Tagihan
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if($sidebar == "Data Pembayaran")
                                <a href="{{url('admin/modultagihan/pembayaran')}}" class="nav-link active">
                            @else 
                                <a href="{{url('admin/modultagihan/pembayaran')}}" class="nav-link">
                            @endif
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pembayaran</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            @if($sidebar == "Data Tagihan")
                                <a href="{{url('admin/modultagihan/datatagihan')}}" class="nav-link active">
                            @else 
                                <a href="{{url('admin/modultagihan/datatagihan')}}" class="nav-link">
                            @endif
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Tagihan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    @if($sidebar == "Setting")
                    <a href="{{url('admin/setting')}}" class="nav-link active">
                    @else   
                    <a href="{{url('admin/setting')}}" class="nav-link">
                    @endif
                        <i class="fas fa-cog nav-icon"></i>  
                        <p>
                        Setting
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('auth/logout')}}" class="nav-link">
                        <i class="fas fa-door-open nav-icon"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    </aside>