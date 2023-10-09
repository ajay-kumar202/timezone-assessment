<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (User::all() as $user) {
            foreach (range(1, 20) as $index) {
                $scheduledAt = $faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d H:i:s'); // Format as string
                $frequency = $faker->randomElement(['daily', 'weekly', 'monthly', 'custom']);
                $app_name = env("APP_NAME");
                \DB::table('user_notifications')->insert([
                    'user_id' => $user->id,
                    'scheduled_at' => $scheduledAt,
                    'frequency' => $frequency,
                    "notification_message" => "Hello {$user->name},
This is a notification for you. Your email address is: {{ icormier@yahoo.com }}.
You have a scheduled event at {$scheduledAt} in your local timezone.
Thank you for using our notification system.
Best regards,
{$app_name}",
                    'created_at' => now()
                ]);
            }
        }
    }
}
