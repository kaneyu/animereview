<?php

use Illuminate\Database\Seeder;

class AnimegenrepostTableSeeder extends Seeder
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
            'animegenre_id' => 1,
            'post_id' => 1,
        ];
        DB::table('animegenre_post')->insert($param);
    }
}
