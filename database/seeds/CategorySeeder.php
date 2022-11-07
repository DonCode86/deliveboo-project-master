<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Italiano', 'Internazionale', 'Cinese', 'Giapponese', 'Messicano', 'Indiano', 'Pesce', 'Carne', 'Pizza'];
        
        foreach ($categories as $category)
        {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
