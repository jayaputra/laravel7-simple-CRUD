<?php

use Illuminate\Database\Seeder;
use App\Kontak;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Kontak::class, 30)->create();
    }
}
