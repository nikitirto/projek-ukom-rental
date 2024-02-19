<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\tbl_user;
use Illuminate\Http\Request;

class data_adminController extends Controller
{
    public function index(Admin $admin, tbl_user $tbl_user)
    {
        $data = [
            'admin' => $admin->all(),
            'user' => $tbl_user->all()
        ];

        return view('data-admin.index', $data);
    }

    public function store(Admin $admin, Request $request)
    {
        $data = $request->validate(
            [
                'id_user' => ['required'],
                'no_pekerja' => ['required'],
            ]
        );

        if ($data) {
            $admin->create($data);
            return redirect('data-admin')->with('success', 'Data admin baru berhasil ditambah');
        } else {
            return back()->with('error', 'Data admin gagal ditambahkan');
        }
    }

    public function edit(Admin $admin, tbl_user $tbl_user, string $id)
    {
        $data = [
            'admin' => $admin
                ->join('tbl_user', 'tbl_admin.id_user', 'tbl_user.id_user')
                ->where('tbl_admin.id_admin', $id)
                ->first(),
            'user' => $tbl_user->all()
        ];

        return view('data-admin.edit', $data);
    }

    public function update(Admin $admin, Request $request)
    {
        $id_admin = $request->input('id_admin');

        $data = $request->validate(
            [
                'id_user' => ['required'],
                'no_pekerja' => ['required'],
            ]
        );
        
        $dataUpdate = $admin->where('id_admin', $id_admin)->update($data);

        if ($dataUpdate) {
            return redirect('/data-admin')->with('success', 'Data admin berhasil diupdate');
        }

        return back()->with('error', 'Data admin gagal diupdate');
    }

    public function destroy(Admin $admin, Request $request)
    {
        $id_admin = $request->input('id_admin');

        $aksi = $admin->where('id_admin', $id_admin)->delete();

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
