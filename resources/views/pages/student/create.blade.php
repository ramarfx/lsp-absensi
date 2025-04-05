@extends('layout.master')

@section('header', 'Tambah siswa')

@section('content')
    <form action="{{ route('students.store') }}" method="post" class="w-full max-w-md">
        @csrf

        <div class="mb-5">
            <label for="nis" class="block mb-2 text-sm font-medium text-gray-900">NIS</label>
            <input type="number" id="nis" name="nis"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Input NIS">
        </div>
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama siswa</label>
            <input type="text" id="name" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Input nama">
        </div>
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
            <div class="flex items-center mb-4">
                <input checked id="default-radio-1" type="radio" value="1" name="gender"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
            </div>
            <div class="flex items-center">
                <input id="default-radio-2" type="radio" value="0" name="gender"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
            </div>
        </div>
        <div class="mb-5">
            <label for="class" class="block mb-2 text-sm font-medium text-gray-900">Kelas</label>
            <select id="class" name="classroom_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih Kelas</option>
                @foreach ($classroom as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
              </select>
        </div>


        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
            Tambah
        </button>
    </form>
@endsection
