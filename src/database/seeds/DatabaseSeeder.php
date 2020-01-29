<?php

use App\Models\Filial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(FilialTableSeeder::class);
        $this->call(FuncionarioTableSeeder::class);

    }
}

