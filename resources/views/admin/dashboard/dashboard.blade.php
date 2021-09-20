@extends('admin/master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
            Dashboard
        </div>
        <div class="card-body">
            
          <div class="row">
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-info"><i class="fas fa-school"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Nama App</span>
                          <span class="info-box-number">Aplikasi Pembayaran Sederhana</span>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-success"><i class="fas fa-swatchbook"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Total Pembayaran</span>
                          <span class="info-box-number">{{$totalpembayaran}}</span>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-primary"><i class="fas fa-book"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Total Kelas</span>
                          <span class="info-box-number">{{$totalkelas}}</span>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Total Siswa</span>
                          <span class="info-box-number">{{$totalsiswa}}</span>
                      </div>
                  </div>
              </div>
          </div>
          <br>
          <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row">Nama</th>
                    <td>
                      Ardhika Restu Yoviyanto
                      <br>
                      Diana Pungki
                      <br>
                      Daniel Eka
                    </td>
                </tr>
                <tr>
                    <th scope="row">Posisi</th>
                    <td>Back End Programmer</td>
                </tr>
                <tr>
                    <th scope="row">Nama Mentor</th>
                    <td>Bpk. Bagus Tri Mahardika</td>
                </tr>
                <tr>
                    <th scope="row">Deskripsi</th>
                    <td>
                      Membuat aplikasi sederhan dengan berkolaborasi antar modul secara bersama-sama
                    </td>
                </tr>
            </tbody>
        </table>    


        </div>
    </div>

    </div>
  </section>
</div>

<script>

    // Nulis Kode JS disini

</script>

@endsection