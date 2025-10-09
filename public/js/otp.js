document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll("input[name^='otp']");
    const resendBtn = document.getElementById("resendBtn");
    const resendMessage = document.getElementById("resendMessage");
    const timerDisplay = document.querySelector(".font-mono");
    const form = document.querySelector("form");

    inputs.forEach((input, index) => {
        input.addEventListener("input", function () {
            if (this.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }

            const filled = Array.from(inputs).every(
                (i) => i.value.length === 1
            );
            if (filled) {
                form.submit();
            }
        });

        input.addEventListener("keydown", function (e) {
            if (e.key === "Backspace" && this.value === "" && index > 0) {
                inputs[index - 1].focus();
            } else if (e.key === "ArrowLeft" && index > 0) {
                inputs[index - 1].focus();
            } else if (e.key === "ArrowRight" && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });
    });

    if (resendBtn) {
        resendBtn.addEventListener("click", function () {
            resendBtn.disabled = true;
            resendMessage.textContent = "";

            fetch("{{ route('otp.resend') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'input[name="_token"]'
                    ).value,
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({}),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status) {
                        resendMessage.textContent = data.message;
                        startTimer(180);
                    } else {
                        resendMessage.textContent = data.message;
                        resendBtn.disabled = false;
                    }
                })
                .catch(() => {
                    resendMessage.textContent = "Gagal mengirim ulang kode.";
                    resendBtn.disabled = false;
                });
        });

        startTimer(180);
    }

    function startTimer(durationInSeconds) {
        let time = durationInSeconds;
        resendBtn.disabled = true;

        const interval = setInterval(() => {
            const minutes = String(Math.floor(time / 60)).padStart(2, "0");
            const seconds = String(time % 60).padStart(2, "0");
            timerDisplay.textContent = `${minutes}:${seconds}`;

            if (--time < 0) {
                clearInterval(interval);
                resendBtn.disabled = false;
                timerDisplay.textContent = "00:00";
            }
        }, 1000);
    }
});
