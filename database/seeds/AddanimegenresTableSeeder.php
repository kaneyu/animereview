<?php

use Illuminate\Database\Seeder;

class AddanimegenresTableSeeder extends Seeder
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
            'id' => 12,
            'genre_name' => '恋愛系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
    }
}
