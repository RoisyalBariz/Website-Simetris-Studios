<?php

namespace Database\Seeders;

use App\Models\Coloring;
use App\Models\HairArtist;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        HairArtist::create([
            'name' => 'Allan',
            'image' => 'booking-4.png',
        ]);

        HairArtist::create([
            'name' => 'Andes',
            'image' => 'booking-3.png'
        ]);

        HairArtist::create([
            'name' => 'Aris',
            'image' => 'booking-2.png'
        ]);

        HairArtist::create([
            'name' => 'MangFeb',
            'image' => 'booking-1.png'
        ]);




        Service::create([
            'nama_service' => 'Mens Haircut',
            'harga_service' => '60000',
        ]);

        Service::create([
            'nama_service' => 'Dry Shaving',
            'harga_service' => '20000',
        ]);

        Service::create([
            'nama_service' => 'Traditional Shaving',
            'harga_service' => '35000',
        ]);

        Service::create([
            'nama_service' => 'Styling',
            'harga_service' => '35000',
        ]);

        Service::create([
            'nama_service' => 'Hairmask',
            'harga_service' => '60000',
        ]);

        Service::create([
            'nama_service' => 'Perming',
            'harga_service' => '300000',
        ]);

        Service::create([
            'nama_service' => 'Non Service',
            'harga_service' => '0',
        ]);


        Coloring::create([
            'nama_coloring' => 'Basic Color Black',
            'harga_coloring' => '70000',
        ]);

        Coloring::create([
            'nama_coloring' => 'Basic Color Brown',
            'harga_coloring' => '80000',
        ]);

        Coloring::create([
            'nama_coloring' => 'Highlight Bleach',
            'harga_coloring' => '150000',
        ]);

        Coloring::create([
            'nama_coloring' => 'Highlight Color',
            'harga_coloring' => '300000',
        ]);

        Coloring::create([
            'nama_coloring' => 'Fashion Color',
            'harga_coloring' => '300000',
        ]);

        Coloring::create([
            'nama_coloring' => 'Non Coloring',
            'harga_coloring' => '0',
        ]);
    }
}
