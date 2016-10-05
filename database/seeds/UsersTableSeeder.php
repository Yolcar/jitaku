<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
          [
            'name'      => 'Yolcar',
            'last_name' => 'Cortez',
            'email'     => 'xyolcar@gmail.com',
            'user'      => 'xYolcar',
            'password'  => \Hash::make('123456'),
            'type'      => 'admin',
            'active'    => 1,
            'address'   => 'Santa Isabel 199 Dpto 303',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
          ],
          [
            'name'      => 'Yuliandry',
            'last_name' => 'Lopez',
            'email'     => 'yulillopeze@gmail.com',
            'user'      => 'Yuliih',
            'password'  => \Hash::make('123456'),
            'type'      => 'user',
            'active'    => 1,
            'address'   => 'Santa Isabel 199 Dpto 303',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
          ]
        );

        User::insert($data);
    }
}
