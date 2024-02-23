<?php

use App\Models\settings;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('type');
            $table->timestamps();
        });


        settings::create([
            'key' => 'site_name',
            'label' => 'Judul situs',
            'value' => 'website toko sepatu',
            'type' => 'text'
        ]);
        settings::create([
            'key' => '_location',
            'label' => 'Alamat',
            'value' => 'Bandung, Jawa Barat, Indonesia',
            'type' => 'text'
        ]);
        settings::create([
            'key' => '_youtube',
            'label' => 'Youtube',
            'value' => 'https://youtube.com/@fahriilman6445',
            'type' => 'text'
        ]);
        settings::create([
            'key' => '_github',
            'label' => 'Github',
            'value' => 'https://github.com/fahriilman123?tab=repositories',
            'type' => 'text'
        ]);
        settings::create([
            'key' => '_instagram',
            'label' => 'Instagram',
            'value' => 'https://instagram.com/_fahri_ilman',
            'type' => 'text'
        ]);
        settings::create([
            'key' => '_linkedin',
            'label' => 'Linkedin',
            'value' => 'https://www.linkedin.com/in/fahri-ilman-70149421b/',
            'type' => 'text'
        ]);
        settings::create([
            'key' => '_site_desciption',
            'label' => 'Site Descrepstion',
            'value' => 'Website penjual sepatu branded bekas yang berkulitas tinggi dan harga yang terjangkau',
            'type' => 'text'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
