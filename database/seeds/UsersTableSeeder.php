<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'id' => 1,
            'name' => '太郎',
            'email' => 'aaaa@aa'
            'password' => 'aiueoaiu'
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'id' => 2,
            'name' => '花子',
            'email' => 'aaaa@bb'
            'password' => 'aiueokaki'
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'id' => 3,
            'name' => 'トウモロコシ',
            'email' => 'aaaa@cc'
            'password' => 'kakikukeko'
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'id' => 4,
            'name' => 'かりんとう',
            'email' => 'aaaa@dd'
            'password' => 'sasisuseso'
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('users')->insert($param);
    }
}
