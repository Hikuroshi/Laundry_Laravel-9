<?php

use App\Models\Member;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Outlet::class)->index();
            $table->string('kode_invoice', 100)->unique();
            $table->foreignIdFor(Member::class)->index();
            $table->dateTime('tgl');
            $table->dateTime('batas_waktu');
            $table->dateTime('tgl_bayar')->nullable();
            $table->integer('biaya_tambahan');
            $table->double('diskon');
            $table->integer('pajak');
            $table->enum('status', ['Baru', 'Proses', 'Selesai', 'Diambil'])->default('Baru');
            $table->enum('dibayar', ['Telah bayar', 'Belum bayar'])->default('Belum bayar');
            $table->foreignIdFor(User::class)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
