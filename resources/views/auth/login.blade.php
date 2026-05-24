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


        </div>
    </div>
    
@endsection