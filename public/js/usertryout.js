function showAlert() {
    const modal = document.getElementById("alertModal");
    const overlay = document.getElementById("modalOverlay");
    const content = document.getElementById("modalContent");

    modal.style.display = "block";

    void modal.offsetWidth;

    overlay.style.opacity = "1";
    setTimeout(() => {
        content.classList.remove("scale-95", "opacity-0");
        content.classList.add("scale-100", "opacity-100");
    }, 10);
}

function hideAlert() {
    const modal = document.getElementById("alertModal");
    const overlay = document.getElementById("modalOverlay");
    const content = document.getElementById("modalContent");

    overlay.style.opacity = "0";
    content.classList.remove("scale-100", "opacity-100");
    content.classList.add("scale-95", "opacity-0");

    setTimeout(() => {
        modal.style.display = "none";
    }, 300);
}