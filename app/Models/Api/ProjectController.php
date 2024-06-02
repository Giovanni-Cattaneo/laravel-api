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
        $projects = Project::with('type', 'technologies')->orderByDesc('favourites')->paginate(4);
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }
}
