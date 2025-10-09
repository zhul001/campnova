<x-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="py-3 border-b border-gray-200">
            <div class="flex items-start justify-between">
                <!-- Bagian Kiri: Judul -->
                <div class="flex items-center gap-4">
                    <div>
                        <h3 class="text-lg font-semibold leading-6 text-gray-900 sm:text-xl">
                            Try Out Tersedia
                        </h3>
                        <p class="mt-2 max-w-4xl text-sm text-gray-500">
                            Ayo coba Try Out sekarang juga
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <ul class="my-3 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($tryouts as $index => $tryout)
                    @if ($hasPilihanJurusan && $tryout->is_active)
                        <a href="/tryout/{{ $tryout->id }}" class="block">
                        @else
                            <div class="block {{ !$tryout->is_active ? 'cursor-not-allowed opacity-80' : '' }}"
                                onclick="{{ !$tryout->is_active ? 'showLockedAlert()' : (!$hasPilihanJurusan ? 'showAlert()' : '') }}">
                    @endif

                    <li
                        class="hover:bg-gray-50 transition-colors duration-200 {{ !$tryout->is_active ? 'cursor-not-allowed' : '' }}">
                        <div class="h-full">
                            <div class="relative h-full overflow-hidden rounded-lg border border-gray-300 bg-white">
                                @if (!$tryout->is_active)
                                    <!-- Icon gembok di pojok kanan atas -->
                                    <div class="absolute top-2 right-2 z-10">
                                        <div class="rounded-full p-2">
                                            <i class="fas fa-lock text-gray-500 text-sm"></i>
                                        </div>
                                    </div>
                                @endif
                                <div class="cardClickable relative flex min-w-0 flex-col break-words h-full">
                                    <div class="flex-auto">
                                        <div class="flex h-full">
                                            <div class="min-w-16 border-r text-center border-gray-300 sm:min-w-20">
                                                <div class="bg-[#b9e4f4] py-1 font-bold">SNBT</div>
                                                <div
                                                    class="px-3 py-1 text-4xl font-semibold sm:px-5 md:text-5xl lg:text-6xl">
                                                    <span class="text-gray-700">{{ $index + 1 }}</span>
                                                </div>
                                            </div>
                                            <div class="col px-3 pb-4 pt-1 flex-1">
                                                <span
                                                    class="text-sm font-semibold tracking-wider text-gray-500">Gratis</span>
                                                <h1
                                                    class="text-[15px] font-semibold sm:text-[16px] md:text-[15px] lg:text-[16px] xl:text-[18px] line-clamp-2 leading-tight">
                                                    {{ $tryout->judul_paket }}
                                                </h1>
                                                <div class="flex flex-wrap items-center gap-2 py-1">
                                                    <span
                                                        class="inline-flex items-center rounded-md px-2 py-1 text-sm font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            aria-hidden="true" class="mr-1 h-5 w-5 text-gray-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z">
                                                            </path>
                                                        </svg>
                                                        @if (isset($pesertaCounts[$tryout->id]) && $pesertaCounts[$tryout->id] > 0)
                                                            {{ $pesertaCounts[$tryout->id] }} Peserta
                                                        @else
                                                            0 peserta
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    @if ($hasPilihanJurusan && $tryout->is_active)
                        </a>
                    @else
        </div>
        @endif
        @endforeach
        </ul>
    </div>

    <!-- Modal Alert untuk Pilih Perguruan Tinggi -->
    <div id="alertModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="fixed inset-0 bg-white/30 backdrop-blur-sm transition-opacity duration-300" id="modalOverlay"></div>
        <div class="flex items-center justify-center min-h-screen">
            <div id="modalContent"
                class="relative bg-white rounded-lg shadow-xl transform transition-all duration-300 ease-out 
                    w-full max-w-md mx-4 p-6 border border-gray-200
                    scale-95 opacity-0">
                <div class="text-center">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Pilih Perguruan Tinggi</h3>
                    <p class="text-sm text-gray-500 mb-6">
                        Pilih perguruan tinggi dan program studi sebelum memulai tryout
                    </p>
                    <div class="flex justify-center space-x-4">
                        <button onclick="hideAlert()"
                            class="px-4 py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200 transition-colors duration-200">
                            Tutup
                        </button>
                        <a href="{{ route('profile.major') }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                            Pilih PTN
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/usertryout.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function untuk refresh data tryout
                function refreshTryoutData() {
                    fetch(window.location.href, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                window.location.reload(); // Simple reload untuk fresh data
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }

                // Check jika kembali dari halaman major (deteksi navigation)
                if (sessionStorage.getItem('comingFromMajor')) {
                    sessionStorage.removeItem('comingFromMajor');
                    refreshTryoutData();
                }

                // Saat klik tombol ke halaman major, set flag
                const majorLinks = document.querySelectorAll('a[href*="major"]');
                majorLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        sessionStorage.setItem('comingFromMajor', 'true');
                    });
                });

                // Handle browser back button
                window.addEventListener('pageshow', function(event) {
                    if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                        // Page di-load dari cache (back/forward navigation)
                        refreshTryoutData();
                    }
                });
            });

            function showLockedAlert() {
                document.getElementById('lockedAlertModal').style.display = 'block';
                setTimeout(() => {
                    document.querySelector('#lockedAlertModal > div:last-child > div').classList.remove('scale-95',
                        'opacity-0');
                    document.querySelector('#lockedAlertModal > div:last-child > div').classList.add('scale-100',
                        'opacity-100');
                }, 50);
            }

            function hideLockedAlert() {
                document.querySelector('#lockedAlertModal > div:last-child > div').classList.remove('scale-100', 'opacity-100');
                document.querySelector('#lockedAlertModal > div:last-child > div').classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    document.getElementById('lockedAlertModal').style.display = 'none';
                }, 300);
            }

            // Fungsi-fungsi yang sudah ada
            function showAlert() {
                document.getElementById('alertModal').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('modalContent').classList.remove('scale-95', 'opacity-0');
                    document.getElementById('modalContent').classList.add('scale-100', 'opacity-100');
                }, 50);
            }

            function hideAlert() {
                document.getElementById('modalContent').classList.remove('scale-100', 'opacity-100');
                document.getElementById('modalContent').classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    document.getElementById('alertModal').style.display = 'none';
                }, 300);
            }
        </script>
    @endpush
</x-layout>
