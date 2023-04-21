<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ListType;
use App\Models\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $types = [
            'Roman/Hikaye',
            'Araştırma',
            'Sosyoloji/felfese',
            'Din',
            'Tarih',
            'Edebiyat',
            'Klasik',
            'Hukuk',
            'İngilizce',
            'Dil',
            'Dergi',
        ];

        $list_types = [
            'Kütüphane',
            'Alınacaklar',
            'Annem',
        ];

        foreach($types as $type)
        {
            Type::create([
                'name' => $type
            ]);
        }

        foreach($list_types as $list)
        {
            ListType::create([
                'name' => $list
            ]);
        }
    }
}
