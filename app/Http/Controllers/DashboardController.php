<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller {
    public function index() {
        $tasks = Task::with('category')->get();

        $totalTasks = Task::count();
        $completedTasks = Task::where('status', 'completed')->count();
        $pendingTasks = Task::where('status', 'pending')->count();

        return view('dashboard', compact('tasks', 'totalTasks', 'completedTasks', 'pendingTasks'));
    }

    public function create() {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }
}
