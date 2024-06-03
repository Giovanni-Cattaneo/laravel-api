<?php

namespace App\Models\Api;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectController extends Model
{
    use HasFactory;
    public function index()
    {
        $projects = Project::with('type', 'technologies')->orderByDesc('id')->paginate(4);
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function favourites()
    {
        $favourites = Project::with('type', 'technologies')->where('favourites', true)->orderByDesc('favourites')->paginate(100);
        return response()->json([
            'success' => true,
            'favourites' => $favourites
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json(
                [
                    'success' => true,
                    'response' => $project,
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'response' => 'Sorry there is not your project',
                ]
            );
        }
    }
}
