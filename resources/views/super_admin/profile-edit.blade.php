@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="font-arial text-blue-500 mb-6 font-extrabold" style="font-size: 30px; line-height: 52px; text-align: left;">
        PENGATURAN PROFILE
    </h1>

    <form action="{{ route('super_admin.update', $user->id) }}" method="POST" class="space-y-4 w-12/13 mx-auto p-8 bg-white shadow-lg rounded-lg">
        @csrf
        @method('PATCH')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" value="{{ $user->name }}" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" value="{{ $user->email }}" required>
        </div>

        <!-- Input untuk Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
            <input type="password" name="password" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
        </div>

        <!-- Input untuk Konfirmasi Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
        </div>
        
        <div class="flex justify-end space-x-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Perbarui</button>
            <a href="{{ route('super_admin.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
        </div>
    </form>
    
</div>
@endsection
