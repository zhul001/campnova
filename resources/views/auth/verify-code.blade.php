<x-nolayout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-xl shadow">
        <h2 class="text-2xl font-bold mb-4">Verifikasi Kode OTP</h2>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('password.verifyOtp') }}" id="otpForm" class="space-y-4">
            @csrf
            <div class="flex justify-center gap-2">
                @for ($i = 1; $i <= 6; $i++)
                    <input type="text" name="otp{{ $i }}" maxlength="1"
                        class="w-10 h-12 text-center border rounded text-xl" />
                @endfor
            </div>

            {{-- Timer dan tombol resend --}}
            <div class="text-center mt-4 text-gray-700">
                Kirim ulang dalam: <span class="font-mono">03:00</span>
            </div>

            <div class="text-center mt-2">
                <button type="button" id="resendBtn"
                    class="text-blue-600 hover:underline font-medium focus:outline-none disabled:opacity-50" disabled>
                    Kirim ulang
                </button>
            </div>

            {{-- Submit fallback --}}
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Verifikasi
                </button>
                <div id="resendMessage" class="text-center text-sm text-green-600 mt-2"></div>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="{{ asset('js/otp.js') }}"></script>
    @endpush
</x-nolayout>
