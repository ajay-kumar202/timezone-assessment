<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class UserNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notification';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Send notifications to users';

    public function handle()
    {
        $notifications = DB::table('user_notifications')->
            select(["user_notifications.*", "users.timezone"])
            ->leftJoin('users',"users.id", "=","user_notifications.user_id")
            ->whereIn('frequency', ['daily', 'weekly', 'monthly']) // Customize as needed
            ->get();

        foreach ($notifications as $notification) {
            // Assuming $notification is a row from the user_notifications table
            $scheduledAt = Carbon::parse($notification->scheduled_at, 'UTC') // Assume UTC is the stored timezone
            ->timezone($notifications->timezone); // $user->timezone contains the user's timezone

            $now = Carbon::now()->timezone($notifications->timezone);

            if ($scheduledAt <= $now) {
                // Send the notification
            }
        }
    }
}
