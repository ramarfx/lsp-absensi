@extends('layout.master')

@section('header', 'Tambah Kelas')

@section('content')
    <form action="{{ route('class.store') }}" method="post" class="w-full max-w-md">
        @csrf

        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Kelas</label>
            <input type="text" id="name" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Input nama">
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
            Tambah
        </button>
    </form>
@endsection
