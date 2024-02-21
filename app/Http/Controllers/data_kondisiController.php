<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use App\Models\Kondisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class data_kondisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Kondisi $kondisi, Servis $servis)
    {
        $totalKondisi = DB::select('SELECT CountKondisi() AS totalKondisi')[0]->totalKondisi;

        $data = [
            'kondisi' => DB::table('view_kondisi')->get(),
            'servis' => $servis->all(),
            'jumlahKondisi' => $totalKondisi
        ];

        return view('data-kondisi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Kondisi $kondisi)
    {
        $data = $request->validate([
            'id_servis' => 'required',
            'deskripsi' => 'required',
        ]);

        if (DB::statement("CALL CreateDataKondisi(?, ?)", array_values($data))) {
            return redirect('/data-kondisi')->with('success', 'Data kondisi baru berhasil ditambah');
        }

        return back()->with('error', 'Data kondisi gagal ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Kondisi $kondisi, Servis $servis)
    {
        $data = [
            'kondisi' => $kondisi
                ->join('tbl_servis', 'tbl_kondisi.id_servis', '=', 'tbl_servis.id_servis')
                ->where('tbl_kondisi.id_kondisi', '=', $id)
                ->first(),
            'servis' => $servis->all()
        ];

        return view('data-kondisi.edit', $data);
    }

    public function show(string $id, Kondisi $kondisi, Servis $servis)
    {
        $data = [
            'kondisi' => $kondisi
                ->join('tbl_servis', 'tbl_kondisi.id_servis', '=', 'tbl_servis.id_servis')
                ->where('tbl_kondisi.id_kondisi', '=', $id)
                ->first(),

            'servis' => $servis->all()
        ];

        return view('data-kondisi.detail', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kondisi $kondisi)
    {
        $id_kondisi = $request->input('id_kondisi');

        $data = $request->validate([
            'id_servis' => 'required',
            'deskripsi' => 'required',
        ]);

        $dataUpdate = $kondisi->where('id_kondisi', $id_kondisi)->update($data);

        if ($dataUpdate) {
            return redirect('/data-kondisi')->with('success', 'Data kondisi berhasil diupdate');
        }

        return back()->with('error', 'Data kondisi gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kondisi $kondisi, Request $request)
    {
        $id_kondisi = $request->input('id_kondisi');

        $aksi = $kondisi->where('id_kondisi', $id_kondisi)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data mitra berhasil dihapus'
            ];
        } else {
            // Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'   => 'Data gagal dihapus'
            ];
        }

        return response()->json($pesan);
    }
    public function search(Request $request)
    {
             
    }
}
