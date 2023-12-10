<?php

namespace Database\Seeders;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['image' => 'images/reviews/review1.jpg', 'active' => 1]
        ];

        foreach ($data as $item) {
            Review::create($item);
        }
    }
}
