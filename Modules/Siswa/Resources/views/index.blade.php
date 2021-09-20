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

                {{-- flashdata --}}
                @if (session()->has('pesan'))
                    <script type="text/javascript">
                        alert("{{ session('pesan') }}");
                    </script>
                @endif
                <div class="card">
                    <div class="card-header">
                        Data Siswa
                        <a style="float: right;" href="{{ url('admin/modulsiswa/siswa/create') }}" class="btn btn-primary btn-sm">Tambah</a>
                    </div>
                    <div class="card-body">
                        {{-- NULIS KONTEN VIEW DISINI --}}

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="97%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width:30px;">No</th>
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @php $i=1; @endphp @foreach ($siswa as $s)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $s->nis }}</td>
                                            <td>{{ $s->nama_siswa }}</td>
                                            <td>{{ $s->nama_kelas }}</td>
                                            <td>{{ $s->alamat }}</td>
                                            <td>
                                                <a href="{{ url('admin/modulsiswa/siswa/' . $s->id_siswa . '/edit') }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ url('admin/modulsiswa/siswa/' . $s->id_siswa) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah anda yakin ?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>

    <script>
          $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
            });
        });ss
    </script>

@endsection
