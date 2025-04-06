@extends('layout.master')

@section('header', 'Data Siswa')

@section('content')

    <form method="get" class="w-full flex flex-row items-center justify-between mb-4 gap-2">
        <div class="flex flex-1 gap-2">
            <input type="text" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg" placeholder="Cari...">

            <select id="class" name="class" onchange="this.form.submit()"
                class="bg-gray-50 border w-36 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Pilih Kelas</option>
                @foreach ($classrooms as $class)
                    <option value="{{ $class->id }}"
                        {{ request('class') == $class->id || $loop->first ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('students.create') }}"
            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-3 py-2 text-sm me-2">
            Tambah Siswa
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
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-2">
                            {{ $student->nis }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $student->name }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $student->classroom->name }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $student->gender ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                        <td class="px-6 py-2">
                            <a href="{{ route('students.edit', $student) }}" type="button"
                                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg px-3 py-2 text-sm me-2">
                                <i class="bx bxs-edit"></i>
                            </a>
                            <form action="{{ route('students.destroy', $student) }}" method="post" class="inline-block">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="focus:outline-none cursor-pointer text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg px-3 py-2 text-sm">
                                    <i class="bx bxs-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
