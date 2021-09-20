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

                {{-- flashdata --}}
                @if (session()->has('pesan'))
                    <script type="text/javascript">
                        alert("{{ session('pesan') }}");
                    </script>
                @endif
                <div class="card">
                    <div class="card-header">
                        Data Pembayaran
                    </div>
                    <div class="card-body">
                        {{-- NULIS KONTEN VIEW DISINI --}}
                        <form action="" method="post">
                            <a href="{{ url('admin/modultagihan/pembayaran/create') }}"
                                class="btn btn-primary mb-4">Tambah
                                Data Pembayaran</a>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="97%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pembayaran</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{ !($i = 1) }}
                                    @foreach ($pembayaran as $p)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $p->nama_pembayaran }}</td>
                                            <td>Rp. {{ number_format($p->nominal, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="{{ url('admin/modultagihan/pembayaran/' . $p->id_pembayaran . '/edit') }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <form
                                                    action="{{ url('admin/modultagihan/pembayaran/' . $p->id_pembayaran) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah anda yakin ?')"><i
                                                            class="fas fa-trash-alt"></i></button>
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
