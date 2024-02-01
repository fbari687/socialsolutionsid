<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packageData = [
            [
                'name' => 'Starter',
                'slug' => 'starter',
                'description1' => '10 Tiktok Video ',
                'description2' => ' 10 Instagram Reels ',
                'description3' => ' 2 Instagram Feeds ',
                'description4' => '2x Video Session',
                'price' => '5000000',
                'duration' => '1 month'

            ],
            [
                'name' => 'Enhance',
                'slug' => 'enhance',
                'description1' => '12 Tiktok Video ',
                'description2' => ' 12 Instagram Reels ',
                'description3' => ' 4 Instagram Feeds ',
                'description4' => '2x Video Session',
                'description5' => '1x Photoshoot',
                'price' => '6500000',
                'duration' => '1 month'


            ],
            [
                'name' => 'Complete',
                'slug' => 'complete',
                'description1' => '12 Tiktok Video ',
                'description2' => ' 12 Instagram Reels ',
                'description3' => ' 10 Instagram Feeds ',
                'description4' => '3x Video Session',
                'description5' => '2x Photoshoot',
                'price' => '8000000',
                'duration' => '1 month'
            ],
            [
                'name' => 'Ultimate',
                'slug' => 'ultimate',

                'description1' => '12 Tiktok Video ',
                'description2' => ' 12 Instagram Reels ',
                'description3' => ' 15 Instagram Feeds ',
                'description4' => '4x Video Session',
                'description5' => '4x Photoshoot',
                'price' => '10000000',
                'duration' => '1 month'
            ],
        ];

        foreach ($packageData as $data) {
            Package::create($data);
        }
    }
}
