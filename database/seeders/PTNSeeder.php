<?php

namespace Database\Seeders;

use App\Models\PTN;
use Illuminate\Database\Seeder;

class PTNSeeder extends Seeder
{
    public function run()
    {
        $ptns = [
            [
                'name' => 'Universitas Indonesia',
                'code' => 'UI',
                'min_score' => 35,
                'description' => 'Universitas Indonesia - Perguruan tinggi terbaik di Indonesia.',
            ],
            [
                'name' => 'Universitas Gadjah Mada',
                'code' => 'UGM',
                'min_score' => 34,
                'description' => 'Universitas Gadjah Mada - Bulaksumur, Yogyakarta.',
            ],
            [
                'name' => 'Universitas Sebelas Maret',
                'code' => 'UNS',
                'min_score' => 33,
                'description' => 'Universitas Sebelas Maret - Surakarta.',
            ],
            [
                'name' => 'Universitas Diponegoro',
                'code' => 'UNDIP',
                'min_score' => 32,
                'description' => 'Universitas Diponegoro - Semarang.',
            ],
            [
                'name' => 'Universitas Padjadjaran',
                'code' => 'UNPAD',
                'min_score' => 31,
                'description' => 'Universitas Padjadjaran - Bandung.',
            ],
            [
                'name' => 'Universitas Brawijaya',
                'code' => 'UB',
                'min_score' => 30,
                'description' => 'Universitas Brawijaya - Malang.',
            ],
            [
                'name' => 'Universitas Airlangga',
                'code' => 'UNAIR',
                'min_score' => 29,
                'description' => 'Universitas Airlangga - Surabaya.',
            ],
            [
                'name' => 'Universitas Negeri Surabaya',
                'code' => 'UNESA',
                'min_score' => 28,
                'description' => 'Universitas Negeri Surabaya.',
            ],
            [
                'name' => 'Institut Pertanian Bogor',
                'code' => 'IPB',
                'min_score' => 27,
                'description' => 'Institut Pertanian Bogor.',
            ],
            [
                'name' => 'Universitas Sumatera Utara',
                'code' => 'USU',
                'min_score' => 26,
                'description' => 'Universitas Sumatera Utara - Medan.',
            ],
        ];

        foreach ($ptns as $ptn) {
            PTN::create($ptn);
        }
    }
} 