@extends('layout.master')

@section('header', 'Data Kehadiran Hari Ini')

@section('content')
    <form method="get" class="w-full flex flex-row items-center justify-between mb-4 gap-2">
        <div class="flex flex-1 gap-2">
            <input type="text" name="search" id="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg" placeholder="Cari...">

            <select id="class" name="class" onchange="this.form.submit()"
                class="bg-gray-50 border w-36 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Pilih Kelas</option>
                @foreach ($classrooms as $class)
                    <option value="{{ $class->id }}" {{ request('class') == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('attendances.create') }}"
            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-3 py-2 text-sm me-2">
            Input Kehadiran
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
                    @php
                        $status = $attendance->student->attendanceToday->status ?? '-';
                        $statusColor = match ($status) {
                            'Hadir' => 'text-green-600 font-semibold',
                            'Izin' => 'text-blue-600 font-semibold',
                            'Sakit' => 'text-rose-500 font-semibold',
                            'Terlambat' => 'text-yellow-600 font-semibold',
                            'Alpha' => 'text-red-600 font-semibold',
                            default => 'text-gray-500',
                        };
                    @endphp
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
                        <td class="px-6 py-4 {{ $statusColor }}">
                            {{ $status }}
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
@endsection
