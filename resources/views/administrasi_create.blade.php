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
                                    Tambah Administrasi
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('administrasi.store') }}" method="POST">
                                    @method('POST')
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label for="my-input">Kode Administrasi</label>
                                        {!! Form::text('kode_administrasi', null, ['class' => 'form-control']) !!}
                                        <span class="text-danger">{{ $errors->first('kode_a') }}</span>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="my-input">Nama Pasien</label>
                                        {!! Form::text('nama_pasien', null, ['class' => 'form-control']) !!}
                                        <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                                    </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
