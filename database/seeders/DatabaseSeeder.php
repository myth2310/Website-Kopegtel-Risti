<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\members; 

use DB, Str;
use Faker\Factory as Faker;
use Faker\Text;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt("admin123"),
        ]);

        for ($i=0; $i < 50; $i++) { 
            DB::table('members')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->PhoneNumber,
                'address' => $faker->address,
                'position' => $faker->randomElement(['Anggota']),
                'status' => $faker->randomElement(['Aktif', 'Pensiun']),
                'created_at' => date("Y-m-d"),            
                'updated_at' => date("Y-m-d"),            
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            DB::table('activities')->insert([
                'name' => $faker->randomElement([
                    'Rapat Anggota Tahunan', 
                    'Pembagian Parcel', 
                    'Sosialisasi Pajak dan Rekonsiliasi'
                ]),
                'date' => $faker->date("Y-m-d"),
                'description' => $faker->sentence,
                'image' => $faker->image(null, 640, 480),
                'created_at' => date("Y-m-d"),            
                'updated_at' => date("Y-m-d"),     
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            DB::table('products')->insert([
                'name' => $faker->randomElement([
                    'Simpanan Pokok', 
                    'Simpanan Wajib', 
                    'Simpanan Sukarela (SSR)',
                    'Simpanan Sukarela Berjangka (SSB)'
                ]),
                'description' => $faker->sentence,
                'image' => $faker->image(null, 640, 480),
                'created_at' => date("Y-m-d"),            
                'updated_at' => date("Y-m-d"),     
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            DB::table('documents')->insert([
                'fileName' => $faker->randomElement([
                    'AD/ART Kopegtel', 
                    'Daftar Anggota Kopegtel', 
                    'Laporan Keuangan',
                ]),
                'fileType' => $faker->randomElement([
                    'pdf', 
                    'xlx', 
                    'csv',
                ]),
                'file' => "files/5S3f06xzqJxXBfCGzGqBTptGkEsMz7k5sAg3pfTJ.pdf",
                'created_at' => date("Y-m-d"),            
                'updated_at' => date("Y-m-d"),     
            ]);
        }

        for ($i=0; $i < 15; $i++) {
            DB::table('messages')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'subject' => $faker->word,
                'message' => $faker->realText(150),
                'created_at' => date("Y-m-d"),            
                'updated_at' => date("Y-m-d"),     
            ]);
        }

        for ($i=0; $i < 5; $i++) {
            DB::table('banners')->insert([
                'name' => $faker->name,
                'image' => $faker->image(null, 640, 480),
                'created_at' => date("Y-m-d"),            
                'updated_at' => date("Y-m-d"),     
            ]);
        }

    }
}
