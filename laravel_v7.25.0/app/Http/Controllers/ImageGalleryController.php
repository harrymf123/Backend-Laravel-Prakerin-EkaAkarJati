<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGallery;
use File;

class ImageGalleryController extends Controller
{
    // Controller Image Gallery

    public function upload_gallery(){
        $images = ImageGallery::get();
        return view('admin.upload_image_gallery')->with('images', $images);
    }

    public function upload_proses(Request $request){
        // Image Upload
        $this->validate($request, [
            'images_gallery' => 'required'
        ]);

        if($request->hasFile('images_gallery')){
            // Uploading File Images Gallery
            foreach($request->images_gallery as $image){
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extention = $image->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extention;
                $tujuan_upload = 'images/gallery';
                
                $image->move($tujuan_upload,$fileNameToStore);

                $image = new ImageGallery();
                $image->filename = $fileNameToStore;
                $image->save();

            }
        }

        return redirect('/upload_gallery')->with('success');
    }

    public function edit_gallery($id) {
        $images = ImageGallery::findOrFail($id);
        return view('admin.edit_image_gallery', compact('images'));
    }

    public function update_gallery($id, Request $request){
        // Image Update
        $this->validate($request, [
            'images_gallery' => 'required'
        ]);

        $images = ImageGallery::findOrFail($id);

        if( $request->hasFile('images_gallery')){
            if($images->filename != null){
                File::delete('images/gallery/'.$images->filename);
            } else {
                $images->filename = null;
            }

            $file = $request->file('images_gallery');
            
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            $tujuan_upload = 'images/gallery';
            
            $file->move($tujuan_upload,$fileNameToStore);

            $images->filename = $fileNameToStore;
            $images->save();
        } else {
            return redirect('edit_gallery'.$images->id);
        }

        return redirect('upload_gallery')->with('success');
    }

    public function delete_gallery($id) {
        $images = ImageGallery::findOrFail($id);

        if($images->filename != null){
            File::delete('images/gallery/'.$images->filename);
            $images->delete();
        } else {
            $images->delete();
        }

        return redirect('upload_gallery')->with('success');
    }
}
