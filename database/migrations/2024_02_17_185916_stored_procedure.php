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
        DB::unprepared("DROP PROCEDURE IF EXISTS CreateDataCustomer");
        DB::unprepared(
            "CREATE PROCEDURE CreateDataCustomer(
        id_user INT(11),
        alamat_rumah TEXT,
        foto_ktp TEXT,
        nama_lengkap VARCHAR(255),
        kode_pos INT(11),
        no_telp INT(11)
    )
    BEGIN
        DECLARE pesan_error CHAR(5) DEFAULT '00000';
        BEGIN
            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
        END;

        START TRANSACTION;
        SAVEPOINT satu;

        INSERT INTO tbl_customer (id_user, alamat_rumah, foto_ktp, nama_lengkap, kode_pos, no_telp)
        VALUES (id_user, alamat_rumah, foto_ktp, nama_lengkap, kode_pos, no_telp);

        IF pesan_error != '00000' THEN ROLLBACK TO satu;
        END IF;
        COMMIT;
    END;"
        );

        DB::unprepared("DROP PROCEDURE IF EXISTS CreateDataKondisi");
        DB::unprepared(
            "CREATE PROCEDURE CreateDataKondisi(
        id_servis INT(11),
        deskripsi TEXT
    )
    BEGIN
        DECLARE pesan_error CHAR(5) DEFAULT '00000';
        BEGIN
            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
        END;

        START TRANSACTION;
        SAVEPOINT satu;

        INSERT INTO tbl_kondisi (id_servis, deskripsi)
        VALUES (id_servis, deskripsi);

        IF pesan_error != '00000' THEN ROLLBACK TO satu;
        END IF;
        COMMIT;
    END;
"
        );

        DB::unprepared("DROP PROCEDURE IF EXISTS CreateDataMobil");
        DB::unprepared(
            "CREATE PROCEDURE CreateDataMobil(
        id_kondisi INT(11),
        merek VARCHAR(255),
        biaya VARCHAR(255)
    )
    BEGIN
        DECLARE pesan_error CHAR(5) DEFAULT '00000';
        BEGIN
            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
        END;

        START TRANSACTION;
        SAVEPOINT satu;

        INSERT INTO tbl_mobil (id_kondisi, merek, biaya)
        VALUES (id_kondisi, merek, biaya);

        IF pesan_error != '00000' THEN ROLLBACK TO satu;
        END IF;
        COMMIT;
    END;
"
        );

        DB::unprepared("DROP PROCEDURE IF EXISTS CreateDataSewa");
        DB::unprepared(
            "CREATE PROCEDURE CreateDataSewa(
        id_customer INT(11),
        id_mobil INT(11),
        id_rek INT(11),
        tgl_sewa DATE,
        tgl_kembali DATE,
        tgl_transaksi DATE
    )
    BEGIN
        DECLARE pesan_error CHAR(5) DEFAULT '00000';
        BEGIN
            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
        END;

        START TRANSACTION;
        SAVEPOINT satu;

        INSERT INTO tbl_sewa (id_customer, id_mobil, id_rek, tgl_sewa, tgl_kembali, tgl_transaksi)
        VALUES (id_customer, id_mobil, id_rek, tgl_sewa, tgl_kembali, tgl_transaksi);

        IF pesan_error != '00000' THEN ROLLBACK TO satu;
        END IF;
        COMMIT;
    END;
"
        );

        DB::unprepared("DROP PROCEDURE IF EXISTS CreateDataRekening");
        DB::unprepared(
            "CREATE PROCEDURE CreateDataRekening(
        nama_bank VARCHAR(255),
        no_rek INT(11)
    )
    BEGIN
        DECLARE pesan_error CHAR(5) DEFAULT '00000';
        BEGIN
            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
        END;

        START TRANSACTION;
        SAVEPOINT satu;

        INSERT INTO tbl_rekening (nama_bank, no_rek)
        VALUES (nama_bank, no_rek);

        IF pesan_error != '00000' THEN ROLLBACK TO satu;
        END IF;
        COMMIT;
    END;
"
        );

        DB::unprepared("DROP PROCEDURE IF EXISTS CreateDataServis");
        DB::unprepared(
            "CREATE PROCEDURE CreateDataServis(
        no_parts INT(11),
        tgl_servis DATE,
        id_parts INT(11),
        no_parts_ganti INT(11)
    )
    BEGIN
        DECLARE pesan_error CHAR(5) DEFAULT '00000';
        BEGIN
            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
        END;

        START TRANSACTION;
        SAVEPOINT satu;

        INSERT INTO tbl_servis (no_parts, tgl_servis, id_parts, no_parts_ganti)
        VALUES (no_parts, tgl_servis, id_parts, no_parts_ganti);

        IF pesan_error != '00000' THEN ROLLBACK TO satu;
        END IF;
        COMMIT;
    END;
"
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
