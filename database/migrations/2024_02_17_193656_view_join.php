<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP VIEW IF EXISTS view_customer');

        DB::unprepared(
            "CREATE VIEW view_customer AS
            SELECT
                c.id_customer,
                c.id_user,
                c.alamat_rumah,
                c.foto_ktp,
                c.nama_lengkap,
                c.kode_pos,
                c.no_telp,
                u.username
            FROM tbl_customer c
            JOIN tbl_user u ON c.id_user = u.id_user"
        );

        DB::unprepared('DROP VIEW IF EXISTS view_kondisi');

        DB::unprepared(
            "CREATE VIEW view_kondisi AS
            SELECT
                k.id_kondisi,
                k.id_servis,
                k.deskripsi
            FROM tbl_kondisi k
            JOIN tbl_servis s ON k.id_servis = s.id_servis"
        );

        DB::unprepared('DROP VIEW IF EXISTS view_mobil');

        DB::unprepared(
            "CREATE VIEW view_mobil AS
            SELECT
                m.id_mobil,
                m.id_kondisi,
                m.merek,
                m.biaya,
                k.deskripsi
            FROM tbl_mobil m
            JOIN tbl_kondisi k ON m.id_kondisi = k.id_kondisi
            LEFT JOIN tbl_servis s ON k.id_servis = s.id_servis"
        );

        DB::unprepared('DROP VIEW IF EXISTS view_sewa');

        DB::unprepared(
            "CREATE VIEW view_sewa AS
            SELECT
                s.id_sewa,
                s.id_customer,
                c.nama_lengkap,
                s.id_mobil,
                m.merek,
                s.id_rek,
                r.nama_bank,
                r.no_rek,
                s.tgl_sewa,
                s.tgl_kembali,
                s.tgl_transaksi
            FROM tbl_sewa s
            JOIN tbl_customer c ON s.id_customer = c.id_customer
            JOIN tbl_mobil m ON s.id_mobil = m.id_mobil
            JOIN tbl_rekening r ON s.id_rek = r.id_rek"
        );

        DB::unprepared('DROP VIEW IF EXISTS view_rekening');

        DB::unprepared(
            "CREATE VIEW view_rekening AS
            SELECT
                id_rek,
                nama_bank,
                no_rek
            FROM tbl_rekening"
        );

        DB::unprepared('DROP VIEW IF EXISTS view_servis');

        DB::unprepared(
            "CREATE VIEW view_servis AS
            SELECT
                id_servis,
                no_parts,
                tgl_servis,
                id_parts,
                no_parts_ganti
            FROM tbl_servis"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
