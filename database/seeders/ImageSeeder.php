<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            [
                [
                    'id' => 1,
                    'title' => 'saanen',
                    'url' => 'images/saanen.jpg',
                    'imageable_id' => 2,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 2,
                    'title' => 'alpine.jpg',
                    'url' => 'images/alpine.jpg',
                    'imageable_id' => 1,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 3,
                    'title' => 'massif_central.jpg',
                    'url' => 'images/massif_central.jpg',
                    'imageable_id' => 3,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 4,
                    'title' => 'rove.jpg',
                    'url' => 'images/rove.jpg',
                    'imageable_id' => 5,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 5,
                    'title' => 'croisee.jpg',
                    'url' => 'images/croisee.jpg',
                    'imageable_id' => 6,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 7,
                    'title' => 'saanen.jpg',
                    'url' => 'images/saanen.jpg',
                    'imageable_id' => 15,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 8,
                    'title' => 'saanen.jpg',
                    'url' => 'images/saanen.jpg',
                    'imageable_id' => 16,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 9,
                    'title' => 'saanen.jpg',
                    'url' => 'images/saanen.jpg',
                    'imageable_id' => 17,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 10,
                    'title' => 'croisee.jpg',
                    'url' => 'images/scroisee.jpg',
                    'imageable_id' => 18,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 11,
                    'title' => 'saanen.jpg',
                    'url' => 'images/saanen.jpg',
                    'imageable_id' => 19,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 12,
                    'title' => 'saanen.jpg',
                    'url' => 'images/saanen.jpg',
                    'imageable_id' => 20,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 13,
                    'title' => 'massif_central.jpg',
                    'url' => 'images/massif_central.jpg',
                    'imageable_id' => 21,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 14,
                    'title' => 'saanen.jpg',
                    'url' => 'images/saanen.jpg',
                    'imageable_id' => 22,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 15,
                    'title' => 'saanen.jpg',
                    'url' => 'images/saanen.jpg',
                    'imageable_id' => 23,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 16,
                    'title' => 'alpine.jpg',
                    'url' => 'images/alpine.jpg',
                    'imageable_id' => 1,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 17,
                    'title' => 'alpine.jpg',
                    'url' => 'images/alpine.jpg',
                    'imageable_id' => 24,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 18,
                    'title' => 'alpine.jpg',
                    'url' => 'images/alpine.jpg',
                    'imageable_id' => 25,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 19,
                    'title' => 'alpine.jpg',
                    'url' => 'images/alpine.jpg',
                    'imageable_id' => 26,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 20,
                    'title' => 'alpine.jpg',
                    'url' => 'images/alpine.jpg',
                    'imageable_id' => 27,
                    'imageable_type' => "App\Models\Post",
                ],
                [
                    'id' => 21,
                    'title' => 'provencale.jpg',
                    'url' => 'images/provencale.jpg',
                    'imageable_id' => 5,
                    'imageable_type' => "App\Models\Post",
                ],
            ]);
    }
}
