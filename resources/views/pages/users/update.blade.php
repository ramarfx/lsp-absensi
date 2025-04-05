@extends('layout.master')

@section('header', 'Edit Pengguna')

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="post" class="w-full max-w-md">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 ">NIP</label>
            <input type="integer" id="nip" name="nip"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Input NIP" value="{{ $user->nip }}">
        </div>
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
            <input type="text" id="name" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Input nama" value="{{ $user->name }}">
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
            Edit
        </button>
    </form>
@endsection
