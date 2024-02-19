<?php

namespace App\Http\Controllers;

use App\Models\tbl_user;
use Illuminate\Http\Request;

class data_userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(tbl_user $tbl_user)
    {
        $data = [
            'user' => $tbl_user->all()
        ];

        return view('data-user.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, tbl_user $tbl_user)
    {    
        $data = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
                'role'    => ['required'],
            ]
        );

        if ($data) {
            $tbl_user->create($data);
            return redirect('data-user')->with('success', 'Data user baru berhasil ditambah');
        } else {
            
            return back()->with('error', 'Data user gagal ditambahkan');
        }


    }

    public function edit(tbl_user $tbl_user, string $id)
    {
        $data = [
            'user' => $tbl_user
                ->where('tbl_user.id_user', $id)
                ->first()
        ];

        return view('data-user.edit', $data);
    }

    public function update(tbl_user $tbl_user, Request $request)
    {
        $id_user = $request->input('id_user');

        $data = $request->validate(
            [
                'username' => ['required'],
                'password' => ['sometimes'],
                'role'    => ['required'],
            ]
        );
        
        $dataUpdate = $tbl_user->where('id_user', $id_user)->update($data);

        if ($dataUpdate) {
            return redirect('/data-user')->with('success', 'Data user berhasil diupdate');
        }

        return back()->with('error', 'Data user gagal diupdate');
    }

    public function destroy(tbl_user $tbl_user, Request $request)
    {
        $id_user = $request->input('id_user');

        $aksi = $tbl_user->where('id_user', $id_user)->delete();

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
