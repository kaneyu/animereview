<?php

use Illuminate\Database\Seeder;
use App\Post;

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
            'id' => 5,
            'genre_name' => '日常/ほのぼの系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 6,
            'genre_name' => 'スポーツ系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 7,
            'genre_name' => 'ホラー/推理系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 8,
            'genre_name' => '歴史系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 9,
            'genre_name' => '青春系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 10,
            'genre_name' => '百合系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
        
        $param = [
            'id' => 11,
            'genre_name' => '転移/転生系',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('animegenres')->insert($param);
    }
}
