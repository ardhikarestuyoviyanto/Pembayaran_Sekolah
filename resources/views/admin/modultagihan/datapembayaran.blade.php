@extends('admin/master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pembayaran</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Data Pembayaran</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="card">
            <div class="card-header">
                <a href="#" data-toggle="modal" data-target="#add" type="button" class="btn btn-success btn-sm" style="float:right;">Tambah Pembayaran</a>
            </div>
        <div class="card-body">
            
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col" style="width:10px;">No</th>
                    <th scope="col">Nama Pembayaran</th>
                    <th scope="col" style="width:150px;">Nominal</th>
                    <th scope="col" style="width:60px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i=1; @endphp @foreach($data as $x)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$x->nama_pembayaran}}</td>
                    <td>{{"Rp " . number_format($x->nominal ,2,',','.')}}</td>
                    <td>
                      <center>
                        <a href="{{url('admin/modultagihan/setting/'.$x->id_pembayaran)}}" data-toggle="tooltip" title="Setting" data-placement="top"><span class="badge badge-info"><i class="fas fa-cog"></i></span></a>
                        <a href="#" class="edit" data-id="{{$x->id_pembayaran}}" data-toggle="tooltip" title="Edit" data-placement="top"><span class="badge badge-success"><i class="fas fa-edit"></i></span></a>
                        <a class="hapus" href="#" data-id="{{$x->id_pembayaran}}" data-toggle="tooltip" title="Hapus" data-placement="top"><span class="badge badge-danger"><i class="fas fa-trash"></i></span></a>
                      </center>
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

<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Pembayaran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="container-fluid">
                <form id="addform">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label>Nama Pembayaran</label>
                            <input type="text" class="form-control" name="nama_pembayaran" placeholder="Nama Pembayaran" required>
                        </div>
                        <div class="mb-3 row">
                            <label>Nominal</label>
                            <input type="number" class="form-control" name="nominal" placeholder="Nominal Pembayaran" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">  
                            <span class="spinner-border spinner-border-sm spinner" role="status" aria-hidden="true"></span>
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Pembayaran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="container-fluid">
            <form id="editform">
                {{csrf_field()}}
                <input type="hidden" name="id_pembayaran" class="id_pembayaran">
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label>Nama Pembayaran</label>
                        <input type="text" class="form-control nama_pembayaran" name="nama_pembayaran" placeholder="Nama Pembayaran" required>
                    </div>
                    <div class="mb-3 row">
                        <label>Nominal</label>
                        <input type="number" class="form-control nominal" name="nominal" placeholder="Nominal Pembayaran" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">  
                        <span class="spinner-border spinner-border-sm spinner" role="status" aria-hidden="true"></span>
                        Update
                    </button>
                </div>
            </form>
        </div>

        </div>
    </div>
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
    $('#addform').submit(function(e){
        e.preventDefault();
        $.ajax({
          url: "{{url('admin/modultagihan/insertpembayaran')}}",
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
    });
    //--------------------------------------------------------------
    $('.edit').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "{{url('admin/modultagihan/getpembayaranbyid')}}",
            data: {'id_pembayaran': $(this).data('id'), "_token": "{{ csrf_token() }}"},
            type: "POST",
            success: function(data){
                $('.nama_pembayaran').val(data.list[0].nama_pembayaran);
                $('.id_pembayaran').val(data.list[0].id_pembayaran);
                $('.nominal').val(data.list[0].nominal);
                $('#edit').modal('show');
            }
        });
    });
    //--------------------------------------------------------------------
    $('#editform').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "{{url('admin/modultagihan/updatepembayaran')}}",
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
            error : function(err){
                alert(err);
            }
        });
    });
    //---------------------------------------------------------------
    $('.hapus').click(function(e){
        e.preventDefault();
        var confirmed = confirm('Hapus Pembayaran ini ?');
        if(confirmed) {

            $.ajax({
                data: {'id_pembayaran': $(this).data('id'), "_token": "{{ csrf_token() }}"},
                type: 'POST',
                url: "{{url('admin/modultagihan/deletepembayaran')}}",
                success : function(data){
                  swal(data.message)
                    .then((result) => {
                        location.reload();
                    });
                },
                error : function(err){
                    alert(err);
                    console.log(err);
                }
            });

        }
    });
});

</script>

@endsection