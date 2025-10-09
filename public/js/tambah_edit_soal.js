const nomerSoalInput = document.getElementById("nomer-soal");
const nomerSoalOptions = document.getElementById("nomer-soal-options");
const wrapper = document.getElementById("nomer-soal-wrapper");

nomerSoalInput.addEventListener("click", (e) => {
    e.stopPropagation();
    nomerSoalOptions.classList.toggle("hidden");
});

document.addEventListener("click", (e) => {
    if (!wrapper.contains(e.target)) {
        nomerSoalOptions.classList.add("hidden");
    }
});

nomerSoalOptions.querySelectorAll("button").forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.stopPropagation();
        nomerSoalInput.value = btn.dataset.value;
        nomerSoalOptions.classList.add("hidden");

        nomerSoalOptions.querySelectorAll("button").forEach((b) => {
            b.classList.remove("bg-blue-600", "text-white");
        });
        btn.classList.add("bg-blue-600", "text-white");

        nomerSoalInput.dispatchEvent(new Event("change"));
    });
});

window.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        const active = document.activeElement;
        if (active && active.tagName === "TRIX-EDITOR") {
            active.blur();
        }
    }, 50);
});

function setKunciJawaban(el, value) {
    document.getElementById("kunci-jawaban").value = value;

    document.querySelectorAll(".jawaban-btn").forEach((btn) => {
        btn.classList.remove("bg-blue-600", "text-white");
    });

    el.classList.add("bg-blue-600", "text-white");
}

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

document.addEventListener("DOMContentLoaded", initKunciJawaban);
