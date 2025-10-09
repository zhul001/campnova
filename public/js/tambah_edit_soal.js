// Dropdown logic untuk nomer soal
const nomerSoalInput = document.getElementById("nomer-soal");
const nomerSoalOptions = document.getElementById("nomer-soal-options");
const wrapper = document.getElementById("nomer-soal-wrapper");

// Toggle dropdown visibility
nomerSoalInput.addEventListener("click", (e) => {
    e.stopPropagation();
    nomerSoalOptions.classList.toggle("hidden");
});

// Close dropdown when clicking outside
document.addEventListener("click", (e) => {
    if (!wrapper.contains(e.target)) {
        nomerSoalOptions.classList.add("hidden");
    }
});

// Handle button selection
nomerSoalOptions.querySelectorAll("button").forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.stopPropagation();
        nomerSoalInput.value = btn.dataset.value;
        nomerSoalOptions.classList.add("hidden");

        // Update active button styling
        nomerSoalOptions.querySelectorAll("button").forEach((b) => {
            b.classList.remove("bg-blue-600", "text-white");
        });
        btn.classList.add("bg-blue-600", "text-white");

        // Trigger change event if needed
        nomerSoalInput.dispatchEvent(new Event("change"));
    });
});

// Hindari trix-editor langsung fokus saat halaman dimuat
window.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        const active = document.activeElement;
        if (active && active.tagName === "TRIX-EDITOR") {
            active.blur();
        }
    }, 50);
});

function setKunciJawaban(el, value) {
    // Set nilai ke input hidden
    document.getElementById("kunci-jawaban").value = value;

    // Hapus status aktif dari semua tombol
    document.querySelectorAll(".jawaban-btn").forEach((btn) => {
        btn.classList.remove("bg-blue-600", "text-white");
    });

    // Aktifkan tombol yang diklik
    el.classList.add("bg-blue-600", "text-white");
}

// Fungsi untuk mengaktifkan jawaban berdasarkan nilai input hidden
function initKunciJawaban() {
    const kunciJawaban = document.getElementById("kunci-jawaban").value;
    if (kunciJawaban) {
        const btn = document.querySelector(
            `.jawaban-btn[onclick*="'${kunciJawaban}'"]`
        );
        if (btn) {
            btn.classList.add("bg-blue-600", "text-white");
        }
    }
}

// Panggil fungsi init saat halaman dimuat
document.addEventListener("DOMContentLoaded", initKunciJawaban);
