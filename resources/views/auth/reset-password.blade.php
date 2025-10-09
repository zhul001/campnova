<x-nolayout>
    <div class="bg-white mx-auto border border-gray-300 rounded-md w-full max-w-xl mt-6 mb-6">
        <h2 class="mt-4 text-center text-xl font-bold tracking-tight text-gray-900">
            Buat password baru
        </h2>

        <div class="mx-auto w-full max-w-md mt-4 mb-4">
            <form method="POST" action="{{ route('password.reset') }}" novalidate>
                @csrf

                {{-- Password Baru --}}
                @php $hasErrorPassword = $errors->has('password'); @endphp
                <div class="mt-2 relative">
                    <div
                        class="flex items-center rounded-md bg-white px-3 py-1.5 border {{ $hasErrorPassword ? 'border-red-500' : 'border-gray-300' }}">
                        <input type="password" name="password" id="password" autocomplete="new-password" required
                            class="w-full text-base text-gray-900 bg-white outline-none sm:text-sm pr-2" />
                        <button type="button" id="togglePassword"
                            class="ml-3 text-sm font-semibold text-gray-600 hover:text-slate-500 focus:outline-none">
                            Show
                        </button>
                    </div>
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                @php $hasErrorConfirm = $errors->has('password_confirmation'); @endphp
                <div class="mt-2 relative">
                    <div
                        class="flex items-center rounded-md bg-white px-3 py-1.5 border {{ $hasErrorConfirm ? 'border-red-500' : 'border-gray-300' }}">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            autocomplete="new-password" required
                            class="w-full text-base text-gray-900 bg-white outline-none sm:text-sm pr-2" />
                        <button type="button" id="togglePasswordConfirm"
                            class="ml-3 text-sm font-semibold text-gray-600 hover:text-slate-500 focus:outline-none">
                            Show
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-4">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-[#b9e4f4] hover:bg-[#a0d3e9] px-3 py-1.5 text-sm font-semibold shadow-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-600">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/signinup.js') }}"></script>
    @endpush
</x-nolayout>
