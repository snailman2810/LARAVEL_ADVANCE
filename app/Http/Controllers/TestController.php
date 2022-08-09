<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TestController extends Controller
{
    public function show() {
        $user = auth()->user();
        $team = Team::find($user->currentTeam->id);
        if (!$user->hasTeamPermission($team, 'read') || $user->currentTeam->id != $team->id) {
            abort(401, 'You cannot delete');
        }

        return "Bạn đang ở trang show";
    }
    
    public function edit() {
        $user = auth()->user();
        $team = Team::find($user->currentTeam->id); 
        if (!$user->hasTeamPermission($team, 'update') || $user->currentTeam->id != $team->id) {
            abort(401, 'You cannot delete');
        }

        return "Bạn đang ở trang edit";
    }

    public function delete() {
        $user = auth()->user();
        $team = Team::find($user->currentTeam->id);
        if (!$user->hasTeamPermission($team, 'delete') || $user->currentTeam->id != $team->id) {
            abort(401, 'You cannot delete');
        }

        return "Bạn đang ở trang delete";
    }

    public function create() {
        $user = auth()->user();
        $team = Team::find($user->currentTeam->id);
        if (!$user->hasTeamPermission($team, 'create') || $user->currentTeam->id != $team->id) {
            abort(401, 'You cannot delete');
        }

        return "Bạn đang ở trang create";
    }
}
