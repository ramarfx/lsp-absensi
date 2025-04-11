@extends('layout.guest')

@section('content')
<div class="container">
    <div class="py-5 flex justify-between items-center">
        <h1 class="text-3xl font-bold flex items-center gap-2 text-gray-800">
            <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 17v-6h13M3 17V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v10M7 21h10"></path>
            </svg>
            Absensin
        </h1>

        <a href="{{ route('login') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 transition-all">Masuk</a>
    </div>

    <form method="get" class="flex flex-col md:flex-row items-stretch gap-3 mb-6">
        <input type="text" name="search" id="search"
            class="flex-1 p-2.5 rounded-lg border border-gray-300 text-gray-900 shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
            placeholder="Cari nama atau NIS..." value="{{ request('search') }}">

        <select id="class" name="class" onchange="this.form.submit()"
            class="w-full md:w-44 p-2.5 rounded-lg border border-gray-300 text-gray-900 shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
            <option value="">Pilih Kelas</option>
            @foreach ($classrooms as $class)
                <option value="{{ $class->id }}" {{ request('class') == $class->id ? 'selected' : '' }}>
                    {{ $class->name }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
        <table id="table" class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs text-white uppercase bg-blue-700">
                <tr>
                    <th class="px-6 py-3">No.</th>
                    <th class="px-6 py-3">NIS</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Gender</th>
                    <th class="px-6 py-3">Kelas</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $attendance)
                    @php
                        $status = $attendance->student->attendanceToday->status ?? '-';
                        $statusColor = match($status) {
                            'Hadir' => 'text-green-600 font-semibold',
                            'Izin' => 'text-blue-600 font-semibold',
                            'Sakit' => 'text-rose-500 font-semibold',
                            'Terlambat' => 'text-yellow-600 font-semibold',
                            'Alpha' => 'text-red-600 font-semibold',
                            default => 'text-gray-500',
                        };
                    @endphp
                    <tr
                        class="bg-white border-b hover:bg-blue-50 transition dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-3">{{ $loop->iteration }}</td>
                        <td class="px-6 py-3">{{ $attendance->student->nis ?? '' }}</td>
                        <td class="px-6 py-3">{{ $attendance->student->name }}</td>
                        <td class="px-6 py-3">{{ $attendance->student->gender ? 'L' : 'P' }}</td>
                        <td class="px-6 py-3">{{ $attendance->student->classroom->name }}</td>
                        <td class="px-6 py-3 {{ $statusColor }}">{{ $status }}</td>
                        <td class="px-6 py-3">{{ $attendance->student->attendanceToday->description ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-2">
        {{ $attendances->appends(request()->query())->links() }}
    </div>
</div>
@endsection
