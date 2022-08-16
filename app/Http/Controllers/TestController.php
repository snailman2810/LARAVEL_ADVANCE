<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Auth;
class TestController extends Controller
{
    public function show() {
        $user = auth()->user();
        $team = Team::find($user->currentTeam->id);
        if (!$user->hasTeamPermission($team, 'read') || $user->currentTeam->id != $team->id) {
            abort(401, 'Bạn không thể vào trang show');
        }

        return "Bạn đang ở trang show";
    }

    public function update() {
        $user = auth()->user();
        $team = Team::find($user->currentTeam->id);
        if (!$user->hasTeamPermission($team, 'update') || $user->currentTeam->id != $team->id) {
            abort(401, 'Bạn không thể vào trang update');
        }

        return "Bạn đang ở trang edit";
    }

    public function delete() {
        $user = auth()->user();
        $team = Team::find($user->currentTeam->id);
        if (!$user->hasTeamPermission($team, 'delete') || $user->currentTeam->id != $team->id) {
            abort(401, 'Bạn không thể vào trang delete');
        }

        return "Bạn đang ở trang delete";
    }

    public function create() {
        $user = auth()->user();
        $team = Team::find($user->currentTeam->id);
        if (!$user->hasTeamPermission($team, 'create') || $user->currentTeam->id != $team->id) {
            abort(401, 'Bạn không thể vào trang create');
        }

        return "Bạn đang ở trang create";
    }
}
