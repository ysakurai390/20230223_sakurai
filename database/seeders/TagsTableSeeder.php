<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'tag' =>'家事'
        ];
        Tag::create($param);
        $param = [
            'id' => 2,
            'tag' => '勉強'
        ];
        Tag::create($param);
        $param = [
            'id' => 3,
            'tag' => '運動'
        ];
        Tag::create($param);
        $param = [
            'id' => 4,
            'tag' => '食事'
        ];
        Tag::create($param);
        $param = [
            'id' => 5,
            'tag' => '移動'
        ];
        Tag::create($param);
    }
}
