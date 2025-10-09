<x-nolayout>
    <main class="flex flex-col md:flex-row items-center justify-center px-8 md:px-20 gap-10 md:gap-20 min-h-screen">
        <section class="max-w-xl md:max-w-md text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-2">
                Oops...
            </h1>
            <p class="text-2xl font-normal mb-6">
                Halaman tidak ditemukan
            </p>
            <p class="text-gray-500 text-base mb-10 max-w-md">
                Halaman yang Anda cari tidak tersedia atau tidak ditemukan. Silakan kembali ke halaman sebelumnya.
            </p>
            <button onclick="window.history.back();"
                class="bg-[#b9e4f4] hover:bg-[#a0d3e9] text-black font-semibold text-lg rounded-lg px-8 py-3 transition"
                type="button">
                Kembali
            </button>
        </section>
        <section class="max-w-lg w-full">
            <img class="w-full h-auto" height="400" src="{{ asset('img/403-image.jpg') }}" width="600"
                alt="Ilustrasi halaman tidak ditemukan" />
        </section>
    </main>
</x-nolayout>
