<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class data_rekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Rekening $rekening)
    {
        $totalRekening = DB::select('SELECT CountRekening() AS totalRekening')[0]->totalRekening;

        $data = [
            'rekening' => DB::table('view_rekening')->get(),
            'jumlahRekening' => $totalRekening
        ];

        return view('data-rekening.index', $data);
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
    public function store(Request $request, Rekening $rekening)
    {
        $data = $request->validate([
            'nama_bank' => 'required',
            'no_rek' => 'required',
        ]);

        if (DB::statement("CALL CreateDataRekening(?, ?)", array_values($data))) {
            return redirect('/data-rekening')->with('success', 'Data rekening baru berhasil ditambah');
        }

        return back()->with('error', 'Data rekening gagal ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekening $rekening, string $id)
    {
        $data = [
            'rekening' => $rekening->where('id_rek', $id)->first()
        ];

        return view('data-rekening.edit', $data);
    }

    public function show(Rekening $rekening, string $id)
    {
        $data = [
            'rekening' => $rekening->where('id_rek', $id)->first()
        ];

        return view('data-rekening.detail', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rekening $rekening)
    {
        $id_rek = $request->input('id_rek');

        $data = $request->validate([
            'nama_bank' => 'required',
            'no_rek' => 'required',
        ]);

        $dataUpdate = $rekening->where('id_rek', $id_rek)->update($data);

        if ($dataUpdate) {
            return redirect('/data-rekening')->with('success', 'Data rekening berhasil diupdate');
        }

        return back()->with('error', 'Data rekening gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekening $rekening, Request $request)
    {
        $id_rek = $request->input('id_rek');

        $aksi = $rekening->where('id_rek', $id_rek)->delete();

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
