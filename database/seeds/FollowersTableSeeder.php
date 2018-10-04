<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = User::first();
        $user_id = $user->id;

        $followings = $users->slice(1);
        $following_ids = $followings->pluck('id')->toArray();
        $user->follow($following_ids);

        foreach ($followings as $follower) {
            $follower->follow($user_id);
        }
    }
}
