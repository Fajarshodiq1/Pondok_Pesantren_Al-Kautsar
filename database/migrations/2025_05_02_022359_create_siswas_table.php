<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->string('sekolah_asal');
            $table->string('pas_foto')->nullable();
            $table->boolean('status')->default(true);
            $table->string('riwayat_pendidikan');
            // kontak orang tua
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('no_telepon_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('no_telepon_ibu');
            // dokumen pendaftaran
            $table->string('akta_lahir')->nullable();
            $table->string('kk')->nullable();
            $table->string('ijazah')->nullable();
            // informasi login
            $table->string('email')->unique();
            $table->string('password');

            // relasi dengan program
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};