import "./bootstrap";

import Alpine from "alpinejs";
import Swal from "sweetalert2";
import AOS from "aos";
import "aos/dist/aos.css";

document.addEventListener("DOMContentLoaded", () => {
    AOS.init({
        once: false,
        duration: 800,
        easing: "ease-in-out",
    });
});

window.Swal = Swal;

window.Alpine = Alpine;
Alpine.start();

/*SWEET ALERT*/
document.addEventListener("DOMContentLoaded", () => {
    /* ================= DELETE CONFIRM ================= */
    document.querySelectorAll(".delete-form").forEach((form, i) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const button = form.querySelector('button[type="submit"]');

            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data ini tidak bisa dikembalikan!",
                icon: "warning",
                cancelButtonColor: "#d33",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!",
                confirmButtonColor: "#2578C6",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    lockButton(button, "Menghapus...");
                    form.submit();
                }
            });
        });
    });

    /* ================= NORMAL SUBMIT ================= */
    document.querySelectorAll("form[data-delay-submit]").forEach((form) => {
        form.addEventListener("submit", function () {
            const button = form.querySelector('button[type="submit"]');
            lockButton(button, "Menyimpan...");
        });
    });

    /* ================= SESSION ALERT ================= */
    const success = document.querySelector(
        'meta[name="swal-success"]',
    )?.content;
    const error = document.querySelector('meta[name="swal-error"]')?.content;

    if (success) {
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: success,
            timer: 2000,
            showConfirmButton: false,
        });
    }

    if (error) {
        Swal.fire({
            icon: "error",
            title: "Gagal",
            text: error,
        }).then(() => {
            document
                .querySelectorAll("button[disabled]")
                .forEach((btn) => unlockButton(btn));
        });
    }

    /* ================= ERROR INPUT ================= */
    document.querySelectorAll("[data-error-input]").forEach((input) => {
        input.addEventListener("input", () => {
            input.classList.remove(
                "bg-red-50",
                "border-red-100",
                "focus:border-red-300",
                "focus:ring-red-300",
            );

            input.classList.add("border-default-medium");
        });
    });
});

/* ================= HELPER ================= */
function lockButton(button, text = "Processing...") {
    if (!button) return;

    button.disabled = true;
    button.classList.add("opacity-70", "cursor-not-allowed");

    const originalText = button.innerHTML;
    button.setAttribute("data-original-text", originalText);

    button.innerHTML = `
        <svg class="animate-spin h-4 w-4 mr-2 inline" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8z"/>
        </svg>
        ${text}
    `;
}
