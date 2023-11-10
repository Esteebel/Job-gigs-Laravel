<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(6)-> create([
            'user_id' => $user->id
        ]);
        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'Company' => 'Acne Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www.acne.com',
        //     'description' => 'Lorem ipsum, dolor sit amet 
        //     consectetur adipisicing elit. Culpa eaque harum 
        //     consequatur laudantium blanditiis ad vero ex 
        //     veritatis neque quod! Accusamus repellat nihil 
        //     perferendis necessitatibus nisi! Accusantium culpa
        //     obcaecati atque!'
        // ]);

        // Listing::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend, api',
        //     'Company' => 'Stark Industries',
        //     'location' => 'New York, NY',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.starkindustries.com',
        //     'description' => 'Lorem ipsum, dolor sit amet 
        //     consectetur adipisicing elit. Culpa eaque harum 
        //     consequatur laudantium blanditiis ad vero ex 
        //     veritatis neque quod! Accusamus repellat nihil 
        //     perferendis necessitatibus nisi! Accusantium culpa
        //     obcaecati atque!'
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
