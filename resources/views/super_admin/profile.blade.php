@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="font-arial text-blue-500 mb-6 font-extrabold" style="font-size: 30px; line-height: 52px; text-align: left;">
        PENGATURAN PROFILE
    </h1>

    <div class="space-y-4 w-12/13 mx-auto p-8 bg-white shadow-lg rounded-lg">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">nama</label>
            <p class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">{{ $user->name }}"</p>
        </div>
        
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <p class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">{{ $user->email }}"</p>
        </div>
        
        <!-- Input untuk Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
            <p class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">********</p>
        </div>
        
        <div class="flex justify-end">
            <a href="{{ route('super_admin.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        </div>
    </div>
        
</div>
@endsection
