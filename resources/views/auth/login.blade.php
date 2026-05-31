@extends('layouts.app')

@section('title', 'Login - TaskSphere')

@section('content')
    <div class="min-h-screen flex flex-col justify-center items-center px-6 py-12 bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md border border-gray-200">

            <h2 class="text-3xl font-bold text-center text-slate-800 mb-2">TaskSphere</h2>
            <p class="text-center text-gray-500 mb-6">Sign in to manage your workspace</p>

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm font-semibold">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.authenticate') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">Email Address</label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        class="w-full border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="you@example.com" 
                    >
                    @error('password')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </form>

        </div>
    </div>
    
@endsection