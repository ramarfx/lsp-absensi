<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="{{ Route::is('dashboard.index') ? 'bg-blue-700 text-white' : 'text-gray-900' }} flex items-center p-2 rounded-lg hover:bg-blue-700 hover:text-white group">
                    <span class="ms-3">
                        <i class='bx mr-2 text-xl bxs-home'></i>
                        Home
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('attendances.index') }}"
                    class="{{ Route::is('attendances.index') ? 'bg-blue-700 text-white' : 'text-gray-900' }} flex items-center p-2 rounded-lg hover:bg-blue-700 hover:text-white group">
                    <span class="flex-1 ms-3 whitespace-nowrap">
                        <i class='bx mr-2 text-xl bxs-notepad'></i>
                        Data Absensi
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('students.index') }}"
                    class="{{ Route::is('students.index') ? 'bg-blue-700 text-white' : 'text-gray-900' }} flex items-center p-2 rounded-lg hover:bg-blue-700 hover:text-white group">
                    <span class="flex-1 ms-3 whitespace-nowrap">
                        <i class='bx mr-2 text-xl bxs-user-rectangle'></i>
                        Data Siswa
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('class.index') }}"
                    class="{{ Route::is('class.index') ? 'bg-blue-700 text-white' : 'text-gray-900' }} flex items-center p-2 rounded-lg hover:bg-blue-700 hover:text-white group">
                    <span class="flex-1 ms-3 whitespace-nowrap">
                        <i class='bx mr-2 text-xl bxs-book-content'></i>
                        Data Kelas
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"
                    class="{{ Route::is('users.index') ? 'bg-blue-700 text-white' : 'text-gray-900' }} flex items-center p-2 rounded-lg hover:bg-blue-700 hover:text-white group">
                    <span class="flex-1 ms-3 whitespace-nowrap">
                        <i class='bx mr-2 text-xl bxs-user' ></i>
                        Pengguna
                    </span>
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post" class="w-full inline-block">
                    @csrf
                    <button type="submit" class="cursor-pointer flex w-full items-center justify-start p-2 text-gray-900 rounded-lg hover:bg-blue-700 hover:text-white group">
                        <span class="flex-1 ms-3 whitespace-nowrap text-start">
                            <i class='bx mr-2 text-xl bxs-log-out' ></i>
                            Keluar
                        </span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
