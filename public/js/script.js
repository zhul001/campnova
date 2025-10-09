// js untuk dashboard
function toggleAccordion(id) {
    const section = document.getElementById(id);
    const icon = document.getElementById("icon-" + id);
    if (section.classList.contains("hidden")) {
        section.classList.remove("hidden");
        icon.classList.add("rotate-180");
    } else {
        section.classList.add("hidden");
        icon.classList.remove("rotate-180");
    }
}

// js untuk jadwal
function formatCountdown(ms) {
    const totalSeconds = Math.floor(ms / 1000);
    const days = Math.floor(totalSeconds / (3600 * 24));
    const hours = Math.floor((totalSeconds % (3600 * 24)) / 3600);
    return `${days} hari ${hours} jam`;
}

document.addEventListener("DOMContentLoaded", function () {
    const statusCells = document.querySelectorAll("td.status");
    const now = new Date();

    statusCells.forEach((cell) => {
        const startDate = new Date(cell.dataset.start);
        const endDate = new Date(cell.dataset.end);

        if (now < startDate) {
            const countdown = formatCountdown(startDate - now);
            cell.textContent = `${countdown}`;
            cell.classList.add("text-blue-600");
        } else if (now >= startDate && now <= endDate) {
            cell.textContent = "Sedang berlangsung";
            cell.classList.add("text-green-600", "font-semibold");
        } else {
            cell.textContent = "Selesai";
            cell.classList.add("text-gray-500");
        }
    });
});

