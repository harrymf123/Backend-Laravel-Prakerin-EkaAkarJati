<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MitraKerja;
use File;

class MitraKerjaController extends Controller
{
// Controller Mitra Kerja

    public function upload_mitra_kerja(){
        $mitra_kerja = MitraKerja::get();
        return view('admin.upload_mitra_kerja')->with('mitra_kerja', $mitra_kerja);
    }

    public function upload_proses(Request $request){
        // Data Upload
        $this->validate($request, [
            'judul'       => 'required',
            'image'       => 'required',
            'deskripsi'   => 'required'
        ]);

        if($request->hasFile('image')){
            // Uploading Data mitra_kerja
            $file = $request->file('image');

            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            $tujuan_upload = 'images/mitra_kerja';
            
            $file->move($tujuan_upload,$fileNameToStore);

            $data = new MitraKerja($request->all());
            $data->image = $fileNameToStore;
            $data->save();
        }

        return redirect('/upload_mitra_kerja')->with('success');
    }

    public function edit_mitra_kerja($id) {
        $mitra_kerja = MitraKerja::findOrFail($id);
        return view('admin.edit_mitra_kerja', compact('mitra_kerja'));
    }

    public function update_mitra_kerja($id, Request $request){
        // Data Upload
        $this->validate($request, [
            'judul'       => 'required',
            'deskripsi'   => 'required'
        ]);

        $data = MitraKerja::findOrFail($id);

        if( $request->hasFile('image')){
            if($data->image != null){
                File::delete('images/mitra_kerja/'.$data->image);
            } else {
                $data->image = null;
            }

            $file = $request->file('image');
            
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            $tujuan_upload = 'images/mitra_kerja';
            
            $file->move($tujuan_upload,$fileNameToStore);

            $data->judul        = $request->judul;
            $data->image        = $fileNameToStore;
            $data->deskripsi    = $request->deskripsi;
            $data->save();
        } else {
            $data->judul        = $request->judul;
            $data->image        = $data->image;
            $data->deskripsi    = $request->deskripsi;
            $data->save();
        }

        return redirect('upload_mitra_kerja')->with('success');
    }

    public function delete_mitra_kerja($id) {
        $data = MitraKerja::findOrFail($id);

        if($data->filename != null){
            File::delete('images/mitra_kerja/'.$data->filename);
            $data->delete();
        } else {
            $data->delete();
        }

        return redirect('upload_mitra_kerja')->with('success');
    }
}
