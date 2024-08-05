@extends('layouts.master')
@section('title','Tambah Mahasiswa')
@section('judul','Tambah Mahasiswa')
@section('bc')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Data Jurusan</a></li>
        <li class="breadcrumb-item active">Tambah Mahasiswa</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">


        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
        </div>
        <div class="card-body">
            <form method="post" action="/mahasiswa/store/" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" value="{{ old('nim') }}" class="form-control @error('nim') is-invalid @else is-valid @enderror" name="nim">
                    @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" name="nama">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="Laki-laki">
                        <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Jurusan</label>
                    <select name="jurusan" class="form-control" id="">
                        <option value="">-Pilih Jurusan-</option>

                        @foreach ($jur as $item)
                            <option value="{{$item->id}}">{{$item->jurusan}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Agama</label>
                    <select name="agama" class="form-control" id="">
                        <option value="">-Pilih Agama-</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budhha">Budhha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/*">
                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer">
        Footer
        </div> --}}
        <!-- /.card-footer-->
    </div>
@endsection

