<x-layout>
    <div class="max-w-7xl mx-auto mt-10">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                Hasil Tryout: <span class="text-blue-600">{{ $tryout->judul_paket }}</span>
            </h2>
            <p class="text-sm text-gray-600">
                Total Peserta: {{ $hasilTryouts->count() }}
            </p>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nama Pendek</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Total Benar</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Total Salah</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Tidak Diisi</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Total Nilai</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($hasilTryouts as $index => $hasil)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $hasil->user->nama_pendek }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $hasil->total_benar }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $hasil->total_salah }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $hasil->total_tidak_diisi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                {{ number_format($hasil->total_score, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button type="button" 
                                    class="expand-detail-btn bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-1 rounded font-medium"
                                    data-user-id="{{ $hasil->user_id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr class="detail-row hidden" id="detail-{{ $hasil->user_id }}">
                            <td colspan="7" class="px-6 py-4 bg-gray-50">
                                <div class="mb-4">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Detail Subtes - {{ $hasil->user->nama_pendek }}</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach ($hasil->hasilSubtes as $hasilSubtes)
                                        <div class="rounded-lg border bg-white p-4 shadow-sm">
                                            <div class="flex items-center justify-between mb-2">
                                                <h5 class="text-sm font-semibold text-gray-800">
                                                    {{ $hasilSubtes->subtes->judul_subtes }}
                                                </h5>
                                                <div class="text-right">
                                                    <div class="text-xl font-bold" 
                                                         style="color: {{ $hasilSubtes->score < 500 ? 'rgb(239, 68, 68)' : ($hasilSubtes->score < 600 ? 'rgb(234, 179, 8)' : 'rgb(34, 197, 94)') }}">
                                                        {{ number_format($hasilSubtes->score, 2) }}
                                                    </div>
                                                    <div class="text-xs text-gray-500">Skor</div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3 gap-2 text-center text-xs">
                                                <div class="bg-green-50 rounded p-2">
                                                    <div class="font-semibold text-green-700">{{ $hasilSubtes->benar }}</div>
                                                    <div class="text-green-600">Benar</div>
                                                </div>
                                                <div class="bg-red-50 rounded p-2">
                                                    <div class="font-semibold text-red-700">{{ $hasilSubtes->salah }}</div>
                                                    <div class="text-red-600">Salah</div>
                                                </div>
                                                <div class="bg-gray-50 rounded p-2">
                                                    <div class="font-semibold text-gray-700">{{ $hasilSubtes->tidak_diisi }}</div>
                                                    <div class="text-gray-600">Kosong</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const expandButtons = document.querySelectorAll('.expand-detail-btn');
            
            expandButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user-id');
                    const detailRow = document.getElementById(`detail-${userId}`);
                    
                    // Toggle visibility
                    if (detailRow.classList.contains('hidden')) {
                        detailRow.classList.remove('hidden');
                        this.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                        `;
                    } else {
                        detailRow.classList.add('hidden');
                        this.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        `;
                    }
                });
            });
        });
    </script>

    <style>
        .detail-row {
            transition: all 0.3s ease;
        }
        
        .expand-detail-btn {
            transition: all 0.3s ease;
        }
        
        .expand-detail-btn:hover {
            transform: scale(1.1);
        }
    </style>
</x-layout>