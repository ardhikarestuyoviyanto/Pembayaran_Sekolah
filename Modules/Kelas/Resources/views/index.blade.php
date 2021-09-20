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

                {{-- flashdata --}}
                @if (session()->has('pesan'))
                    <script type="text/javascript">
                        alert("{{ session('pesan') }}");
                    </script>
                @endif
                <div class="card">
                    <div class="card-header">
                        Data Kelas
                        <a style="float:right;" href="{{ url('admin/modulsiswa/kelas/create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        {{-- NULIS KONTEN VIEW DISINI --}}

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="97%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width:10px;">No</th>
                                        <th>Kelas</th>
                                        <th style="width:100px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{ !($i = 1) }}
                                    @foreach ($kelas as $k)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $k->nama_kelas }}</td>
                                            <td>
                                                <a href="{{ url('admin/modulsiswa/kelas/' . $k->id_kelas . '/edit') }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ url('admin/modulsiswa/kelas/' . $k->id_kelas) }}"
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
            $('#dataTable').DataTable({});
        });
    </script>

@endsection
