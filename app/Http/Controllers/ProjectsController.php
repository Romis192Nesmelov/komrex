<?php

namespace App\Http\Controllers;

use App\Http\Resources\Projects\ProjectResourse;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectsController extends Controller
{
    public function __invoke(Project $project) : JsonResponse
    {
        return response()->json(ProjectResourse::make($project->geById())->resolve(), 200);
    }
}
