<?php

use Illuminate\Database\Seeder;
use Faker\Factory  as Faker;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        for ($i=0; $i < 8000; $i++) {
        	
			DB::table('productos')->insert([
	            'id'=>null,
				'codigo_barras' => $faker->catchPhrase,
	            'descripcion'=> $faker->text($maxNbChars = 200) ,
				'precio_compra' => $faker->randomFloat($nbMaxDecimals = 2, $min = 12.00, $max = 9999.99),
				'precio_venta' => $faker->randomFloat($nbMaxDecimals = 2, $min = 12.00, $max = 9999.99),
				'existencia' => $faker->numberBetween($min = 0, $max = 250),
				'precio_en_dolar' => $faker->randomFloat($nbMaxDecimals = 2, $min = 12.00, $max = 9999.99),
				'foto1' => $faker->imageUrl($width = 640, $height = 480),
				'created_at'=> date("Y-m-d H:i:s"),
				'updated_at'=> date("Y-m-d H:i:s"),
	        ]);
        }
    }
}
