<?php

use Illuminate\Database\Seeder;
use App\Fakultas;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $listFakultas = [
            'Fakultas Ekonomi Bisnis',
            'Fakultas Hukum',
            'Fakultas Ilmu Administrasi',
            'Fakultas Ilmu Budaya',
            'Fakultas Ilmu Kelautan',
            'Fakultas Ilmu Komputer',
            'Fakultas Ilmu Sosial dan Ilmu Politik',
            'Fakultas Kedokteran',
            'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'Fakultas Pendidikan Vokasi',
            'Fakultas Pertanian',
            'Fakultas Peternakan',
            'Fakultas Teknik',
            'Fakultas Teknologi Pertanian'
        ];

        foreach ($listFakultas as $fakultas) {
        	Fakultas::create(['nama_fakultas' => $fakultas]);
        }
    }
}
