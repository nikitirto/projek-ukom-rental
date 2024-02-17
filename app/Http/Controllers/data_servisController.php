<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class data_servisController extends Controller
{
    public function index(Servis $servis)
    {
        $totalServis = DB::select('SELECT CountServis() AS totalServis')[0]->totalServis;

        $data = [
            'servis' =>  DB::table('view_servis')->get(),
            'jumlahServis' => $totalServis
        ];

        return view('data-servis.index', $data);
    }

    public function store(Servis $servis, Request $request)
    {
        $data = $request->validate([
            'no_parts' => 'required',
            'tgl_servis' => 'required',
            'id_parts' => 'required',
            'no_parts_ganti' => 'required',
        ]);

        if (DB::statement("CALL CreateDataServis(?, ?, ?, ?)", array_values($data))) {
            return redirect('/data-servis')->with('success', 'Data servis baru berhasil ditambah');
        }

        return back()->with('error', 'Data servis gagal ditambahkan');
    }

    public function edit(Servis $servis, string $id)
    {
        $data = [
            'servis' => $servis->where('id_servis', $id)->first()
        ];

        return view('data-servis.edit', $data);
    }

    public function show(Servis $servis, string $id)
    {
        $data = [
            'servis' => $servis->where('id_servis', $id)->first()
        ];

        return view('data-servis.detail', $data);
    }

    public function update(Request $request, Servis $servis)
    {
        $id_servis = $request->input('id_servis');

        $data = $request->validate([
            'no_parts' => 'required',
            'tgl_servis' => 'required',
            'id_parts' => 'required',
            'no_parts_ganti' => 'required',
        ]);

        $dataUpdate = $servis->where('id_servis', $id_servis)->update($data);

        if ($dataUpdate) {
            return redirect('/data-servis')->with('success', 'Data servis berhasil diupdate');
        }

        return back()->with('error', 'Data servis gagal diupdate');
    }

    public function destroy(Servis $servis, Request $request)
    {
        $id_servis = $request->input('id_servis');

        $aksi = $servis->where('id_servis', $id_servis)->delete();

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
