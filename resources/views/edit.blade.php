<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Update Task</title>
</head>

<body>
    <div class="mt-12">
        <h2 class="text-center font-bold bg-blue-300 rounded-lg p-2 mb-2">Create new task</h2>
        <a class="text-center font-bold w-2 rounded-lg p-2 bg-amber-600" href="{{ route('dashboard') }}">return to dashboard</a>
        <form
            action="{{ route('tasks.update', $task->id) }}"
            method="POST" 
            class="max-w-md mx-auto"
        >
            @csrf
            @method('PUT')
            <input 
                type="hidden" 
                value="{{ $task->id }}"
            />
            <div class="relative z-0 w-full mb-5 group">
                <input 
                    type="text" 
                    name="title" 
                    id="title"
                    value="{{ $task->title }}"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" " 
                    required 
                />
                @error('title')
                    <p class="text-red-500 font-bold mb-2">{{ $message }}</p>
                @enderror
                <label 
                    for="title"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-left peer-focus:inset-s-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                    title  
                </label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <textarea 
                    type="text" 
                    name="description" 
                    id="description"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" " 
                    required 
                >{{ $task->description }}
                </textarea>
                @error('description')
                    <p class="text-red-500 font-bold mb-2">{{ $message }}</p>
                @enderror
                <label 
                    for="description"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-left peer-focus:inset-s-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                    description
                </label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <label class="block text-gray-700 font-bold mb-2">
                    Category
                </label>
                <select 
                    name="category_id" 
                    class="w-full border rounded-lg p-2"
                >
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 font-bold mb-2">{{ $message }}</p>
                @enderror    
            </div>


            {{-- <div class="relative z-0 w-full mb-5 group">
                <label class="block text-gray-700 font-bold mb-2">
                    Status
                </label>
                <select 
                    name="status" 
                    class="w-full border rounded-lg p-2"
                >
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
                @error('status')
                    <p class="text-red-500 font-bold mb-2">{{ $message }}</p>
                @enderror    
            </div> --}}

            <button 
                type="submit"
                class="text-black bg-amber-600 rounded-lg border border-transparent hover:bg-amber-500 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                Submit
            </button>
        </form>

        


    </div>
</body>

</html>