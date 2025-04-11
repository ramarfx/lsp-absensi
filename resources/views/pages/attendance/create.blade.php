@extends('layout.master')

@section('header', 'Input Kehadiran')

@section('content')
    {{-- form filter --}}
    <form method="get" class="w-fit flex flex-row items-center justify-between mb-4 gap-2">
        <div class="flex flex-1 gap-2">
            <input type="text" name="search" id="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg" placeholder="Cari...">

            <select id="class" name="class" onchange="this.form.submit()"
                class="bg-gray-50 w-44 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Pilih Kelas</option>
                @foreach ($classrooms as $class)
                    <option value="{{ $class->id }}"
                        {{ request('class') == $class->id || $loop->first ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <form action="{{ route('attendances.store') }}" method="post" class="w-full">
        @csrf
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
                    @foreach ($students as $student)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-2">
                                {{ $student->nis ?? '' }}
                            </td>
                            <td class="px-6 py-2">
                                {{ $student->name }}
                            </td>
                            <td class="px-6 py-2">
                                {{ $student->classroom->name }}
                            </td>
                            <td class="py-2 px-2">
                                <ul
                                    class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center px-3">
                                            <input id="hadir-{{ $student->id }}" type="radio" value="Hadir"
                                                name="status[{{ $student->id }}][status]"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                                {{ optional($student->attendanceToday)->status == 'Hadir' ? 'checked' : '' }}>
                                            <label for="hadir-{{ $student->id }}"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Hadir</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center px-3">
                                            <input id="terlambat-{{ $student->id }}" type="radio" value="Terlambat"
                                                name="status[{{ $student->id }}][status]"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                                {{ optional($student->attendanceToday)->status == 'Terlambat' ? 'checked' : '' }}>
                                            <label for="terlambat-{{ $student->id }}"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Terlambat</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center ps-3">
                                            <input id="sakit-{{ $student->id }}" type="radio" value="Sakit"
                                                name="status[{{ $student->id }}][status]"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                                {{ optional($student->attendanceToday)->status == 'Sakit' ? 'checked' : '' }}>
                                            <label for="sakit-{{ $student->id }}"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Sakit</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center px-3">
                                            <input id="izin-{{ $student->id }}" type="radio" value="Izin"
                                                name="status[{{ $student->id }}][status]"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                                {{ optional($student->attendanceToday)->status == 'Izin' ? 'checked' : '' }}>
                                            <label for="izin-{{ $student->id }}"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Izin</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center px-3">
                                            <input id="alpha-{{ $student->id }}" type="radio" value="Alpha"
                                                name="status[{{ $student->id }}][status]"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                                {{ optional($student->attendanceToday)->status == 'Alpha' ? 'checked' : '' }}>
                                            <label for="alpha-{{ $student->id }}"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Alpha</label>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                            <td class="px-1 py-2">
                                <input type="text" name="status[{{ $student->id }}][description]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg"
                                    placeholder="Keterangan"
                                    value="{{ optional($student->attendanceToday)->description }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-end">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                Konfirmasi Kehadiran
            </button>
        </div>

    </form>
@endsection
