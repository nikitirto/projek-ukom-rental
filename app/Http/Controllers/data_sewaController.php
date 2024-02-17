<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\Mobil;
use App\Models\Customer;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class data_sewaController extends Controller
{
    public function index(Customer $customer, Mobil $mobil, Rekening $rekening, Sewa $sewa)
    {
        $totalSewa = DB::select('SELECT CountServis() AS totalSewa')[0]->totalSewa;

        $data = [
            'customer' => $customer->all(),
            'mobil' => $mobil->all(),
            'rekening' => $rekening->all(),

            'sewa' => DB::table('view_sewa')->get(),

            'jumlahSewa' => $totalSewa

        ];

        return view('data-sewa.index', $data);
    }

    public function store(Sewa $sewa, Request $request)
    {
        $data = $request->validate([
            'id_customer' => 'required',
            'id_mobil' => 'required',
            'id_rek' => 'required',
            'tgl_sewa' => 'required',
            'tgl_kembali' => 'required',
            'tgl_transaksi' => 'required'
        ]);

        if (DB::statement("CALL CreateDataSewa(?, ?, ?, ?, ?, ?)", array_values($data))) {
            return redirect('/data-sewa')->with('success', 'Data sewa baru berhasil ditambah');
        }

        return back()->with('error', 'Data sewa gagal ditambahkan');
    }

    public function show(Customer $customer, Mobil $mobil, Rekening $rekening, Sewa $sewa, string $id)
    {
        $data = [
            'customer' => $customer->all(),
            'mobil' => $mobil->all(),
            'rekening' => $rekening->all(),

            'sewa' => $sewa
                ->join('tbl_customer', 'tbl_sewa.id_customer', '=', 'tbl_customer.id_customer')
                ->join('tbl_mobil', 'tbl_sewa.id_mobil', '=', 'tbl_mobil.id_mobil')
                ->join('tbl_rekening', 'tbl_sewa.id_rek', '=', 'tbl_rekening.id_rek')
                ->where('tbl_sewa.id_sewa', $id)
                ->first()

        ];

        return view('data-sewa.detail', $data);
    }

    public function edit(Customer $customer, Mobil $mobil, Rekening $rekening, Sewa $sewa, string $id)
    {
        $data = [
            'customer' => $customer->all(),
            'mobil' => $mobil->all(),
            'rekening' => $rekening->all(),

            'sewa' => $sewa
                ->join('tbl_customer', 'tbl_sewa.id_customer', '=', 'tbl_customer.id_customer')
                ->join('tbl_mobil', 'tbl_sewa.id_mobil', '=', 'tbl_mobil.id_mobil')
                ->join('tbl_rekening', 'tbl_sewa.id_rek', '=', 'tbl_rekening.id_rek')
                ->where('tbl_sewa.id_sewa', $id)
                ->first()

        ];

        return view('data-sewa.edit', $data);
    }

    public function update(Request $request, Sewa $sewa)
    {
        $id_sewa = $request->input('id_sewa');

        $data = $request->validate([
            'id_customer' => 'required',
            'id_mobil' => 'required',
            'id_rek' => 'required',
            'tgl_sewa' => 'required',
            'tgl_kembali' => 'required',
            'tgl_transaksi' => 'required'
        ]);

        $dataUpdate = $sewa->where('id_sewa', $id_sewa)->update($data);

        if ($dataUpdate) {
            return redirect('/data-sewa')->with('success', 'Data sewa berhasil diupdate');
        }

        return back()->with('error', 'Data sewa gagal diupdate');
    }

    public function destroy(Sewa $sewa, Request $request)
    {
        $id_sewa = $request->input('id_sewa');

        $aksi = $sewa->where('id_sewa', $id_sewa)->delete();

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
