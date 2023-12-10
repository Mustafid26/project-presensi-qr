<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengurus = [
            [
            'link_ig' => 'https://instagram.com/kaisaalanaa?utm_source=qr&igshid=YTQwZjQ0NmI0OA%3D%3D',
            'nama' => 'Mustafid Kaisalana'
            ]
        ];
        Pengurus::insert($pengurus);
    }
}
