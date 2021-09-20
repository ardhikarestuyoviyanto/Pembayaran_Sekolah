@extends('admin/master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Setting Tagihan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin/modultagihan/pembayaran')}}">Data Pembayaran</a></li>
            <li class="breadcrumb-item active">Setting Tagihan</li>
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
            <a href="{{url('admin/modultagihan/add/'.$id_pembayaran)}}" type="button" class="btn btn-primary btn-sm" style="float:right;">Tambah Tagihan</a>
        </div>

        <div class="card-header bg-gray-light">

            @foreach($tagihan as $x)
                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">Nama Pembayaran</label>
                    <div class="col-sm-10 validate">
                        <input type="text" readonly class="form-control" value="{{$x->nama_pembayaran}}">   
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">Nominal</label>
                    <div class="col-sm-10 validate">
                        <input type="text" readonly class="form-control" value="{{"Rp " . number_format($x->nominal ,2,',','.')}}">   
                    </div>
                </div>
            @endforeach

        </div>
        <form id="deleteform">
            {{csrf_field()}}
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col" style="width:5px;">No</th>
                        <th scope="col" style="width:10px;"><input type="checkbox" id="parent"></th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="none">Payment Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp @foreach($data as $x)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td><input name="id_tagihan[]" class="child" type="checkbox" value="{{$x->id_tagihan}}"></td>
                        <td>{{$x->nis}}</td>
                        <td>{{$x->nama_siswa}}</td>
                        <td>{{$x->nama_kelas}}</td>
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
                            <br>
                            {{$x->payment_type}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">                    
                    <span class="spinner-border spinner-border-sm spinner" role="status" aria-hidden="true"></span>
                    Batalkan Tagihan
                </button>
            </div>
        </form>
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
    $('[data-toggle="tooltip"]').tooltip();
    $('.spinner').hide();
    //-------------------------------------------------------
    $('#parent').click(function(){
        $('.child').prop('checked', this.checked);
    });

    $('.child').click(function() {
        if ($('.child:checked').length == $('.child').length) {
            $('#parent').prop('checked', true);
        } else {
            $('#parent').prop('checked', false);
        }
    });
    //-------------------------------------------------------
    $('#deleteform').submit(function(e){
        e.preventDefault();

        var confirmed = confirm('Hapus Tagihan ?');
        if(confirmed) {

            $.ajax({
                url: "{{url('admin/modultagihan/deletetagihan')}}",
                type: "POST",
                data: $(this).serialize(),
                beforeSend: function(){
                    $('.spinner').show();
                },
                complete: function(){
                    $('.spinner').hide();
                },
                success: function(data){
                    swal(data.message)
                    .then((result) => {
                        location.reload();
                    });
                },
                error: function(error){
                    console.log(error);
                }
            });

        }

    });
    //--------------------------------------------------------------
});

</script>

@endsection