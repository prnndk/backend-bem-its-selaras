<?php

namespace Database\Seeders;

use App\Models\Kemenkoan;
use Illuminate\Database\Seeder;

class KemenkoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_kemenkoan = [
            [
                'name' => 'Kemenkoan Gerakan Sosial dan Politik',
                'description' => 'Kementerian Koordinator Bidang Gerakan Sosial dan Politik',
            ],
            [
                'name' => 'Kemenkoan Komunikasi Informasi dan Relasi',
                'description' => 'Kementerian Koordinator Bidang Komunikasi Informasi dan Relasi',
            ],
            [
                'name' => 'Kemenkoan Intra Kampus',
                'description' => 'Kementerian Koordinator Bidang Intra Kampus',
            ],
            [
                'name' => 'Kemenkoan Kemahasiswaan',
                'description' => 'Kementerian Koordinator Bidang Kemahasiswaan',
            ],
            [
                'name' => 'Kemenkoan Kemasyarakatan',
                'description' => 'Kementerian Koordinator Bidang Kemasyarakatan',
            ],
            [
                'name' => 'Kemenkoan Inovasi Karya',
                'description' => 'Kementerian Koordinator Bidang Inovasi Karya',
            ],
            [
                'name' => 'Presiden dan Sekretaris Jenderal',
                'description' => 'Presiden dan Sekretaris Jenderal',
            ]
        ];

        Kemenkoan::factory()->createMany($data_kemenkoan);
    }
}
