<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="{{ Route::is('dashboard.index') ? 'bg-gray-100' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="ms-3">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('attendances.index') }}"
                    class="{{ Route::is('attendances.index') ? 'bg-gray-100' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Data Absensi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('students.index') }}"
                    class="{{ Route::is('students.index') ? 'bg-gray-100' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="{{ route('class.index') }}"
                    class="{{ Route::is('class.index') ? 'bg-gray-100' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Data Kelas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"
                    class="{{ Route::is('users.index') ? 'bg-gray-100' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Pengguna</span>
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post" class="w-full inline-block">
                    @csrf
                    <button type="submit" class="cursor-pointer flex w-full items-center justify-start p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <span class="flex-1 ms-3 whitespace-nowrap text-start">Keluar</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
