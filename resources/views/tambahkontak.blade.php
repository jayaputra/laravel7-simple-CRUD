@extends('layout')
@section('title','Form Tambah Kontak')

@section('content')
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>{{ isset($kontak) ? 'Edit' : 'Tambah' }} Kontak</h2>
            <ol>
                <li><a href="/">Home</a></li>
            </ol>
        </div>
    </div>
</section>
<section class="blog aos-init aos-animate">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-sm-10">
        <div class="blog-author clearfix reply-form">
            <form action="{{ isset($kontak) ? route('proses.edit', $kontak->id) 
                                    : route('proses.tambah') }}" method="POST">
                @csrf
                @if (isset($kontak))
                @method('PATCH')
                @endif
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input name="nama" type="text" class="form-control" placeholder="Your Nama*" id="nama"
                            value="{{ isset($kontak) ? $kontak->nama : old('nama') }}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input name="telp" type="text" class="form-control" placeholder="Your Telepon*" id="telp"
                            value="{{ isset($kontak) ? $kontak->telp : old('telp') }}">
                        @error('telp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <textarea name="alamat" class="form-control" placeholder="Your Alamat*"
                            id="alamat">{{ isset($kontak) ? $kontak->alamat : old('alamat') }}</textarea>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">{{ isset($kontak) ? 'Edit' : 'Tambah'}}</button>
            </form>
        </div>
        </div>
      </div>
    </div>
</section>
@endsection