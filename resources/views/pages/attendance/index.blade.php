@extends('layout.master')

@section('header', 'Data Siswa')

@section('content')

    <div class="flex justify-end mb-4">
        <a href="{{ route('students.create') }}"
            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-3 py-2 text-sm me-2">
            Data Kehadiran Hari Ini
        </a>
    </div>

    <div class="relative overflow-x-auto border sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $attendance->student->nis ?? '' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->student->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->student->gender ? 'L' : 'P' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->student->classroom->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->status }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->description }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
