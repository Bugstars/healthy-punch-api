<?php

namespace App\Services;

use App\Models\Punch;
use App\Models\User;
use Carbon\Carbon;

class PunchService
{
    /**
     * Create a punch for the user.
     *
     * @param User $user
     * @param string $ip
     * @param string|null $note
     * @return Punch
     */
    public function createPunch(User $user, string $ip, ?string $note)
    {
        $today = Carbon::today()->toDateString();

        return Punch::firstOrCreate([
            'user_id' => $user->id,
            'date' => $today,
        ], [
            'note' => $note,
            'ip_address' => $ip,
        ]);
    }

    /**
     * Get all punches for the user.
     *
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUserPunches(User $user)
    {
        return Punch::where('user_id', $user->id)
            ->orderByDesc('date')
            ->get(['date', 'note']);
    }
}