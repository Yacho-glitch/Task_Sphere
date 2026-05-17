<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Sphere Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex">
        <div class="w-64 bg-slate-900 text-white p-6 shadow-xl">
            <h1 class="text-2xl font-bold border-b border-slate-700 pb-4">TaskSphere</h1>
            <nav class="mt-4 space-y-4">
                <a href="#" class="block py-2 px-4 bg-blue-600 rounded">Dashboard</a>
                <a href="#" class="block py-2 px-4 hover:bg-slate-800 transition">My Tasks</a>
                <a href="#" class="block py-2 px-4 hover:bg-slate-800 transition">Categories</a>
            </nav>
        </div>

        <main class="flex-1 p-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                    <p class="text-gray-500 text-sm uppercase font-bold">Total Tasks</p>
                    <h2 class="text-3xl font-black text-slate-800">{{ $totalTasks }}</h2>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500">
                    <p class="text-gray-500 text-sm uppercase font-bold">Pending</p>
                    <h2 class="text-3xl font-black text-slate-800">{{ $pendingTasks }}</h2>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                    <p class="text-gray-500 text-sm uppercase font-bold">Completed</p>
                    <h2 class="text-3xl font-black text-slate-800">{{ $completedTasks }}</h2>
                </div>
            </div>

            <div class="mb-4">
                <a 
                    href="{{ route('create') }}" 
                    class="text-black font-bold bg-amber-500 hover:bg-amber-600 rounded-lg p-2 mb-2"
                >
                Add New Task
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="px-6 py-6 font-bold text-gray-700">Task Title</th>
                            <th class="px-6 py-6 font-bold text-gray-700">Category</th>
                            <th class="px-6 py-6 font-bold text-gray-700">Status</th>
                            <th class="px-6 py-6 font-bold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-slate-700">{{ $task->title }}</td>
                                <td class="px-6 py-4">
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase">
                                        {{ $task->category->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="{{ $task->status == "completed" ? "text-green-600" : "text-yellow-600" }} font-semibold capitalize">
                                        {{ $task->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>