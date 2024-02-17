<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class data_customerController extends Controller
{
    public function index(User $user, Customer $customer)
    {
        $totalCustomer = DB::select('SELECT CountCustomer() AS totalCustomer')[0]->totalCustomer;

        $data = [
            'customer' => DB::table('view_customer')->get(),
            'user' => $user->all(),
            'jumlahCustomer' => $totalCustomer
        ];

        return view('data-customer.index', $data);
    }

    public function store(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'id_user' => 'required',
            'alamat_rumah' => 'required',
            'foto_ktp' => 'required',
            'nama_lengkap' => 'sometimes',
            'kode_pos' => 'required',
            'no_telp' => 'required',
        ]);

        if ($data) {
            if ($request->hasFile('foto_ktp') && $request->file('foto_ktp')->isValid()) {
                $foto_file = $request->file('foto_ktp');
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto-ktp'), $foto_nama);
                $data['foto_ktp'] = $foto_nama;
            }

            DB::statement("CALL CreateDataCustomer(?, ?, ?, ?, ?, ?)", array_values($data));

            return redirect('/data-customer')->with('success', 'Data customer berhasil ditambah');
        }
    }

    public function edit(User $user, Customer $customer, string $id)
    {
        $data = [
            'customer' => $customer
                ->join('tbl_user', 'tbl_customer.id_user', '=', 'tbl_user.id_user')
                ->where('tbl_customer.id_customer', $id)
                ->first(),

            'user' => $user->all()
        ];

        return view('data-customer.edit', $data);
    }

    public function update(Request $request, Customer $customer)
    {
        $id_customer = $request->input('id_customer');

        $data = $request->validate([
            'id_user' => 'required',
            'alamat_rumah' => 'required',
            'foto_ktp' => 'required',
            'nama_lurator' => 'sometimes',
            'kode_pos' => 'required',
            'no_telp' => 'required',
        ]);

        if ($id_customer !== null) {
            if ($request->hasFile('foto_ktp')) {
                $foto_file = $request->file('foto_ktp');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
                $foto_file->move(public_path('foto_ktp'), $foto_nama);

                $update_data = $customer->where('id_customer', $id_customer)->first();
                File::delete(public_path('foto_ktp') . '/' . $update_data->file);

                $data['foto_ktp'] = $foto_nama;
            }

            $dataUpdate = $customer->where('id_customer', $id_customer)->update($data);

            if ($dataUpdate) {
                return redirect('/data-customer')->with('success', 'Data customer berhasil diupdate');
            }
        }


        return back()->with('error', 'Data customer gagal diupdate');
    }

    public function destroy(Customer $customer, Request $request)
    {
        $id_customer = $request->input('id_customer');

        $aksi = $customer->where('id_customer', $id_customer)->delete();

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
