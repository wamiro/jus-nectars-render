<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name'=>'Jus', 'slug'=>'jus', 'type'=>'jus'],
            ['name'=>'Nectars', 'slug'=>'nectars', 'type'=>'nectar'],
            ['name'=>'Thés glacés', 'slug'=>'thes-glaces', 'type'=>'the_glace'],
        ];
        foreach($data as $c){ Category::firstOrCreate(['slug'=>$c['slug']], $c); }
    }
}