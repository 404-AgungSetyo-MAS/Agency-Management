<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

        /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('archives');
        Schema::dropIfExists('inventory_assets');
        Schema::dropIfExists('monetaries');

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->json('img')->nullable();
            $table->string('nama_lengkap');
            $table->string('nomor_telepon');
            $table->string('email');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->timestamps();
        });

        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masuta_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_masuta_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_sub_masuta_id')->constrained()->cascadeOnDelete();
            $table->string('full_code')->virtualAs('concat(
                LPAD(masuta_id, 2, \'0\'), \'.\',
                LPAD(sub_masuta_id, 2, \'0\'), \'.\',
                LPAD(sub_sub_masuta_id, 2,\'0\'),\'.\',
                DATE_FORMAT(created_at, \'%m%y\'),
                LPAD(id, 4,\'0\')
                )');
            $table->string('nama');
            $table->foreignId('statusdoc_id')->default(0);
            $table->string('detil_status')->nullable();
            $table->json('file')->nullable();
            $table->timestamps();
        });

        Schema::create('inventory_assets', function (Blueprint $table) {
            $table->id();
            $table->json('img')->nullable();
            $table->string('code')
                ->virtualAs('concat(LPAD(asset_clasification_id, 2, \'0\'),\'.\',
                             LPAD(asset_type_id, 2, \'0\'),\'.\',
                             LPAD(asset_sub_type_id, 2, \'0\'),\'.\',
                             LPAD(asset_location_id, 3, \'0\'),\'.\',
                             date_format(tanggal,\'%m\'),
                             date_format(tanggal,\'%y\'),\'.\',
                             LPAD(id, 4, \'0\')
                             )'
                        );
            $table->foreignId('asset_clasification_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asset_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asset_sub_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asset_location_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('nama');
            $table->string('description');
            $table->foreignId('statusaset_id')->default(0);
            $table->timestamps();
        });

        Schema::create('monetaries', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->virtualAs('concat(LPAD(id,4,\'0\'))');
            $table->string('code')->virtualAs('concat(
                LPAD(keukategori_id, 2, \'0\'), \'.\',
                LPAD(keusubkategori_id, 2, \'0\'),\'.\',
                date_format(tanggal, \'%m%y\'), nomor)');
            $table->foreignId('keukategori_id')->constrained()->cascadeOnDelete();
            $table->foreignId('keusubkategori_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->date('tanggal');
            $table->integer('value');
            $table->timestamps();
        });
    }
};
