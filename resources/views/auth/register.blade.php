@extends('layouts.app')

@section('title', 'Create Your Account - TaskSphere')

@section('content')
    <div class="min-h-screen flex flex-col justify-center items-center px-6 py-12 bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md border border-gray-200">

            <h2 class="text-3xl font-bold text-center text-slate-800 mb-2">TaskSphere</h2>
            <p class="text-center text-gray-500 mb-6">Create a free account to manage your tasks securely</p>

            <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Name Input --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">Full Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}"
                        class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"
                        placeholder="John Doe"    
                    >
                    @error('name')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email Input --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">Email Address</label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        class="w-full border @error('email') @enderror"
                        placeholder="you@example.com"
                    >
                </div>

                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-lg transition duration-200 shadow-sm">
                    Register Account
                </button>
            </form>

            <p class="text-sm text">
                Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">Log in</a>
            </p>
        </div>
    </div>

@endsection