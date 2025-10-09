const btnPilgan = document.getElementById("btnPilgan");
const btnEsai = document.getElementById("btnEsai");
const tablePilgan = document.getElementById("tablePilgan");
const tableEsai = document.getElementById("tableEsai");

btnPilgan.addEventListener("click", () => {
    tablePilgan.classList.remove("hidden");
    tableEsai.classList.add("hidden");
    btnPilgan.classList.add("bg-green-700");
    btnEsai.classList.remove("bg-green-700");
});

btnEsai.addEventListener("click", () => {
    tableEsai.classList.remove("hidden");
    tablePilgan.classList.add("hidden");
    btnEsai.classList.add("bg-green-700");
    btnPilgan.classList.remove("bg-green-700");
});

tablePilgan.classList.remove("hidden");
tableEsai.classList.add("hidden");
btnPilgan.classList.add("bg-green-700");
