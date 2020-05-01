<?php

use Illuminate\Database\Seeder;

class TabelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tabela::class, 50)->create();	
    }
}
