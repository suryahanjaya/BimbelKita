<?php

namespace Database\Seeders;

use App\Models\TryoutType;
use App\Models\Subtest;
use Illuminate\Database\Seeder;

class TryoutSeeder extends Seeder
{
    public function run()
    {
        // Create TPS Tryout Type
        $tps = TryoutType::create([
            'name' => 'Tes Potensi Skolastik',
            'code' => 'TPS',
            'description' => 'Tes Potensi Skolastik terdiri dari 4 subtes yang mengukur kemampuan kognitif umum.',
        ]);

        // Create TPS Subtests
        $tpsSubtests = [
            [
                'name' => 'Penalaran Umum',
                'code' => 'PU',
                'order' => 1,
            ],
            [
                'name' => 'Pemahaman Bacaan dan Menulis',
                'code' => 'PBM',
                'order' => 2,
            ],
            [
                'name' => 'Pengetahuan dan Pemahaman Umum',
                'code' => 'PPU',
                'order' => 3,
            ],
            [
                'name' => 'Pengetahuan Kuantitatif',
                'code' => 'PK',
                'order' => 4,
            ],
        ];

        foreach ($tpsSubtests as $subtest) {
            $tps->subtests()->create($subtest);
        }

        // Create Literasi Tryout Type
        $literasi = TryoutType::create([
            'name' => 'Tes Literasi',
            'code' => 'LITERASI',
            'description' => 'Tes Literasi terdiri dari 3 subtes yang mengukur kemampuan literasi dan penalaran.',
        ]);

        // Create Literasi Subtests
        $literasiSubtests = [
            [
                'name' => 'Literasi Bahasa Indonesia',
                'code' => 'LBI',
                'order' => 1,
            ],
            [
                'name' => 'Literasi Bahasa Inggris',
                'code' => 'LBE',
                'order' => 2,
            ],
            [
                'name' => 'Penalaran Matematika',
                'code' => 'PM',
                'order' => 3,
            ],
        ];

        foreach ($literasiSubtests as $subtest) {
            $literasi->subtests()->create($subtest);
        }
    }
} 