<?php

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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->unsignedInteger('outlet_id')->after('id');
            $table->foreign('outlet_id')->references('id')->on('outlets');

            $table->unsignedInteger('member_id')->after('kode_invoice');
            $table->foreign('member_id')->references('id')->on('members');

            $table->unsignedInteger('user_id')->after('dibayar');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('detail_transaksis', function (Blueprint $table) {
            $table->string('kode_invoice', 100)->unique()->index()->after('id');
            $table->foreign('kode_invoice')->references('kode_invoice')->on('transaksis');

            $table->unsignedInteger('paket_id')->after('kode_invoice');
            $table->foreign('paket_id')->references('id')->on('pakets');
        });

        Schema::table('pakets', function (Blueprint $table) {
            $table->unsignedInteger('outlet_id')->after('slug');
            $table->foreign('outlet_id')->references('id')->on('outlets');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('outlet_id')->after('password');
            $table->foreign('outlet_id')->references('id')->on('outlets');
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
        Schema::dropIfExists('detail_transaksis');
        Schema::dropIfExists('pakets');
        Schema::dropIfExists('users');
    }
};
