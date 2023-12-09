@extends('layouts.sbadmin2', ['title' => 'Data Pasien'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{  $judul }}

                    </div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Dokter</th>
                                    <th>Biaya</th>                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $administrasi as $item )
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->kode_administrasi }}</td>
                                    <td>{{ $item->tanggal}}</td>
                                    <td>{{ $item->pasien_id }}</td>
                                    <td>{{ $item->dokter_id }}</td>
                                    <td>{{ $item->biaya }}</td>
                                    <td>
                                        Tambah | Hapus
                                        
                                    </td>
                                </tr>                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
