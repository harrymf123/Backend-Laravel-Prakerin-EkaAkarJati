@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Upload Data Mitra Kerja</h1>

            <form id="form-upload-mitra-kerja" method="POST" action="/upload_mitra_kerja/proses" enctype="multipart/form-data">
            @csrf
                <div class="row form-group">
                    <div class="col-12">
                        <label class="w-100" for="judul">Judul</label>
                        <input type="text" class="w-100" id="judul" name="judul" required>
                    </div>
                    <div class="col-12">
                        <label class="w-100" for="image">File Image</label>
                        <input type="file" class="w-100" id="image" name="image" required>
                    </div>
                    <div class="col-12">
                        <label class="w-100" for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="w-100" id="deskripsi" rows="4"  required></textarea>
                        <!-- Kami telah menjalin kerjasama secara eksklusif dengan Bank Syariah Mandiri (BSM) untuk menjadi mitra dalam mengoptimalisasi penjualan pembiayaan produk perbankan. -->
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Upload Data</button>
                    </div>
                </div>
            </form>

            @if($mitra_kerja != null)
            <div class="card">
                <div class="card-header">{{ __('All Mitra Kerja') }}</div>

                <div class="card-body">
                @foreach($mitra_kerja as $mitra)
                    <div class="container col-4" style="float:left; margin: 17px 0px">
                        <img src="images/mitra_kerja/{{$mitra->image}}" align="center" style="margin: 0; padding: 0; width: 100%;" class="text-center" alt="image">
                        <h4 class="text-center"><b>{{$mitra->judul}}</b></h4>
                        <p class="text-center">{{$mitra->deskripsi}}</p>
                        <div class="text-center">
                            <a href="{{ url('edit_mitra_kerja'.$mitra->id)}}" class="btn btn-warning text-white" style="padding: 6px 13px; font-size: 13px;">EDIT</a>
                            <a href="{{ url('delete_mitra_kerja'.$mitra->id) }}"class="btn btn-danger" style="padding: 6px; font-size: 13px;" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">HAPUS</a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection