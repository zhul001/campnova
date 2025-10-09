function showAlert() {
    const modal = document.getElementById("alertModal");
    const overlay = document.getElementById("modalOverlay");
    const content = document.getElementById("modalContent");

    // Show modal
    modal.style.display = "block";

    // Force reflow for animation
    void modal.offsetWidth;

    // Animate overlay and content
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

    // Animate out
    overlay.style.opacity = "0";
    content.classList.remove("scale-100", "opacity-100");
    content.classList.add("scale-95", "opacity-0");

    // Hide after animation
    setTimeout(() => {
        modal.style.display = "none";
    }, 300);
}