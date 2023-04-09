<?php

namespace Database\Seeders;

/* use Illuminate\Database\Console\Seeds\WithoutModelEvents; */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        // Recipes

        DB::table('recipes')->insert(
            [
                'label' => 'Catalan Chicken',
                'idref' => '2463f2482609d7a471dbbf3b268bd956',
                /* 'image' => 'https://edamam-product-images.s3.amazonaws.com/web-img/4d9/4d9084cbc170789caa9e997108b595de.jpg?X-Amz-Security-Token=IQoJb3JpZ2luX2VjEJT%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCXVzLWVhc3QtMSJIMEYCIQD1oedeMRCBW7DAnanTZXZCIEYUj2iRyODISimejySNOQIhALCjULJS8mqreKcmfok8FlkxYDzTm1ZtDduQnuPMh%2FRtKrkFCH0QABoMMTg3MDE3MTUwOTg2Igwi4v2d3chfXyFoVlIqlgX8pq410VYKuxelJWW7CUEYfynaUNwGoBddpZ3aa0aBJrwf0igN5YIBQLEdI4zclV34NYQC6fbf%2FNnvLW%2Fs67m68ykex4lRQzcIpcmkglY6b0XhRCs7WhWIZ3Ipftvlj4N4znophy0RvHCRswnKHYog29Epcczs0X7iZ8kYc5tVKzcDNXB1Kfdw2QHVmyj2SIkAoIt3y1UjnwGbN4TUu5XkmizbUdE9%2F3CBQJwTh3RlvbL%2BbP9ejWIqH6MEML4qhpWjc8wr03B9GfNXDbnYWaFgMJ%2BSMq94%2FN0oeamLDsSRelBUzoRFk6kGTikZ%2F8ZLf4xuVfBdbvy2neRNU%2B0FPrgrnPVcCnZms6P879J6VFHoJwGANVzWNCbJpyHUiPPq5qPKXNDdiHQBcUoR8mFUAQTjWu1FDeZZc1ENjyHUJXIkKMpP39ltQi2zeS11aamokHa%2F6FB%2BJpJUHVAVqAsqIMXq5c%2FWUTMG%2Bv7x%2FDWKopUhBeMKvkflYUXtdajzi2bsfobRZIRYSljZK5xoSv5PjuN0knCFcOEbTRmoitvo%2BPtgaJpDRaJImucRtvPNpbF3dMxlRKT%2F7CwXhMZHxj3we5XuL2%2Ft0bNQXyYQo1zJbiFiIheSivLdfjP6JJJZPdvg4bmfQNhCNNgb4mAaGD4F3GEv9MHOo8IHVf0Ur8kqHEQZ6nV%2BsLwpPaTwXLHgcBUc1vFAlG3rgau84qjmJGsxCtrQG6JtRq9l2x4qpGbvmc3sHxpvFqY%2B79LRYhh3ZbvV7aoP7BnkOV8Lvo4D1mE96IDBS%2BGGePF27Wip8z9SmF%2BaU2w2F%2BQ4wFiyXyLZhI4bqtozFBn%2BRHhs%2FQl1ri9PSVjmkHJS1kPtF1SFh0n%2Fs3Mujq%2FhnhOpQjDsscyhBjqwAaa5Ya9MMy5EwPjwsU9Coi7E3wiAeBZIYBqCb9SPMVslNZBa9PUTm7jUYBhrFt6ypUuvDNmZs8lRGhiicp43S1FPzFTiEOUVLKmCBVX6LQm%2BMF1YikINyCO8mS8xr%2FKls235c8hpicPkqeeYj4QN6nc94dSO9Ib5NlxgRuaOmeY4YP8YxodxB%2BBjzsHJ%2BkwBGBOujKSEw4HmDqafChPhAo9kVJsB%2FjYo8fkRP5hjtkGd&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20230409T211201Z&X-Amz-SignedHeaders=host&X-Amz-Expires=3599&X-Amz-Credential=ASIASXCYXIIFOVW5QUAB%2F20230409%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Signature=d4f8f1e3453438a3b369757f0583018158e6eb3413dc2e2e794b09378de22b27',
                'ingredients' => '0:"1 whole 4-pound chicken, quartered"1:"8 slices bacon"2:"30 cloves garlic"3:"3 lemons, peeled, rinds thinly sliced and reserved"4:"½ cup Banyuls or another fortified dessert wine"5:"1 cup veal or chicken stock"',
                'yield' => 14,
                'link' => 'http://www.edamam.com/recipe/catalan-chicken-2463f2482609d7a471dbbf3b268bd956/-',
                'time' => 0,
                'allergens' => '0:"Sugar-Conscious"1:"Keto-Friendly"2:"Paleo"3:"Dairy-Free"4:"Gluten-Free"5:"Wheat-Free"6:"Egg-Free"7:"Peanut-Free"8:"Tree-Nut-Free"9:"Soy-Free"10:"Fish-Free"11:"Shellfish-Free"12:"Crustacean-Free"13:"Celery-Free"14:"Mustard-Free"15:"Sesame-Free"16:"Lupine-Free"17:"Mollusk-Free"18:"No oil added"19:"Sulfite-Free"',
                'diets' => 'Low-Carb',
                'meal' => 'lunch/dinner',
                'dish' => 'condiments and sauces',
                'cuisine' => 'french', */
                ]
        );
    }
}
