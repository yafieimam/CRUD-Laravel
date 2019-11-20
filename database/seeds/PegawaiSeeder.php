<?php

use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$faker = Faker\Factory::create(); //import library faker

        $limit = 10; //batasan berapa banyak data

        for ($i = 0; $i < $limit; $i++) {
            DB::table('pegawai')->insert([ //mengisi datadi database
                'nama_pegawai' => $faker->name,
                'email_pegawai' => $faker->unique()->email,
                'alamat_pegawai' => $faker->address,
				'no_telp_pegawai' => $faker->phoneNumber,
            ]);
        }
    }
}
