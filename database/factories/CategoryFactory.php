<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{

    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
