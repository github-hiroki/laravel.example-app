<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // ディレクトリがなければ作成する
        if (!Storage::exists('public/images')) {
            Storage::makeDirectory('public/images');
        }

        // サンプルでは動作しなかったためmmo/faker-imagesを使用するように変更
        //return [
        //    'name' => $this->faker->image(storage_path('app/public/images'), 640, 480, null, false)
        //];
        $this->faker->addProvider(new \Mmo\Faker\PicsumProvider($this->faker));
        return [
            'name' => $this->faker->picsum(storage_path('app/public/images'), 640, 480, false)
        ];
    }
}
