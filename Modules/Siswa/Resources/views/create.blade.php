@extends('admin/master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Siswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Data Siswa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        Tambah Data Siswa
                    </div>
                    <div class="card-body">

                        {{-- NULIS KONTEN VIEW DISINI --}}
                        <form action="{{ url('admin/modulsiswa/siswa') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nis" name="nis" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="nama_siswa" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="nama_kelas" class="col-sm-2 col-form-label">Kelas</label>
                                        <div class="col-sm-10">
                                            <select name="id_kelas" id="" required class="form-control">
                                                <option value="">--Pilih--</option>
                                                @foreach ($kelas as $k)
                                                    <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password">
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
