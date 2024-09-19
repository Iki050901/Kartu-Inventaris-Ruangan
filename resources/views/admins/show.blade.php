@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">DATA ADMIN</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
        <div class="bg-gray-100 px-4 py-3 border-b">
            <h2 class="text-lg font-semibold text-gray-700">Informasi Admin</h2>
        </div>
        <div class="p-4">
            <p class="text-gray-700"><span class="font-semibold">Nama:</span> {{ $admin->user->name }}</p>
            <p class="text-gray-700"><span class="font-semibold">Jabatan:</span> {{ $admin->jabatan }}</p>
            <p class="text-gray-700"><span class="font-semibold">Email:</span> {{ $admin->user->email }}</p>
            <p class="text-gray-700"><span class="font-semibold">Unit:</span> {{ $admin->unit->kantor }}</p>
            <p class="text-gray-700"><span class="font-semibold">Password:</span> ********</p>
        </div>
    </div>

    <a href="{{ route('admins.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Kembali
    </a>
    <a href="{{ route('admins.edit', $admin->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Edit
    </a>
</div>
@endsection
