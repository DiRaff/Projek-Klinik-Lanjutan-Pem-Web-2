@extends('layouts.sbadmin2', ['title' => 'Data Pasien'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $judul }}

                    </div>
                    <div class="card-body">
                        <br>
                        Jumlah Pasien {{ $pasien->count() }}
                    </div>
                    <table class="table table-light table-striped-columns table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Kode Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Alamat</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->kode_pasien }}</td>
                                    <td>{{ $item->nama_pasien }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>


                                    <td>
                                        <a href="{{ route('pasien.edit', $item->id) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                        {!! Form::open([
                                        'route' => ['pasien.destroy', $item->id],
                                        'method' => 'delete',
                                        'onsubmit' => 'return confirm("Yakin Mau Dihapus")',
                                        ]) !!}
                                        {!! Form::submit('Hapus', ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-body">
                    <a href="{{ route('pasien.create') }}" class="btn btn-primary">
                        Tambah Pasien
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
