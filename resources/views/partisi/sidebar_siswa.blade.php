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
                <a href="#" class="d-block">Hai Siswa</a>
            </div>
        </div>
    
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    @if($sidebar == "Tagihan")
                    <a href="{{url('siswa/tagihan')}}" class="nav-link active">
                    @else   
                    <a href="{{url('siswa/tagihan')}}" class="nav-link">
                    @endif
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                        Tagihan Pembayaran
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    </aside>