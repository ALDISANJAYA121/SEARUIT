<?php

namespace Database\Seeders;

use App\Models\ListApp;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ListApp::truncate();
        $csvFile = fopen(base_path("database/data/list_app.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                ListApp::create([
                    "nama" => $data['0'],
                    "link" => $data['1'],
                    "akses" => $data['2'],
                    "deskripsi" => $data['3'],
                    "pengguna" => $data['4'],
                    "pembuat" => $data['5'],
                    "logo" => $data['6'],
                    "hits" => $data['7'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
