<?php

namespace Database\Seeders;

use App\Models\LandingSection;
use Illuminate\Database\Seeder;

class AddLandingSectionsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            [
                'key' => 'hero',
                'title' => 'Discover Antique Treasures',
                'description' => 'Explore curated antique auctions and timeless pieces from around Indonesia.',
                'image' => 'https://images.unsplash.com/photo-1523978591478-c753949ff840?w=1400&q=80&auto=format&fit=crop',
                'order' => 0,
                'published' => true,
            ],
            [
                'key' => 'destinations',
                'title' => 'Featured Collections',
                'description' => 'Popular categories and curated collections to start your search.',
                'image' => 'https://images.unsplash.com/photo-1549880338-65ddcdfd017b?w=1200&q=80&auto=format&fit=crop',
                'order' => 1,
                'published' => true,
            ],
            [
                'key' => 'about',
                'title' => 'About ArtKunoLelang',
                'description' => 'A marketplace for antique lovers. Admin can manage content from dashboard.',
                'image' => 'https://images.unsplash.com/photo-1526318472351-c75fcf070e46?w=1200&q=80&auto=format&fit=crop',
                'order' => 2,
                'published' => true,
            ],
        ];

        foreach ($defaults as $s) {
            LandingSection::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
