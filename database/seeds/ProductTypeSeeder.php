<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
           'product_type_name' => 'Prescription Medicine',
        ]);

        DB::table('product_types')->insert([
           'product_type_name' => 'OTC Medicine',
        ]);
        
        DB::table('product_types')->insert([
           'product_type_name' => 'Non-Pharmaceuticals Items',
        ]);

    }
}
