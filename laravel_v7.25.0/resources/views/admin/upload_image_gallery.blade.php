@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Upload Image Gallery</h1>

            <form id="form-upload-gallery" method="POST" action="/upload_gallery/proses" enctype="multipart/form-data">
            @csrf
                <div class="row form-group">
                    <div class="col-12">
                        <label class="w-100" for="images_gallery">File Images</label>
                        <input type="file" multiple="multiple" class="w-100" id="images_gallery" name="images_gallery[]" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Upload Image</button>
                    </div>
                </div>
            </form>

            @if($images != null)
            <div class="card">
                <div class="card-header">{{ __('All Images Gallery') }}</div>

                <div class="card-body">
                @foreach($images as $image)
                    <div class="container col-4" style="float:left; margin: 17px 0px">
                        <img src="images/gallery/{{$image->filename}}" align="center" style="margin: 0; padding: 0" class="" alt="image" width="100%">
                        <div class="text-center">
                            <a href="{{ url('edit_gallery'.$image->id)}}" class="btn btn-warning text-white" style="padding: 6px 13px; font-size: 13px;">EDIT</a>
                            <a href="{{ url('delete_gallery'.$image->id) }}"class="btn btn-danger" style="padding: 6px; font-size: 13px;" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">HAPUS</a>
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