<?php

use App\Models\Outlet;
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
        Schema::create('pakets', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Outlet::class)->index();
            $table->enum('jenis', ['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain']);
            $table->string('nama_paket', 100);
            $table->string('slug', 100)->unique();
            $table->integer('harga');
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
        Schema::dropIfExists('pakets');
    }
};
