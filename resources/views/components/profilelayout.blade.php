<x-layout>
    <div class="mt-10 mx-auto max-w-7xl rounded-md px-4 py-3 sm:px-6 md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <div class="flex items-center">
                <div>
                    <h2 class="text-md ml-3 font-semibold leading-7 text-neutral-700">
                        Halo,
                    </h2>
                    <h1 class="ml-3 text-2xl font-bold leading-7 text-neutral-900">
                        {{ auth()->user()->nama_panjang }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="mt-6 flex space-x-3 md:ml-4 md:mt-0">
            <span class="rounded-md shadow-sm">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="focus:ring-blue inline-flex items-center rounded-md border border-neutral-300 bg-white px-4 py-2 text-sm font-medium leading-5  text-red-600 hover:text-red-800 hover:bg-gray-100">
                        <svg class="-ml-1 mr-2 h-5 w-5  text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Keluar
                    </button>
                </form>
            </span>
        </div>
    </div>
    <div>
        <main class="mx-auto max-w-7xl px-4 py-4 pb-10 sm:px-6 lg:px-8 lg:py-8">
            <div class="mb-6">
                <nav class="hidden border-b border-neutral-200 md:block">
                    <div class="-mb-px flex space-x-8">
                        <a href="/me"
                            class="{{ request()->is('me') ? 'border-b-2 border-neutral-900 text-neutral-900' : 'border-b-2 border-transparent text-neutral-500 hover:border-neutral-300 hover:text-neutral-700' }} transition-colors inline-flex items-center gap-2 px-1 py-4 text-sm font-medium"
                            aria-current="{{ request()->is('me') ? 'page' : null }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>Profil</a>
                        <a href="{{ route('profile.edit') }}"
                            class="{{ request()->is('me/edit') ? 'border-b-2 border-neutral-900 text-neutral-900' : 'border-b-2 border-transparent text-neutral-500 hover:border-neutral-300 hover:text-neutral-700' }} inline-flex items-center gap-2 px-1 py-4 text-sm font-medium transition-colors"
                            aria-current="{{ request()->is('me/edit') ? 'page' : null }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>Edit Profile</a>
                        <a href="{{ route('profile.major') }}"
                            class="{{ request()->is('me/edit/major') ? 'border-b-2 border-neutral-900 text-neutral-900' : 'border-b-2 border-transparent text-neutral-500 hover:border-neutral-300 hover:text-neutral-700' }} inline-flex items-center gap-2 px-1 py-4 text-sm font-medium transition-colors"
                            aria-current="{{ request()->is('me/edit/major') ? 'page' : null }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5">
                                </path>
                            </svg>Pilihan Jurusan</a>
                    </div>
                </nav>
                <nav class="md:hidden">
                    <div class="grid grid-cols-3 gap-1 rounded-lg border border-neutral-200 bg-white p-1">
                        <a class="{{ request()->routeIs('profile.show') ? 'bg-neutral-100 text-neutral-900' : 'text-neutral-500 hover:bg-neutral-50 hover:text-neutral-700' }} flex flex-col items-center gap-1 rounded-md px-2 py-2 text-xs font-medium transition-colors"
                            href="{{ route('profile.show') }}"
                            aria-current="{{ request()->is('profile') ? 'page' : false }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Profil
                        </a>
                        <a class="{{ request()->routeIs('profile.edit') ? 'bg-neutral-100 text-neutral-900' : 'text-neutral-500 hover:bg-neutral-50 hover:text-neutral-700' }} flex flex-col items-center gap-1 rounded-md px-2 py-2 text-xs font-medium transition-colors"
                            href="{{ route('profile.edit') }}"
                            aria-current="{{ request()->is('editprofile') ? 'page' : false }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Edit Profil
                        </a>
                        <a class="{{ request()->routeIs('profile.major') ? 'bg-neutral-100 text-neutral-900' : 'text-neutral-500 hover:bg-neutral-50 hover:text-neutral-700' }} flex flex-col items-center gap-1 rounded-md px-2 py-2 text-xs font-medium transition-colors"
                            href="{{ route('profile.major') }}"
                            aria-current="{{ request()->is('major') ? 'page' : false }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>
                            major
                        </a>
                    </div>
                </nav>
            </div>
            {{ $slot }}
        </main>
    </div>
    </div>
</x-layout>
