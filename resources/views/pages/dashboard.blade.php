@extends('layout.master')

@section('header', 'Dashboard')

@section('content')
    <div>
        <h1 class="font-medium text-lg mb-2">Data Kehadiran Hari ini</h1>

        <div class="grid grid-cols-3 grid-rows-1 gap-4">
                <div
                    class="block max-w-sm px-6 py-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400 mb-4">Siswa Terlambat</p>
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $lateStudents }}</h5>
                </div>
                <div
                    class="block max-w-sm px-6 py-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400 mb-4">Kehadiran Hari Ini</p>
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $presentStudents }}</h5>
                </div>
                <div
                    class="block max-w-sm px-6 py-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400 mb-4">Total Siswa</p>
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $totalStudents }}</h5>
                </div>
        </div>

        <h1 class="font-medium text-lg mt-4 mb-2">Data Kehadiran Hari ini</h1>

        <form method="get" class="w-full flex flex-row items-center justify-between mb-4 gap-2">
            <div class="flex flex-1 gap-2">
                <input type="text" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg" placeholder="Cari...">

                <select id="class" name="class" onchange="this.form.submit()"
                    class="bg-gray-50 border w-36 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Pilih Kelas</option>
                    @foreach ($classrooms as $class)
                        <option value="{{ $class->id }}"
                            {{ request('class') == $class->id ? 'selected' : '' }}>
                            {{ $class->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <a href="{{ route('attendances.create') }}"
                class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-3 py-2 text-sm me-2">
                Input Kehadiran Hari Ini
            </a>
        </form>

        <div class="relative overflow-x-auto border sm:rounded-lg">
            <table id="table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                                {{ $attendance->student->attendanceToday->status     }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $attendance->student->attendanceToday->description ?? '-' }}
                            </td>
                        </tr>
                    @endforeach

                    @if ($attendances->isEmpty())
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center">Tidak ada data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-2">
            {{ $attendances->links() }}
        </div>


    </div>
@endsection
