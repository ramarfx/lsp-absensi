@extends('layout.master')

@section('header', 'Data Pengguna')

@section('content')

    <div class="flex justify-end mb-4">
        <a href="{{ route('users.create') }}"
            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-3 py-2 text-sm me-2">
            Tambah Pengguna
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
                        NIP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->nip }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('users.edit', $user->id) }}" type="button"
                                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg px-3 py-2 text-sm me-2">
                                <i class="bx bxs-edit"></i>
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="inline-block">
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
