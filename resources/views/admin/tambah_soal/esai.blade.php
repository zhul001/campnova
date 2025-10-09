<x-layout>
    <div class="w-full bg-white rounded-lg shadow-md p-6 max-w-full mt-10">
        <form id="form-soal" class="space-y-6 relative" method="POST"
            action="{{ $mode === 'edit' ? route('esai.update', ['tryout_id' => $tryout_id, 'subtes_id' => $subtes_id, 'soal_id' => $soal->id]) : route('esai.store', ['tryout_id' => $tryout_id, 'subtes_id' => $subtes_id]) }}"
            enctype="multipart/form-data">
            @csrf
            <!-- Shared fields: Nomer Soal, Soal, Pilih Gambar -->
            <div class="relative" id="nomer-soal-wrapper">
                <label for="nomer-soal" class="block text-gray-700 font-medium mb-1">Nomer Soal</label>
                <input type="text" id="nomer-soal" name="nomer-soal" readonly
                    class="w-full border border-gray-300 rounded-md px-3 py-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500"
                    autocomplete="off" required value="{{ old('nomer-soal', $soal ? $soal->nomor_soal : '') }}" />
                <!-- Dropdown options -->
                <div id="nomer-soal-options"
                    class="absolute z-20 top-full left-0 right-0 mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-w-full max-h-40 overflow-y-auto hidden"
                    style="user-select:none;">
                    <div class="grid grid-cols-10 gap-1 p-2">
                        @for ($i = 1; $i <= $jumlah_soal; $i++)
                            @php
                                $is_used = in_array($i, $used_numbers);
                                $is_current = $mode === 'edit' && $soal && $soal->nomor_soal == $i;
                            @endphp
                            <button type="button"
                                class="w-24 h-8 flex items-center justify-center rounded-md border border-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white focus:outline-none
                                {{ $is_used && !$is_current ? 'aktif cursor-not-allowed bg-gray-300 text-gray-500 hover:bg-gray-300 hover:text-gray-500' : '' }}
                                {{ $is_current ? 'bg-blue-600 text-white' : '' }}"
                                data-value="{{ $i }}" {{ $is_used && !$is_current ? 'disabled' : '' }}>
                                {{ $i }}
                            </button>
                        @endfor
                    </div>
                </div>
            </div>

            <div>
                <label for="soal" class="block text-gray-700 font-medium mb-1">Soal</label>
                <input id="soal" type="hidden" name="soal" required
                    value="{{ old('soal', $soal ? $soal->soal : '') }}">
                <trix-editor input="soal"
                    class="trix-content bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></trix-editor>
            </div>

            <div>
                <label for="gambar" class="block text-gray-700 font-medium mb-1">Pilih Gambar</label>
                <input type="file" id="gambar" name="gambar" accept="image/*"
                    class="w-full text-gray-700 border border-gray-300 rounded-md px-3 py-2" />
                @if ($mode === 'edit' && $soal && $soal->soal_gambar)
                    <img src="{{ asset('storage/' . $soal->soal_gambar) }}" alt="Gambar Soal" class="mt-2 max-h-40">
                @endif
            </div>

            <!-- Esai form -->
            <div id="form-esai" class="mt-4">
                <label for="kunci-esai" class="block text-gray-700 font-medium mb-1">Kunci Jawaban</label>
                <input type="text" id="kunci-esai" name="kunci-esai" min="0"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('kunci-esai', $soal ? $soal->kunci_jawaban : '') }}" />
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">
                    {{ $mode === 'edit' ? 'Update' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>


    @push('scripts')
        <script src="{{ asset('js/tambah_edit_soal.js') }}"></script>
    @endpush
</x-layout>
