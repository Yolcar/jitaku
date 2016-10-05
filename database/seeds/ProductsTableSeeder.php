<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('products')->delete();

        \DB::table('products')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Avocado Ebi',
                'slug' => 'avocado-ebi',
                'description' => 'Roll envuelto en palta, relleno de camaron, queso crema, cebollin',
                'price' => '4500.00',
                'image' => 'http://www.yamasushi.cl/284-large_default/avocado-ebi-8-unidades.jpg',
                'visible' => 1,
                'category_id' => 1,
                'created_at' => '2016-10-02 00:00:00',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Cream Ebi',
                'slug' => 'cream-ebi',
                'description' => 'Roll envuelto en Queso Crema, relleno de camaron, queso crema, cebollin',
                'price' => '4500.00',
                'image' => 'https://s-media-cache-ak0.pinimg.com/236x/1d/37/75/1d3775203401306c8dd419effed01c6d.jpg',
                'visible' => 1,
                'category_id' => 2,
                'created_at' => '2016-10-02 00:00:00',
                'updated_at' => NULL,
            ),
        ));


    }
}
