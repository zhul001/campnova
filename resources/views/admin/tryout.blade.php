<x-layout>
    <div class="w-full max-w-4xl mt-10">
        <button id="openModalBtn" type="button"
            class="inline-flex items-center rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            style="margin-left: 0;">
            Tambah Tryout
        </button>
    </div>

    <div class="w-full max-w-4xl mt-8 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md bg-white">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col"
                        class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">No</th>
                    <th scope="col"
                        class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tryout
                    </th>
                    <th scope="col"
                        class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal
                    </th>
                    <th scope="col"
                        class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status
                    </th>
                    <th scope="col"
                        class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Action
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($tryouts as $index => $tryout)
                    <tr class="hover:bg-gray-50">
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-900">{{ $tryout->judul_paket }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-900">
                            {{ \Carbon\Carbon::parse($tryout->tanggal_mulai)->translatedFormat('d F Y') }} -
                            {{ \Carbon\Carbon::parse($tryout->tanggal_selesai)->translatedFormat('d F Y') }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-900">
                            <form action="{{ route('tryout.toggle-status', $tryout->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
            {{ $tryout->is_active ? 'bg-green-600' : 'bg-gray-200' }}"
                                    role="switch" aria-checked="{{ $tryout->is_active ? 'true' : 'false' }}">
                                    <span class="sr-only">Toggle status</span>
                                    <span aria-hidden="true"
                                        class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out 
                {{ $tryout->is_active ? 'translate-x-5' : 'translate-x-0' }}"></span>
                                </button>
                                <span class="ml-2 text-sm font-medium text-gray-900">
                                    {{ $tryout->is_active ? 'Aktif' : 'Terkunci' }}
                                </span>
                            </form>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-900 space-x-2">
                            <button type="button" onclick="openEditModal({!! htmlspecialchars(
                                json_encode([
                                    'id' => $tryout->id,
                                    'judul_paket' => $tryout->judul_paket,
                                    'tanggal_mulai' => $tryout->tanggal_mulai,
                                    'tanggal_selesai' => $tryout->tanggal_selesai,
                                ]),
                                ENT_QUOTES,
                                'UTF-8',
                            ) !!})"
                                class="inline-flex items-center rounded bg-yellow-400 px-3 py-1 text-white hover:bg-yellow-500">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </button>

                            <a href="/tryout/{{ $tryout->id }}"
                                class="inline-flex items-center rounded bg-blue-600 px-3 py-1 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">
                                <i class="fas fa-info-circle mr-1"></i> kelola
                            </a>

                            <form action="{{ route('tryout.destroy', $tryout->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Yakin ingin menghapus tryout ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center rounded bg-red-600 px-3 py-1 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1">
                                    <i class="fas fa-trash-alt mr-1"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="modalOverlay" class="fixed inset-0 z-50 hidden items-center justify-center backdrop-blur-sm bg-black/20">
        <div class="relative w-11/12 max-w-md rounded-lg bg-white p-6 shadow-lg" role="dialog" aria-modal="true"
            aria-labelledby="modalTitle">
            <button id="closeModalBtn" type="button"
                class="absolute right-3 top-3 inline-flex items-center justify-center rounded-full bg-gray-200 p-1 text-gray-600 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1"
                aria-label="Close modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <form id="tryoutForm" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" id="tryoutId" name="tryoutId" />
                <input type="hidden" id="_method" name="_method" value="POST" />

                <label for="tryoutInput" class="block text-lg font-semibold text-gray-900">
                    Tryout
                </label>
                <input id="tryoutInput" name="judul_paket" type="text"
                    class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none" required
                    autocomplete="off" />

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="startDate" class="block text-sm font-medium text-gray-900">Tanggal Mulai</label>
                        <input id="startDate" name="tanggal_mulai" type="date"
                            class="w-full border rounded px-3 py-2 focus:outline-none" required />
                    </div>
                    <div>
                        <label for="endDate" class="block text-sm font-medium text-gray-900">Tanggal Selesai</label>
                        <input id="endDate" name="tanggal_selesai" type="date"
                            class="w-full border rounded px-3 py-2 focus:outline-none" required />
                    </div>
                </div>

                <button id="submitBtn" type="submit"
                    class="w-full rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    Tambah
                </button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/admintryout.js') }}"></script>
    @endpush
</x-layout>
