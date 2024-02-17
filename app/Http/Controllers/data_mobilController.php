<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Kondisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class data_mobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Mobil $mobil, Kondisi $kondisi)
    {
        $totalMobil = DB::select('SELECT CountMobil() AS totalMobil')[0]->totalMobil;

        $data = [
            'kondisi' => $kondisi->all(),
            'mobil' => DB::table('view_mobil')->get(),
            'jumlahMobil' => $totalMobil
        ];

        return view('data-mobil.index', $data);
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
    public function store(Request $request, Mobil $mobil)
    {
        $data = $request->validate([
            'id_kondisi' => 'required',
            'merek' => 'required',
            'biaya' => 'required'
        ]);

        if (DB::statement("CALL CreateDataMobil(?, ?, ?)", array_values($data))) {
            return redirect('/data-mobil')->with('success', 'Data mobil baru berhasil ditambah');
        }

        return back()->with('error', 'Data mobil gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Mobil $mobil, Kondisi $kondisi)
    {
        $data = [
            'mobil' => $mobil
                ->join('tbl_kondisi', 'tbl_mobil.id_kondisi', '=', 'tbl_kondisi.id_kondisi')
                ->where('tbl_mobil.id_mobil', $id)
                ->first(),

            'kondisi' => $kondisi->all()
        ];

        return view('data-mobil.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Mobil $mobil, Kondisi $kondisi)
    {
        $data = [
            'mobil' => $mobil
                ->join('tbl_kondisi', 'tbl_mobil.id_kondisi', '=', 'tbl_kondisi.id_kondisi')
                ->where('tbl_mobil.id_mobil', $id)
                ->first(),

            'kondisi' => $kondisi->all()
        ];

        // dd($data);

        return view('data-mobil.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        $id_mobil = $request->input('id_mobil');

        $data = $request->validate([
            'id_kondisi' => 'required',
            'merek' => 'required',
            'biaya' => 'required'
        ]);

        $dataUpdate = $mobil->where('id_mobil', $id_mobil)->update($data);

        if ($dataUpdate) {
            return redirect('/data-mobil')->with('success', 'Data mobil berhasil diperbarui');
        }

        return back()->with('error', 'Data mobil gagal ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil, Request $request)
    {
        $id_mobil = $request->input('id_mobil');

        $aksi = $mobil->where('id_mobil', $id_mobil)->delete();

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
}
