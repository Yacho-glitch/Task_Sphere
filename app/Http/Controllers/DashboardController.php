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
        return view('create', compact('categories'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|min:5',
            'description' => 'required|string',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id'   
        ]);

        Task::create($data);

        return redirect('/dashboard')->with('success', 'Task created successfully');
    }

    public function edit(Task $task) {
        $categories = Category::all();
        
        return view('edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task) {
        $request->validate([
            'title' => 'required|string|min:5',
            'description' => 'required|string',
            'status' => 'required',
            'category_id' => 'required|exists:categories, id'
        ]);

        $task->update($request->all());

        return redirect()->route('dashboard');
    }

    public function destroy(Task $task) {
        // $taskElement = Task::findOrFail($task);
        $task->delete();

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully');
    }
}
