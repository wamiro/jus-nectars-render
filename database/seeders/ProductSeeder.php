<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Product, Category};

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catalogue = [
            [
                'name' => 'Jus d'Ananas Artisanal',
                'slug' => 'jus-ananas-artisanal',
                'description' => 'Pur jus pressé à froid, sans sucre ajouté.',
                'origins' => 'Ananas Cameroun - Littoral',
                'fabrication' => 'Extraction à froid, pasteurisation douce',
                'price_cfa' => 1500,
                'volume_ml' => 330,
                'range' => 'classique',
                'occasion' => 'degustation',
                'availability' => true,
                'image_url' => 'https://picsum.photos/seed/ananas/600/400',
                'category_slug' => 'jus'
            ],
            [
                'name' => 'Nectar de Mangue',
                'slug' => 'nectar-mangue',
                'description' => 'Nectar onctueux, riche en pulpe.',
                'origins' => 'Mangues locales',
                'fabrication' => 'HPP (High Pressure Processing) inspiré Kookabarra',
                'price_cfa' => 1800,
                'volume_ml' => 330,
                'range' => 'premium',
                'occasion' => 'epicerie',
                'availability' => true,
                'image_url' => 'https://picsum.photos/seed/mangue/600/400',
                'category_slug' => 'nectars'
            ],
            [
                'name' => 'Thé Glacé Citron',
                'slug' => 'the-glace-citron',
                'description' => 'Infusion lente, arômes naturels de citron.',
                'origins' => 'Citron Cameroun',
                'fabrication' => 'Infusion à froid',
                'price_cfa' => 1200,
                'volume_ml' => 500,
                'range' => 'classique',
                'occasion' => 'traiteur',
                'availability' => true,
                'image_url' => 'https://picsum.photos/seed/citron/600/400',
                'category_slug' => 'thes-glaces'
            ],
        ];

        foreach($catalogue as $p){
            $cat = \App\Models\Category::where('slug', $p['category_slug'])->first();
            if(!$cat) continue;
            $data = $p;
            unset($data['category_slug']);
            $data['category_id'] = $cat->id;
            Product::firstOrCreate(['slug'=>$data['slug']], $data);
        }
    }
}