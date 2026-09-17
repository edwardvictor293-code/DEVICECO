<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Bicycle;
use App\Models\CyclingRoute;
use App\Models\JournalPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(['email' => 'test@example.com'], [
            'name' => 'Test User',
            'password' => 'password',
        ]);

        User::updateOrCreate(['email' => 'admin@deviceco.example'], ['name' => 'DEVICECO Admin', 'password' => 'password', 'is_admin' => true]);

        $bicycles = [
            ['name' => 'Aero One', 'slug' => 'aero-one', 'category' => 'Road', 'tagline' => 'Speed, distilled.', 'description' => 'A race-bred silhouette refined for real roads.', 'price' => 8900, 'weight' => 7.2, 'frame_material' => 'Carbon monocoque', 'wheel_info' => '700c / 45mm carbon', 'drivetrain' => '12-speed electronic', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1532298229144-0ec0c57515c7?auto=format&fit=crop&w=1200&q=85', 'featured' => true],
            ['name' => 'Terrain X', 'slug' => 'terrain-x', 'category' => 'All road', 'tagline' => 'Beyond the pavement.', 'description' => 'Confident geometry for the roads less travelled.', 'price' => 6400, 'weight' => 8.4, 'frame_material' => 'Carbon composite', 'wheel_info' => '700c / 45mm tubeless', 'drivetrain' => '12-speed mechanical', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=1200&q=85', 'featured' => true],
            ['name' => 'Forma S', 'slug' => 'forma-s', 'category' => 'Urban', 'tagline' => 'The daily, elevated.', 'description' => 'A clean, composed city bicycle for every day.', 'price' => 3200, 'weight' => 10.8, 'frame_material' => 'Aluminium alloy', 'wheel_info' => '700c / 35mm puncture guard', 'drivetrain' => '8-speed internal', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1505705694340-019e1e335916?auto=format&fit=crop&w=1200&q=85', 'featured' => false],
            ['name' => 'Gravel R', 'slug' => 'gravel-r', 'category' => 'Gravel', 'tagline' => 'Find the unmarked road.', 'description' => 'Long-range comfort with a quicksilver response.', 'price' => 5800, 'weight' => 8.9, 'frame_material' => 'Carbon monocoque', 'wheel_info' => '700c / 50mm tubeless', 'drivetrain' => '12-speed electronic', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1529422643029-d4585747aaf2?auto=format&fit=crop&w=1200&q=85', 'featured' => false],
            ['name' => 'Vector RS', 'slug' => 'vector-rs', 'category' => 'Road', 'tagline' => 'Velocity, refined.', 'description' => 'A balanced road platform for fast club miles, long climbs, and confident descents.', 'price' => 7600, 'weight' => 7.6, 'frame_material' => 'High-modulus carbon', 'wheel_info' => '700c / 40mm carbon', 'drivetrain' => '12-speed electronic', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1502744688674-c619d1586c9e?auto=format&fit=crop&w=1200&q=85', 'featured' => true],
            ['name' => 'Apex 7', 'slug' => 'apex-7', 'category' => 'Road', 'tagline' => 'Climb with intent.', 'description' => 'Lightweight geometry and a calm front end for elevation that keeps asking questions.', 'price' => 7100, 'weight' => 7.1, 'frame_material' => 'Carbon monocoque', 'wheel_info' => '700c / 35mm alloy', 'drivetrain' => '12-speed mechanical', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1485965120184-e220f721d03e?auto=format&fit=crop&w=1200&q=85', 'featured' => false],
            ['name' => 'Nomad 45', 'slug' => 'nomad-45', 'category' => 'Gravel', 'tagline' => 'Distance without edges.', 'description' => 'Stable at speed and generous over rough ground, built for the route beyond the route.', 'price' => 6200, 'weight' => 9.1, 'frame_material' => 'Carbon adventure frame', 'wheel_info' => '700c / 45mm tubeless', 'drivetrain' => '12-speed mechanical', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1511994298241-608e28f14fde?auto=format&fit=crop&w=1200&q=85', 'featured' => true],
            ['name' => 'Dustline', 'slug' => 'dustline', 'category' => 'Gravel', 'tagline' => 'Take the longer way.', 'description' => 'A responsive all-road companion with room for gear, weather, and the unplanned turn.', 'price' => 4800, 'weight' => 9.7, 'frame_material' => 'Aluminium alloy', 'wheel_info' => '700c / 50mm tubeless', 'drivetrain' => '11-speed mechanical', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1529422643029-d4585747aaf2?auto=format&fit=crop&w=1200&q=85', 'featured' => false],
            ['name' => 'Ridge 29', 'slug' => 'ridge-29', 'category' => 'Mountain', 'tagline' => 'Hold the descent.', 'description' => 'Trail-ready control with progressive suspension and a chassis that stays composed when the line gets technical.', 'price' => 6800, 'weight' => 12.4, 'frame_material' => 'Carbon trail frame', 'wheel_info' => '29in / 2.4in tubeless', 'drivetrain' => '12-speed electronic', 'brakes' => '4-piston hydraulic', 'image_url' => 'https://images.unsplash.com/photo-1544191696-102dbdaeeaa0?auto=format&fit=crop&w=1200&q=85', 'featured' => true],
            ['name' => 'Signal Trail', 'slug' => 'signal-trail', 'category' => 'Mountain', 'tagline' => 'Find your line.', 'description' => 'A direct, playful hardtail for technical climbs, local loops, and days that refuse to stay planned.', 'price' => 3900, 'weight' => 11.8, 'frame_material' => 'Aluminium trail frame', 'wheel_info' => '29in / 2.35in tubeless', 'drivetrain' => '12-speed mechanical', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1576435728678-68d0fbf94e91?auto=format&fit=crop&w=1200&q=85', 'featured' => false],
            ['name' => 'Metro E1', 'slug' => 'metro-e1', 'category' => 'Electric', 'tagline' => 'The city, extended.', 'description' => 'Quiet electric assistance and a clean integrated silhouette for a faster, calmer daily ride.', 'price' => 4600, 'weight' => 18.2, 'frame_material' => 'Hydroformed aluminium', 'wheel_info' => '700c / 45mm puncture guard', 'drivetrain' => '250W mid-drive', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1571068316344-75bc76f77890?auto=format&fit=crop&w=1200&q=85', 'featured' => true],
            ['name' => 'Current E2', 'slug' => 'current-e2', 'category' => 'Electric', 'tagline' => 'More ground, less effort.', 'description' => 'A long-range electric platform for commutes, errands, and the ride home after the long way around.', 'price' => 5200, 'weight' => 20.4, 'frame_material' => 'Aluminium utility frame', 'wheel_info' => '700c / 50mm commuter', 'drivetrain' => '500W mid-drive', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1593764592116-bfb2a97c642a?auto=format&fit=crop&w=1200&q=85', 'featured' => false],
            ['name' => 'Arc 8', 'slug' => 'arc-8', 'category' => 'Urban', 'tagline' => 'Everyday, considered.', 'description' => 'A composed city bicycle with practical range, clean lines, and the confidence to make the daily ride feel deliberate.', 'price' => 2800, 'weight' => 11.2, 'frame_material' => 'Aluminium alloy', 'wheel_info' => '700c / 38mm puncture guard', 'drivetrain' => '8-speed internal', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1485965120184-e220f721d03e?auto=format&fit=crop&w=1200&q=85', 'featured' => false],
            ['name' => 'Forma C', 'slug' => 'forma-c', 'category' => 'Urban', 'tagline' => 'Carry the day.', 'description' => 'A refined utility frame with stable handling, integrated lighting, and space for the things that matter.', 'price' => 3500, 'weight' => 13.4, 'frame_material' => 'Recycled aluminium', 'wheel_info' => '700c / 42mm puncture guard', 'drivetrain' => '9-speed internal', 'brakes' => 'Hydraulic disc', 'image_url' => 'https://images.unsplash.com/photo-1505705694340-019e1e335916?auto=format&fit=crop&w=1200&q=85', 'featured' => false],
        ];

        foreach ($bicycles as $bicycle) {
            Bicycle::updateOrCreate(['slug' => $bicycle['slug']], $bicycle);
        }

        CyclingRoute::updateOrCreate(['slug' => 'the-fern-line'], ['name' => 'The Fern Line', 'location' => 'North Cascades', 'difficulty' => 'Intermediate', 'distance' => 64.5, 'elevation' => 1120, 'duration_minutes' => 210, 'description' => 'A quiet ribbon of asphalt through old growth and open mountain air.', 'image_url' => 'https://images.unsplash.com/photo-1473445361085-b9a07f55608b?auto=format&fit=crop&w=1400&q=85']);
        CyclingRoute::updateOrCreate(['slug' => 'coastal-divide'], ['name' => 'Coastal Divide', 'location' => 'Big Sur', 'difficulty' => 'Advanced', 'distance' => 91.2, 'elevation' => 1840, 'duration_minutes' => 330, 'description' => 'Long climbs, salt air, and a horizon that keeps opening.', 'image_url' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=85']);
        JournalPost::updateOrCreate(['slug' => 'the-case-for-less'], ['title' => 'The case for less', 'category' => 'Design', 'excerpt' => 'Why restraint makes a bicycle feel faster, longer.', 'body' => 'The best machines leave room for the person using them. At DEVICECO, every decision begins with that principle: remove what does not improve the ride.', 'author' => 'Mara Chen', 'image_url' => 'https://images.unsplash.com/photo-1511994298241-608e28f14fde?auto=format&fit=crop&w=1400&q=85', 'published_at' => now()]);
        JournalPost::updateOrCreate(['slug' => 'finding-your-long-way'], ['title' => 'Finding your long way', 'category' => 'Adventure', 'excerpt' => 'A field guide to choosing the road beyond the map.', 'body' => 'A good route asks a little of you and gives something back. Start with a direction, a weather window, and enough time to follow the interesting turn.', 'author' => 'Jon Bell', 'image_url' => 'https://images.unsplash.com/photo-1529422643029-d4585747aaf2?auto=format&fit=crop&w=1400&q=85', 'published_at' => now()->subDay()]);
    }
}
