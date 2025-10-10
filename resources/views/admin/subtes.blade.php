<x-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Subtes untuk Tryout: <span class="text-blue-600">{{ $tryout->judul_paket }}</span>
                </h2>
                <p class="text-sm text-gray-600">
                    Tanggal: {{ \Carbon\Carbon::parse($tryout->tanggal_mulai)->translatedFormat('d F Y') }} -
                    {{ \Carbon\Carbon::parse($tryout->tanggal_selesai)->translatedFormat('d F Y') }}
                </p>
            </div>
            <a href="{{ route('admin.hasil_tryout', ['tryoutId' => $tryout->id]) }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-medium">
                Lihat Nilai
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Tipe Subtes</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Subtes</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Timer</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Jumlah Soal</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($subtes as $index => $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->tipe_subtes_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->judul_subtes }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ \Carbon\CarbonInterval::seconds($item->timer)->cascade()->format('%I:%S') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $createdQuestionCounts[$item->id] ?? 0 }}/{{ $item->jumlah_soal }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ url('/tryout/' . $tryout->id . '/' . $item->id) }}"
                                    class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 font-medium">
                                    Kelola
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>