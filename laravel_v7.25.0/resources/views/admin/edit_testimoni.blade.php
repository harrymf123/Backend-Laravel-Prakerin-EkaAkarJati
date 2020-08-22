@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Data Testimoni</h1>

            <form id="form-upload-testimoni" method="POST" action="/update_testimoni{{$testimoni->id}}" enctype="multipart/form-data">
            @csrf
                <div class="row form-group">
                    <div class="col-12">
                        <label class="w-100" for="nama">Nama</label>
                        <input type="text" class="w-100" id="nama" value="{{$testimoni->nama}}" name="nama" required>
                    </div>
                    <div class="col-12">
                        <label class="w-100" for="asal_tempat">Asal Tempat</label>
                        <input type="text" class="w-100" id="asal_tempat" value="{{$testimoni->asal_tempat}}" name="asal_tempat" required>
                    </div>
                    <div class="col-12">
                        <label class="w-100" for="image">File Image</label>
                        <input type="file" class="w-100" id="image" name="image">
                    </div>
                    <div class="col-12">
                        <label class="w-100" for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="w-100" id="deskripsi" rows="4" required>{{$testimoni->deskripsi}}</textarea>
                        <!-- Terima kasih PT EKA, berkat PT EKA saya bisa mengembangkan potensi saya di Bidang Marketing -->
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </div>
            </form>

            @if($testimoni != null)
            <div class="card">
                <div class="card-header">{{ __('Testimoni Selected') }}</div>

                <div class="card-body">
                    <div class="container col-4" style="float:left; margin: 17px 0px">
                        <img src="images/testimoni/{{$testimoni->image}}" align="center" style="margin: 0; padding: 0; width: 100%; border-radius: 5px;" class="text-center" alt="image">
                        <h5 class="text-center"><b>{{$testimoni->nama}}</b></h5>
                        <h6 class="text-center"><b>{{$testimoni->asal_tempat}}</b></h6>
                        <p class="text-center">{{$testimoni->deskripsi}}</p>
                        <div class="text-center">
                            <a href="{{ url('upload_testimoni')}}" class="btn btn-primary text-white" style="padding: 6px 11px; font-size: 13px;">BACK</a>
                            <a href="{{ url('delete_testimoni'.$testimoni->id) }}"class="btn btn-danger" style="padding: 6px; font-size: 13px;" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">HAPUS</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection