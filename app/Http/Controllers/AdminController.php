<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{

    public function rumah_tambah(){
        return view('admin.rumah_tambah');
    }
    public function rumah_daftar(){
        $rumahs = Rumah::paginate(10);
        $rumahTotal = Rumah::count();
        $rumahTersedia = Rumah::where('label','Tersedia')->count();
        $rumahTerjual = Rumah::where('label','Sudah Terjual')->count();
        return view('admin.rumah_daftar', compact('rumahs', 'rumahTotal', 'rumahTersedia', 'rumahTerjual'));
    }
     public function tambah(Request $request)
    {
        // dd($request->file('foto'));
        //  dd($request->all());

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'subNama' => 'required|string|max:255',
            'harga' => 'required|string|regex:/^[0-9]+$/',
            'deskripsi' => 'required|string',
            'luas' => 'required|integer',
            'kamarTidur' => 'required|integer',
            'kamarMandi' => 'required|integer',
            'garasi' => 'required|integer',
            'video' => 'nullable|string|max:255',
            'deskripsiLanjutan' => 'nullable|string|max:255',
            'foto.*' => 'required|mimes:jpeg,png,jpg,gif',
            'fotoDenah' => 'nullable|mimes:jpeg,png,jpg,gif',

        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422); // 422 Unprocessable Entity
        }

        $rumah = new Rumah();
        $rumah->nama = $request->input('nama');
        $rumah->subNama = $request->input('subNama');
        $rumah->harga = $request->input('harga');
        $rumah->deskripsi = $request->input('deskripsi');
        $rumah->luas = $request->input('luas');
        $rumah->kamarMandi = $request->input('kamarMandi');
        $rumah->kamarTidur = $request->input('kamarTidur');
        $rumah->garasi = $request->input('garasi');
        $rumah->video = $request->input('video');
        $rumah->deskripsiLanjutan = $request->input('deskripsiLanjutan');

        $fotoPaths = array(); // Array untuk menyimpan path foto utama yang diunggah

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                try {
                    $path = $file->storeAs('/rumah_foto', $filename, 'public');
                    Log::info('Foto berhasil disimpan: ' . $path);
                    $fotoPaths[] = $filename;
                } catch (\Exception $e) {
                    Log::error('Gagal menyimpan foto: ' . $e->getMessage());
                    // Tambahkan penanganan error jika perlu
                }

            }
            // Simpan daftar nama file foto utama ke kolom 'foto'
            if (!empty($fotoPaths)) {
                $rumah->foto = implode(',', $fotoPaths);
            } else {
                $rumah->foto = null; // Set null jika tidak ada foto utama yang diunggah
            }
        } else {
            $rumah->foto = null; // Set null jika tidak ada foto utama yang diunggah
        }

       if ($request->hasFile('fotoDenah')) {
        // Hapus foto lama jika ada
        if ($rumah->fotoDenah) {
            Storage::disk('public')->delete('/rumah_foto/' . $rumah->fotoDenah);
        }

        $filename = $request->file('fotoDenah')->getClientOriginalName();
        $path = $request->file('fotoDenah')->storeAs('/rumah_foto', $filename, 'public');
        $rumah->fotoDenah = $filename;
    }
        $rumah->save();

        return redirect()->route('rumah_daftar')->with('success', 'Data rumah berhasil ditambahkan.');

    }
    public function edit($id){
    $rumah = Rumah::find($id);
        return view('admin.rumah_edit', compact('rumah'));
    }
     public function update(Request $request, $id)
    {
        $rumah = Rumah::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'subNama' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'harga' => 'required|string|regex:/^[0-9]+$/',
            'deskripsi' => 'required|string',
            'luas' => 'required|integer',
            'kamarTidur' => 'required|integer',
            'kamarMandi' => 'required|integer',
            'garasi' => 'required|integer',
            'video' => 'nullable|string|max:255',
            'deskripsiLanjutan' => 'nullable|string|max:255',
            'foto.*' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'fotoDenah' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $rumah->nama = $request->input('nama');
        $rumah->subNama = $request->input('subNama');
        $rumah->label = $request->input('label');
        $rumah->harga = $request->input('harga');
        $rumah->deskripsi = $request->input('deskripsi');
        $rumah->luas = $request->input('luas');
        $rumah->kamarMandi = $request->input('kamarMandi');
        $rumah->kamarTidur = $request->input('kamarTidur');
        $rumah->garasi = $request->input('garasi');
        $rumah->video = $request->input('video');
        $rumah->deskripsiLanjutan = $request->input('deskripsiLanjutan');

        $fotoPaths = [];

        if ($request->hasFile('foto')) {
            Log::info('Mulai memproses file foto untuk update.');
            // Hapus foto lama jika ada
            if ($rumah->foto) {
                $oldFoto = explode(',', $rumah->foto);
                foreach ($oldFoto as $oldFile) {
                    Storage::disk('public')->delete('/rumah_foto/' . trim($oldFile));
                    Log::info('Foto lama dihapus: /rumah_foto/' . trim($oldFile));
                }
            }
            $fotoPaths = []; // Reset array fotoPaths

            foreach ($request->file('foto') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                try {
                    $path = $file->storeAs('/rumah_foto', $filename, 'public');
                    Log::info('Foto baru berhasil disimpan: ' . $path);
                    $fotoPaths[] = $filename;
                } catch (\Exception $e) {
                    Log::error('Gagal menyimpan foto: ' . $e->getMessage());
                    // Tambahkan penanganan error jika perlu
                }
            }
            if (!empty($fotoPaths)) {
                $rumah->foto = implode(',', $fotoPaths);
            } else {
                $rumah->foto = null;
            }
        } else {
            // Jika tidak ada foto baru yang diunggah, pertahankan foto lama (atau set null jika Anda ingin menghapus jika tidak ada upload)
            // Jika Anda ingin menghapus foto jika tidak ada upload, uncomment baris di bawah ini:
            // $rumah->foto = null;
        }

        // Penanganan untuk foto denah
        if ($request->hasFile('fotoDenah')) {
            // Hapus foto denah lama jika ada
            if ($rumah->fotoDenah) {
                Storage::disk('public')->delete('/rumah_foto/' . $rumah->fotoDenah);
                Log::info('Foto denah lama dihapus: /rumah_foto/' . $rumah->fotoDenah);
            }

            $fileDenah = $request->file('fotoDenah');
            $filenameDenah = time() . '_' . $fileDenah->getClientOriginalName();
            try {
                $pathDenah = $fileDenah->storeAs('/rumah_foto', $filenameDenah, 'public');
                Log::info('Foto Denah baru berhasil disimpan: ' . $pathDenah);
                $rumah->fotoDenah = $filenameDenah;
            } catch (\Exception $e) {
                Log::error('Gagal menyimpan foto denah: ' . $e->getMessage());
                $rumah->fotoDenah = null;
            }
        } else {
            // Jika tidak ada foto denah baru, pertahankan foto denah lama
            // Anda bisa menambahkan logika untuk menghapus foto denah jika checkbox atau input tersembunyi dikirim
        }

        $rumah->save();
        Log::info('Data rumah berhasil diupdate.');
        return redirect()->route('rumah_daftar')->with('success', 'Data rumah berhasil diupdate.');
    }
    public function hapus($id){
        try {
        DB::beginTransaction();

        $rumah = Rumah::findOrFail($id);

        // Hapus fotoDenah jika ada
        if ($rumah->fotoDenah) {
            $filePathDenah = 'rumah_foto/' . $rumah->fotoDenah;
            Log::info('Attempting to delete fotoDenah: ' . $filePathDenah);

            if (Storage::disk('public')->exists($filePathDenah)) {
                Log::info('fotoDenah exists. Deleting...');
                if (!Storage::disk('public')->delete($filePathDenah)) {
                    Log::error('fotoDenah deletion failed for: ' . $filePathDenah);
                }
            } else {
                Log::warning('fotoDenah not found at: ' . $filePathDenah);
            }
        }

        // Hapus foto_1 jika ada
        if ($rumah->foto_1) {
            $filePath1 = 'rumah_foto/' . $rumah->foto_1;
            Log::info('Attempting to delete foto_1: ' . $filePath1);

            if (Storage::disk('public')->exists($filePath1)) {
                Log::info('foto_1 exists. Deleting...');
                if (!Storage::disk('public')->delete($filePath1)) {
                    Log::error('foto_1 deletion failed for: ' . $filePath1);
                }
            } else {
                Log::warning('foto_1 not found at: ' . $filePath1);
            }
        }

        // Hapus foto_2 jika ada
        if ($rumah->foto_2) {
            $filePath2 = 'rumah_foto/' . $rumah->foto_2;
            Log::info('Attempting to delete foto_2: ' . $filePath2);

            if (Storage::disk('public')->exists($filePath2)) {
                Log::info('foto_2 exists. Deleting...');
                if (!Storage::disk('public')->delete($filePath2)) {
                    Log::error('foto_2 deletion failed for: ' . $filePath2);
                }
            } else {
                Log::warning('foto_2 not found at: ' . $filePath2);
            }
        }

        // Hapus foto_3 jika ada
        if ($rumah->foto_3) {
            $filePath3 = 'rumah_foto/' . $rumah->foto_3;
            Log::info('Attempting to delete foto_3: ' . $filePath3);

            if (Storage::disk('public')->exists($filePath3)) {
                Log::info('foto_3 exists. Deleting...');
                if (!Storage::disk('public')->delete($filePath3)) {
                    Log::error('foto_3 deletion failed for: ' . $filePath3);
                }
            } else {
                Log::warning('foto_3 not found at: ' . $filePath3);
            }
        }

        // Hapus foto_4 jika ada
        if ($rumah->foto_4) {
            $filePath4 = 'rumah_foto/' . $rumah->foto_4;
            Log::info('Attempting to delete foto_4: ' . $filePath4);

            if (Storage::disk('public')->exists($filePath4)) {
                Log::info('foto_4 exists. Deleting...');
                if (!Storage::disk('public')->delete($filePath4)) {
                    Log::error('foto_4 deletion failed for: ' . $filePath4);
                }
            } else {
                Log::warning('foto_4 not found at: ' . $filePath4);
            }
        }

        $rumah->delete();

        DB::commit();

        return back()->with('success', 'Data rumah berhasil dihapus');

    }  catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error deleting rumah: ' . $e->getMessage());
        return back()->with('error', 'Gagal menghapus data rumah: ' . $e->getMessage());
    }}
}
