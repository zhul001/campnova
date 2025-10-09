<div x-data="{ mobileMenuOpen: false }" class="fixed top-0 left-0 right-0 z-50 border-b border-gray-200 bg-white">
    <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex items-center space-x-2">
                    <img class="w-8 h-8" height="32" width="32" src="{{ asset('img/logo_campnova_blue.svg') }}"
                        alt="Logo Campnova" />
                    <span class="font-extrabold text-xl select-none">Campnova</span>
                </div>

                <nav class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/dashboard"
                        class="{{ request()->is('dashboard')
                            ? 'border-b-2 border-[#5daac7]'
                            : 'border-b-2 border-transparent text-gray-500 hover:border-slate-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 text-sm font-medium"
                        aria-current="{{ request()->is('/') ? 'page' : null }}">Dashboard</a>
                    <a href="/tryout"
                        class="{{ request()->is('tryout')
                            ? 'border-b-2 border-[#5daac7]'
                            : 'border-b-2 border-transparent text-gray-500 hover:border-slate-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 text-sm font-medium"
                        aria-current="{{ request()->is('tryout') ? 'page' : null }}">
                        Try Out
                    </a>

                    <a href="/materi"
                        class="{{ request()->is('materi')
                            ? 'border-b-2 border-[#5daac7]'
                            : 'border-b-2 border-transparent text-gray-500 hover:border-slate-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 text-sm font-medium"
                        aria-current="{{ request()->is('materi') ? 'page' : null }}">Materi</a>
                    <a href="/jadwal"
                        class="{{ request()->is('jadwal')
                            ? 'border-b-2 border-[#5daac7]'
                            : 'border-b-2 border-transparent text-gray-500 hover:border-slate-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 text-sm font-medium"
                        aria-current="{{ request()->is('jadwal') ? 'page' : null }}">Jadwal</a>
                </nav>
            </div>

            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="ml-3 relative" x-data="{ open: false }">
                    <div>
                        <button @click="open = !open" type="button"
                            class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-0 focus:ring-offset-0"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <div class="border border-gray-200 text-gray-800 text-sm font-semibold px-3 py-1 rounded-lg inline-block max-w-[13ch] overflow-hidden text-ellipsis whitespace-nowrap"
                                style="outline: none" tabindex="-1">
                                {{ auth()->user()->nama_pendek }}
                            </div>
                        </button>
                    </div>

                    <div x-show="open" @click.away="open = false" x-cloak
                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="/me" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Profile
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-full text-left px-4 py-2 text-base font-medium text-red-600 hover:text-red-800 hover:bg-gray-100">
                                <svg class="mr-3 h-5 w-5 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                    class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <div x-show="mobileMenuOpen" x-cloak class="sm:hidden flex flex-col h-screen">
        <div class="pt-2 pb-3 space-y-1 flex-grow overflow-auto">
            <a href="/dashboard"
                class="{{ request()->is('dashboard')
                    ? 'bg-[#F2FAFD] border-l-4 border-[#5daac7]'
                    : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 text-base font-medium"
                aria-current="{{ request()->is('/dashboard') ? 'page' : null }}">Dashboard</a>
            <a href="/tryout"
                class="{{ request()->is('tryout')
                    ? 'bg-[#F2FAFD] border-l-4 border-[#5daac7]'
                    : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 text-base font-medium"
                aria-current="{{ request()->is('/tryout') ? 'page' : null }}">Try Out</a>
            <a href="/materi"
                class="{{ request()->is('materi')
                    ? 'bg-[#F2FAFD] border-l-4 border-[#5daac7]'
                    : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 text-base font-medium"
                aria-current="{{ request()->is('/materi') ? 'page' : null }}">Materi</a>
            <a href="/jadwal"
                class="{{ request()->is('jadwal')
                    ? 'bg-[#F2FAFD] border-l-4 border-[#5daac7]'
                    : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 text-base font-medium"
                aria-current="{{ request()->is('/jadwal') ? 'page' : null }}">Jadwal</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200" style="height: calc(100vh - 192px)">
            <div class="flex items-center px-4 h-16">
                <div class="">
                    <div class="text-base font-medium text-gray-800 pl-0">
                        {{ auth()->user()->nama_panjang }}
                    </div>
                    <div class="text-sm font-medium text-gray-500 pl-0">
                        {{ auth()->user()->email }}
                    </div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="/me"
                    class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                    Profile
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full text-left px-4 py-2 text-base font-medium text-red-600 hover:text-red-800 hover:bg-gray-100">
                        <svg class="mr-3 h-5 w-5 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
