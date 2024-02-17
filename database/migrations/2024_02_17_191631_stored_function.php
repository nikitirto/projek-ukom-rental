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
        DB::unprepared('DROP FUNCTION IF EXISTS CountCustomer');
        DB::unprepared('
            CREATE FUNCTION CountCustomer() RETURNS INT
            BEGIN
                DECLARE Customer INT;
                SELECT COUNT(*) INTO Customer FROM tbl_customer;
                RETURN Customer;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountKondisi');
        DB::unprepared('
            CREATE FUNCTION CountKondisi() RETURNS INT
            BEGIN
                DECLARE Kondisi INT;
                SELECT COUNT(*) INTO Kondisi FROM tbl_kondisi;
                RETURN Kondisi;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountMobil');
        DB::unprepared('
            CREATE FUNCTION CountMobil() RETURNS INT
            BEGIN
                DECLARE Mobil INT;
                SELECT COUNT(*) INTO Mobil FROM tbl_mobil;
                RETURN Mobil;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountSewa');
        DB::unprepared('
            CREATE FUNCTION CountSewa() RETURNS INT
            BEGIN
                DECLARE Sewa INT;
                SELECT COUNT(*) INTO Sewa FROM tbl_sewa;
                RETURN Sewa;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountRekening');
        DB::unprepared('
            CREATE FUNCTION CountRekening() RETURNS INT
            BEGIN
                DECLARE Rekening INT;
                SELECT COUNT(*) INTO Rekening FROM tbl_rekening;
                RETURN Rekening;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountServis');
        DB::unprepared('
            CREATE FUNCTION CountServis() RETURNS INT
            BEGIN
                DECLARE Servis INT;
                SELECT COUNT(*) INTO Servis FROM tbl_servis;
                RETURN Servis;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
