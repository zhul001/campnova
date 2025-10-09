const openModalBtn = document.getElementById("openModalBtn");
const closeModalBtn = document.getElementById("closeModalBtn");
const modalOverlay = document.getElementById("modalOverlay");

const tryoutInput = document.getElementById("tryoutInput");
const startDate = document.getElementById("startDate");
const endDate = document.getElementById("endDate");
const tryoutId = document.getElementById("tryoutId");
const methodField = document.getElementById("_method");
const submitBtn = document.getElementById("submitBtn");
const tryoutForm = document.getElementById("tryoutForm");

openModalBtn.addEventListener("click", () => {
    modalOverlay.classList.remove("hidden");
    modalOverlay.classList.add("flex");

    tryoutForm.reset();
    tryoutId.value = "";
    methodField.value = "POST";
    tryoutForm.action = "/tryout";
    submitBtn.textContent = "Tambah";
});

function openEditModal(data) {
    modalOverlay.classList.remove("hidden");
    modalOverlay.classList.add("flex");

    tryoutId.value = data.id;
    tryoutInput.value = data.judul_paket;
    startDate.value = data.tanggal_mulai;
    endDate.value = data.tanggal_selesai;

    methodField.value = "PATCH";
    tryoutForm.action = `/tryout/${data.id}`;
    submitBtn.textContent = "Update";
}

closeModalBtn.addEventListener("click", () => {
    modalOverlay.classList.add("hidden");
    modalOverlay.classList.remove("flex");
    tryoutForm.reset();
});

modalOverlay.addEventListener("click", (e) => {
    if (e.target === modalOverlay) {
        modalOverlay.classList.add("hidden");
        modalOverlay.classList.remove("flex");
        tryoutForm.reset();
    }
});

document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && !modalOverlay.classList.contains("hidden")) {
        modalOverlay.classList.add("hidden");
        modalOverlay.classList.remove("flex");
        tryoutForm.reset();
    }
});
