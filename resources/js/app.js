import './bootstrap';

import Alpine from 'alpinejs'
import Swal from 'sweetalert2';

window.Swal = Swal; 

window.Alpine = Alpine
Alpine.start()


/*SWEET ALERT*/
document.addEventListener('DOMContentLoaded', function () {

    // ================= DELETE CONFIRMATION =================
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data ini tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // kirim form kalau dikonfirmasi
                }
            });
        });
    });

    // ================= SESSION ALERTS =================
    const successMessage = document.querySelector('meta[name="swal-success"]')?.content;
    const errorMessage = document.querySelector('meta[name="swal-error"]')?.content;

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: successMessage,
            timer: 2000,
            showConfirmButton: false
        });
    }

    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: errorMessage,
            timer: 2000,
            showConfirmButton: false
        });
    }

});
