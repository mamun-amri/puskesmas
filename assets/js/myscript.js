const flashData = $('.flash-data').data('flashdata');
const Href = $('.href').data('flashdata');
let teks = document.getElementsByTagName('h6');
if (flashData == 'tambah') {
    Swal.fire({
        title: teks[0].innerHTML,
        text: 'Berhasil ditambah!',
        type: 'success'

    });
} else if (flashData == 'hapus') {
    const href = Href;
    Swal.fire({
        title: teks[0].innerHTML,
        text: 'Berhasil dihapus!',
        type: 'success',
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
} else if (flashData == 'edit') {
    Swal.fire({
        title: teks[0].innerHTML,
        text: 'Berhasil diedit!',
        type: 'success'

    });
} else if (flashData == 'gagal_tambah') {
    Swal.fire({
        title: teks[0].innerHTML,
        text: 'Gagal ditambah!',
        type: 'error'

    });
} else if (flashData == 'gagal_edit') {
    Swal.fire({
        title: teks[0].innerHTML,
        text: 'Gagal diedit!',
        type: 'error'

    });
} else if (flashData == 'gagal_hapus') {
    const href = Href;
    Swal.fire({
        title: teks[0].innerHTML,
        text: 'Gagal dihapus!',
        type: 'error',
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
}


$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: teks[0].innerHTML,
        text: "Data akan dihapus!!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});