@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Upload Data Testimoni</h1>

            <form id="form-upload-testimoni" method="POST" action="/upload_testimoni/proses" enctype="multipart/form-data">
            @csrf
                <div class="row form-group">
                    <div class="col-12">
                        <label class="w-100" for="nama">Nama</label>
                        <input type="text" class="w-100" id="nama" name="nama" required>
                    </div>
                    <div class="col-12">
                        <label class="w-100" for="asal_tempat">Asal Tempat</label>
                        <input type="text" class="w-100" id="asal_tempat" name="asal_tempat" required>
                    </div>
                    <div class="col-12">
                        <label class="w-100" for="image">File Image</label>
                        <input type="file" class="w-100" id="image" name="image" required>
                    </div>
                    <div class="col-12">
                        <label class="w-100" for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="w-100" id="deskripsi" rows="4"  required></textarea>
                        <!-- Terima kasih PT EKA, berkat PT EKA saya bisa mengembangkan potensi saya di Bidang Marketing -->
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Upload Data</button>
                    </div>
                </div>
            </form>

            @if($testimoni != null)
            <div class="card">
                <div class="card-header">{{ __('All Testimoni') }}</div>

                <div class="card-body">
                @foreach($testimoni as $test)
                    <div class="container col-4" style="float:left; margin: 17px 0px">
                        <img src="images/testimoni/{{$test->image}}" align="center" style="margin: 0; padding: 0; width: 100%;" class="text-center" alt="image">
                        <h5 class="text-center"><b>{{$test->nama}}</b></h5>
                        <h6 class="text-center"><b>{{$test->asal_tempat}}</b></h6>
                        <p class="text-center">{{$test->deskripsi}}</p>
                        <div class="text-center">
                            <a href="{{ url('edit_testimoni'.$test->id)}}" class="btn btn-warning text-white" style="padding: 6px 13px; font-size: 13px;">EDIT</a>
                            <a href="{{ url('delete_testimoni'.$test->id) }}"class="btn btn-danger" style="padding: 6px; font-size: 13px;" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">HAPUS</a>
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