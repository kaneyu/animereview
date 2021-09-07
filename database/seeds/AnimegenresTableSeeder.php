<?php

use Illuminate\Database\Seeder;

class AnimegenresTableSeeder extends Seeder
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
            'genre_name' => 'SF/ファンタジー系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 2,
            'genre_name' => 'ロボット系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 3,
            'genre_name' => 'アクション/バトル系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 4,
            'genre_name' => 'ギャグ系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 1,
            'name' => '太郎',
            'email' => 'aaaa@aa',
            'password' => 'aiueo',
            
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'id' => 1,
            'user_id' => 1,
            'anime_name' => '鬼滅',
            'summary' => 'ああ',
            'comment' => 'いい',
        ];
        DB::table('posts')->insert($param);
    }
}
