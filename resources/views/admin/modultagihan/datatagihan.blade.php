@extends('admin/master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Tagihan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Tagihan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
            Siswa Yang Menerima Tagihan
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col" style="width:5px;">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col" style="width:100px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp @foreach($data as $x)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$x->nis}}</td>
                    <td>{{$x->nama_siswa}}</td>
                    <td>{{$x->nama_kelas}}</td>
                    <td>
                        <a href="{{url('admin/modultagihan/detailtagihan/'.$x->id_siswa)}}" type="button" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Lihat Detail">Lihat Tagihan</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>
  </section>
</div>


<script>
$(document).ready(function(){
    //-----------------------------------------------------
    $('.table').DataTable({
        responsive: true,
    });
    $('[data-toggle="tooltip"]').tooltip()
});

</script>

@endsection