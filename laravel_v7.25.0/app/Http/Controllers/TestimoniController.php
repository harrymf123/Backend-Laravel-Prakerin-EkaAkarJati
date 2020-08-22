<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use File;

class TestimoniController extends Controller
{
    // Controller Testimoni

    public function upload_testimoni(){
        $testimoni = Testimoni::get();
        return view('admin.upload_testimoni')->with('testimoni', $testimoni);
    }

    public function upload_proses(Request $request){
        // Data Upload
        $this->validate($request, [
            'nama'        => 'required',
            'asal_tempat' => 'required',
            'image'       => 'required',
            'deskripsi'   => 'required'
        ]);

        if($request->hasFile('image')){
            // Uploading Data Testimoni
            $file = $request->file('image');

            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            $tujuan_upload = 'images/testimoni';
            
            $file->move($tujuan_upload,$fileNameToStore);

            $data = new Testimoni($request->all());
            $data->image = $fileNameToStore;
            $data->save();
        }

        return redirect('/upload_testimoni')->with('success');
    }

    public function edit_testimoni($id) {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.edit_testimoni', compact('testimoni'));
    }

    public function update_testimoni($id, Request $request){
        // Data Upload
        $this->validate($request, [
            'nama'        => 'required',
            'asal_tempat' => 'required',
            'deskripsi'   => 'required'
        ]);

        $data = Testimoni::findOrFail($id);

        if( $request->hasFile('image')){
            if($data->image != null){
                File::delete('images/testimoni/'.$data->image);
            } else {
                $data->image = null;
            }

            $file = $request->file('image');
            
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            $tujuan_upload = 'images/testimoni';
            
            $file->move($tujuan_upload,$fileNameToStore);

            $data->nama         = $request->nama;
            $data->asal_tempat  = $request->asal_tempat;
            $data->image        = $fileNameToStore;
            $data->deskripsi    = $request->deskripsi;
            $data->save();
        } else {
            $data->nama         = $request->nama;
            $data->asal_tempat  = $request->asal_tempat;
            $data->image        = $data->image;
            $data->deskripsi    = $request->deskripsi;
            $data->save();
        }

        return redirect('upload_testimoni')->with('success');
    }

    public function delete_testimoni($id) {
        $data = Testimoni::findOrFail($id);

        if($data->filename != null){
            File::delete('images/testimoni/'.$data->filename);
            $data->delete();
        } else {
            $data->delete();
        }

        return redirect('upload_testimoni')->with('success');
    }
}
