@extends('layout.master')

@section('header', 'Dashboard')

@section('content')
    <div>
        <h1 class="font-medium text-lg mb-2">Data Kehadiran Hari ini</h1>

        <div class="grid grid-cols-3 grid-rows-1 gap-4">
                <div
                    class="block max-w-sm px-6 py-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400 mb-4">Siswa Terlambat</p>
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">13</h5>
                </div>
                <div
                    class="block max-w-sm px-6 py-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400 mb-4">Kehadiran Hari Ini</p>
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">13</h5>
                </div>
                <div
                    class="block max-w-sm px-6 py-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400 mb-4">Total Siswa</p>
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">598</h5>
                </div>
        </div>

        <h1 class="font-medium text-lg mb-2">Data Kehadiran Hari ini</h1>

        

    </div>
@endsection
