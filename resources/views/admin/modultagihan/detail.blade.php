@extends('admin/master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Tagihan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin/modultagihan/datatagihan')}}">Data Tagihan</a></li>
            <li class="breadcrumb-item active">Detail Tagihan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
            List Tagihan
        </div>

        <div class="card-header">
            @foreach($siswa as $x)
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="200px"><b>NIS</b></td>
                            <td width="10px">:</td>
                            <td>{{$x->nis}}</td>
                        </tr>
                        <tr>
                            <td><b>Nama Siswa</b></td>
                            <td>:</td>
                            <td>{{$x->nama_siswa}}</td>
                        </tr>
                        <tr>
                            <td><b>Kelas</b></td>
                            <td>:</td>
                            <td>{{$x->nama_kelas}}</td>
                        </tr>
                    </tbody>
                </table>
             @endforeach
         </div>

        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col" style="width:5px;">No</th>
                    <th scope="col">Nama Tagihan</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Nominal</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; $total=0; @endphp @foreach($data as $x)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$x->nama_pembayaran}}</td>
                    <td>
                        @if(empty($x->tgl_bayar))
                            -
                        @else
                            {{date('d-M-Y', strtotime($x->tgl_bayar))}}
                        @endif
                    </td>
                    <td>
                        @if($x->status=='N')
                            <i class="text-danger">Belum Bayar</i>
                        @else
                            <i class="text-success">Sudah Bayar</i>
                        @endif
                    </td>
                    <td>
                        {{$x->payment_type}}
                    </td>
                    <td>{{"Rp " . number_format($x->nominal ,2,',','.')}}</td>
                    @php $total = $total + $x->nominal; @endphp
                </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="text-right">
                        Total Tagihan
                    </td>
                    <td>
                        {{"Rp " . number_format($total ,2,',','.')}}
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
$(document).ready(function(){
    //-----------------------------------------------------
    $('[data-toggle="tooltip"]').tooltip()
});

</script>

@endsection