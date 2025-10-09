<x-layout>
    {{-- info --}}
    <div class="mb-6 mt-10">
        <h2 class="text-2xl font-bold text-gray-800">
            Kelola Soal untuk Tryout: <span class="text-blue-600">{{ $tryout->judul_paket }}</span>
        </h2>
        <p class="text-sm text-gray-600">
            Subtes: <strong>{{ $subtes->judul_subtes }}</strong> <br>
            Tanggal: {{ \Carbon\Carbon::parse($tryout->tanggal_mulai)->translatedFormat('d F Y') }}
            -
            {{ \Carbon\Carbon::parse($tryout->tanggal_selesai)->translatedFormat('d F Y') }}
        </p>
    </div>

    <div class="max-w-full mx-auto">
        <div class="flex flex-col gap-6 mb-6">
            <div class="flex flex-col sm:flex-row gap-6">
                <!-- Kolom Kiri (Tambah Soal) -->
                <div class="flex flex-col sm:flex-row gap-3 flex-1">
                    <a href="{{ url('/tryout/' . request()->route('tryout_id') . '/' . request()->route('subtes_id') . '/tambahpilgan') }}"
                        class="w-48 px-4 py-3 bg-blue-600 text-white rounded-md text-center font-semibold shadow hover:bg-blue-700 transition">
                        Tambah Soal Pilgan
                    </a>
                    <a href="{{ url('/tryout/' . request()->route('tryout_id') . '/' . request()->route('subtes_id') . '/tambahesai') }}"
                        class="w-48 px-4 py-3 bg-blue-600 text-white rounded-md text-center font-semibold shadow hover:bg-blue-700 transition">
                        Tambah Soal Esai
                    </a>
                </div>

                <!-- Kolom Kanan (Soal) -->
                <div class="flex flex-col sm:flex-row gap-3 justify-end">
                    <button id="btnPilgan" type="button"
                        class="w-48 px-4 py-2 bg-green-600 text-white rounded-md font-semibold shadow hover:bg-green-700 transition">
                        Soal Pilgan
                    </button>
                    <button id="btnEsai" type="button"
                        class="w-48 px-4 py-2 bg-purple-600 text-white rounded-md font-semibold shadow hover:bg-purple-700 transition">
                        Soal Esai
                    </button>
                </div>
            </div>
        </div>

        {{-- soal pilgan --}}
        <div id="tablePilgan" class="overflow-x-auto rounded-lg border border-gray-300 bg-white shadow">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 w-12">No</th>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 min-w-[200px]">Soal
                        </th>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 w-24">Pil A</th>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 w-24">Pil B</th>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 w-24">Pil C</th>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 w-24">Pil D</th>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 w-24">Pil E</th>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 w-20">Jawaban</th>
                        <th scope="col" class="px-4 py-3 text-center font-semibold text-gray-700 w-32">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($soalpilgans as $soal)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">{{ $soal->nomor_soal }}</td>
                            <td class="px-4 py-3 max-w-xs truncate">{!! $soal->soal !!}</td>
                            <td class="px-4 py-3">{!! $soal->jawaban_a !!}</td>
                            <td class="px-4 py-3">{!! $soal->jawaban_b !!}</td>
                            <td class="px-4 py-3">{!! $soal->jawaban_c !!}</td>
                            <td class="px-4 py-3">{!! $soal->jawaban_d !!}</td>
                            <td class="px-4 py-3">{!! $soal->jawaban_e !!}</td>
                            <td class="px-4 py-3 font-semibold text-center">{{ $soal->kunci_jawaban }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="inline-flex space-x-2 items-center justify-center">
                                    <a href="{{ url("/tryout/$tryoutId/$subtesId/editpilgan/{$soal->id}") }}"
                                        class="inline-block px-3 py-1 bg-blue-600 text-white border border-blue-600 rounded hover:bg-blue-700 transition">Edit</a>
                                    <form action="{{ route('soalpilgan.destroy', $soal->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus soal ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-3 py-1 bg-red-600 text-white border border-red-600 rounded hover:bg-red-700 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- soal esai --}}
        <div id="tableEsai" class="hidden overflow-x-auto rounded-lg border border-gray-300 bg-white shadow">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 w-12">No</th>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 min-w-[300px]">Soal
                        </th>
                        <th scope="col" class="px-4 py-3 text-left font-semibold text-gray-700 w-20">Jawaban</th>
                        <th scope="col" class="px-4 py-3 text-center font-semibold text-gray-700 w-32">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($soalesais as $index => $soal)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $soal->nomor_soal }}</td>
                            <td class="px-4 py-3 max-w-xs truncate">{!! $soal->soal !!}</td>
                            <td class="px-4 py-3">{!! $soal->kunci_jawaban !!}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="inline-flex space-x-2 items-center justify-center">
                                    <a href="{{ url("/tryout/$tryoutId/$subtesId/editsoal/{$soal->id}") }}"
                                        class="inline-block px-3 py-1 bg-blue-600 text-white border border-blue-600 rounded hover:bg-blue-700 transition">Edit</a>
                                    <form action="{{ route('soalesai.destroy', $soal->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus soal ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-3 py-1 bg-red-600 text-white border border-red-600 rounded hover:bg-red-700 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/kelolasubtes.js') }}"></script>
    @endpush
</x-layout>
