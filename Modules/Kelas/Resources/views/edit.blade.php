@extends('admin/master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Kelas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Data Kelas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        Tambah Data Kelas
                    </div>
                    <div class="card-body">

                        {{-- NULIS KONTEN VIEW DISINI --}}
                        <form action="{{ url('admin/modulsiswa/kelas/' . $kelas->id_kelas) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="row">
                                <div class="col-8">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="nama_kelas" class="col-sm-2 col-form-label">Kelas</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"
                                                value="{{ $kelas->nama_kelas }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <script>
        // Nulis Kode JS disini
    </script>

@endsection
