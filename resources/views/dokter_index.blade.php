@extends('layouts.sbadmin2', ['title' => 'Data Dokter'])

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
                        Jumlah Dokter {{ $dokter->count() }}
                    </div>
                    <table class="table table-light table-striped-columns table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Kode Dokter</th>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>Nomor Hp</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokter as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->kode_dokter }}</td>
                                    <td>{{ $item->nama_dokter }}</td>
                                    <td>{{ $item->spesialis }}</td>
                                    <td>{{ $item->nomor_hp }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>


                                    <td>
                                        <a href="{{ route('dokter.edit', $item->id) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                        {!! Form::open([
                                        'route' => ['dokter.destroy', $item->id],
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
                    <a href="{{ route('dokter.create') }}" class="btn btn-primary">
                        Tambah Dokter
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
