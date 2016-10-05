<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Avocado',
                'slug' => 'avocado',
                'description' => 'Rolls Envueltos en palta',
                'color' => '#5af05a',
                'created_at' => '2016-10-02 00:00:00',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Cream',
                'slug' => 'cream',
                'description' => 'Cream Roll Envuelto en palta',
                'color' => '#FFF7FB',
                'created_at' => '2016-10-02 00:00:00',
                'updated_at' => NULL,
            ),
        ));


    }
}
