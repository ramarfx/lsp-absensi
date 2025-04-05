@extends('layout.guest')

@section('content')
    <div class="container">
        <div class="flex flex-col-reverse md:flex-row items-center justify-center h-screen">
            <div class="w-full md:w-1/2">
                <h1 class="text-2xl font-bold">Kehadiran Tercatat, <br>
                    Proses Belajar Terpantau
                </h1>
                <p>Masuk untuk memantau kehadiran dengan praktis</p>

                <form action="{{ route('login.store') }}" method="post" class="mt-5 w-full max-w-md">
                    @csrf
                    @if (session()->has('error'))
                        <div class="flex items-center px-4 py-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Error!</span> {{ session('error') }}
                            </div>
                        </div>
                    @endif
                    <div class="mb-4">
                        <input type="text" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Username">
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Password">
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        Login Sekarang
                    </button>
                </form>
            </div>

            <div class="w-full md:w-1/2">
                <img src="{{ asset('img/illust/students.png') }}" alt="illustration">
            </div>
        </div>
    </div>
@endsection
