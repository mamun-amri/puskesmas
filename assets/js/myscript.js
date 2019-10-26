const flashData = $('.flash-data').data('flashdata');
if (flashData == 'tambah') {
    Swal.fire({
        title: 'Data Kemasan',
        text: 'Berhasi ditambah!',
        type: 'success'

    });
} else if (flashData == 'hapus') {
    Swal.fire({
        title: 'Data Kemasan',
        text: 'Berhasi dihapus!',
        type: 'success',
    });
    document.location.href = '../../page.php?page=view_kemasan.php';
} else if (flashData == 'edit') {
    Swal.fire({
        title: 'Data Kemasan',
        text: 'Berhasi diedit!',
        type: 'success'

    });
}


$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Data Kemasan',
        text: "data kemasan akan dihapus!!",
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