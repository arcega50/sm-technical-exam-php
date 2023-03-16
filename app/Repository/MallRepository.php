<?php

namespace App\Repository;

use App\Models\Group;
use App\Models\GroupMall;
use App\Models\Mall;
use Http;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use DB;

class MallRepository
{
    public function getActiveMalls(): Collection
    {
        return Mall::where('is_active', true)->get();
    }

    public function activateMall(int $mallId): void
    {
        $mall = Mall::find($mallId);
        $mall->is_active = true;
        $mall->save();

        Log::info("Mall [{$mall->name}] activated at " . now()->toDateTimeString());
    }

    public function deactivateMall(int $mallId): void
    {
        $mall = Mall::find($mallId);
        $mall->is_active = false;
        $mall->save();

        Log::info("Mall [{$mall->name}] deactivated at " . now()->toDateTimeString());
    }

    public function addMallToGroup(Group $group, Mall $mall): void
    {
        $groupMall = new GroupMall();
        $groupMall->group_id = $group->id;
        $groupMall->mall_id = $mall->id;
        $groupMall->save();

        Log::info("Mall [{$mall->name}] added to group {$group->name} at " . now()->toDateTimeString());
    }

    public function addMallsToGroup(Group $group, Collection $malls): void
    {
        foreach ($malls as $mall) {
            $groupMall = new GroupMall();
            $groupMall->group_id = $group->id;
            $groupMall->mall_id = $mall->id;
            $groupMall->save();
        }

        $mallNames = $malls->pluck("name")->implode(", ");
        Log::info("Malls [{$mallNames}] added to group {$group->name} at " . now()->toDateTimeString());
    }

    public function syncMallsFromAPI()
    {
        $token = "123456XYZR2";
        $response = Http::withToken($token)->get("https://api.smsupermalls.com/malls");

        $mallsResponse = $response->collect();
        foreach ($mallsResponse as $mall) {
            Mall::create($mall);
        }
    }
}
