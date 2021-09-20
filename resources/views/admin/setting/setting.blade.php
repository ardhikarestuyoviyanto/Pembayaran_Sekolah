@extends('admin/master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Setting</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Setting</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
            Data Admin
        </div>
            @foreach($admin as $x)
            <div class="card-body">
                <form id="updateadmin">
                {{csrf_field()}}
                <div class="mb-3 row">
                    <label for="nama_kelas" class="col-sm-2 col-form-label">Nama Admin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Admin" value="{{$x->nama}}"required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_kelas" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{$x->username}}"required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_kelas" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Kosongkan jika gak diubah">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="submit">
                    Update
                </button>
            </div>
          </form>
          @endforeach
        </div>

        <div class="card mt-5">
            <div class="card-header">
                Midtrans
            </div>
                @foreach($midtrans as $x)
                <div class="card-body">
                    <form id="updatemidtrans">
                    {{csrf_field()}}
                    <div class="mb-3 row">
                        <label for="nama_kelas" class="col-sm-2 col-form-label">Id Merchant</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id_merchant" value="{{$x->id_merchant}}"required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_kelas" class="col-sm-2 col-form-label">Client Key</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="client_key" value="{{$x->client_key}}"required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_kelas" class="col-sm-2 col-form-label">Server Key</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="servey_key" value="{{$x->servey_key}}"required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="submit">
                        Update
                    </button>
                </div>
              </form>
              @endforeach
            </div>

    </div>

  </section>
</div>

<script>

    $('#updateadmin').submit(function(e){
        e.preventDefault();
        $.ajax({
          url: "{{url('admin/setting/updateadmin')}}",
          type: "POST",
          data: $(this).serialize(),
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

    $('#updatemidtrans').submit(function(e){
        e.preventDefault();
        $.ajax({
          url: "{{url('admin/setting/updatemidtrans')}}",
          type: "POST",
          data: $(this).serialize(),
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

</script>

@endsection