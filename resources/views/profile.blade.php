<x-profilelayout>
    <div class="lg:grid lg:gap-x-5">
        <div>
            <form class="space-y-6 pb-20" method="POST" action="{{ route('profile.update') }}" novalidate>
                @csrf
                <section aria-labelledby="personal_information">
                    <div class="border shadow border-neutral-300 sm:overflow-hidden sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div>
                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                    Informasi Personal
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Informasi ini akan digunakan untuk personalisasi pada
                                    layanan Campnova
                                </p>
                            </div>
                            <div class="mt-6 grid grid-cols-4 gap-6">
                                <div class="space-y-2 col-span-4 sm:col-span-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="name-input">
                                        Nama Panjang
                                    </label>
                                    <input
                                        class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-slate-500 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                        id="name-input" aria-describedby="name-description" aria-invalid="false"
                                        value="{{ old('nama_panjang', $user->nama_panjang) }}" name="nama_panjang"
                                        type="text" autocomplete="name" {{ $editMode ? '' : 'disabled' }} required />
                                </div>
                                <div class="space-y-2 col-span-4 sm:col-span-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="nama_pendek">
                                        Nama Pendek
                                    </label>
                                    <input
                                        class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-slate-500 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                        id="nama_pendek" aria-describedby="name-description" aria-invalid="false"
                                        value="{{ old('nama_pendek', $user->nama_pendek) }}" name="nama_pendek"
                                        type="text" autocomplete="name" {{ $editMode ? '' : 'disabled' }} required />
                                </div>
                                <div class="space-y-2 col-span-4 sm:col-span-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="email-input">
                                        Email
                                    </label>
                                    <input
                                        class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-slate-500 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                        id="email-input" aria-describedby="email-description" aria-invalid="false"
                                        value="{{ $user->email }}" name="email" type="email" autocomplete="email"
                                        disabled />
                                </div>
                                <div class="space-y-2 col-span-4 sm:col-span-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="birthdate-input">
                                        Tanggal Lahir
                                    </label>
                                    <input
                                        class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-slate-500 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                        id="birthdate-input" name="tanggal_lahir" type="text"
                                        value="{{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y') : '' }}"
                                        disabled />
                                </div>
                            </div>
                        </div>
                        @if ($editMode)
                            <div class="mt-4 flex bg-gray-50">
                                <button type="submit"
                                    class="inline-flex items-center justify-center mb-3 mt-3 mr-4 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 bg-slate-900 text-slate-50 shadow hover:bg-slate-900/90 h-9 px-4 py-2 ml-auto">
                                    Simpan
                                </button>
                            </div>
                        @endif
                    </div>
                </section>
            </form>
        </div>
    </div>
</x-profilelayout>
