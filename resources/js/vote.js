import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function() {
    $('.btn-vote-caksis, .btn-vote-cawaksis').on('click', function() {
        const button = $(this);
        const kandidatId = button.data('kandidatid');
        const kandidatCalonJabatan = button.data('kandidatcalonjabatan');

        if (kandidatCalonJabatan === 'caksis') {
            $('.btn-vote-caksis').prop('disabled', true).text('Sudah Vote');
        } else if (kandidatCalonJabatan === 'cawaksis') {
            $('.btn-vote-cawaksis').prop('disabled', true).text('Sudah Vote');
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url: '/submit',
            type: 'POST',
            data: {
                kandidat_id: kandidatId,
                calon_jabatan: kandidatCalonJabatan,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert('Vote berhasil: ' + response.message);
                } else {
                    alert('Vote gagal: ' + response.message);
                    
                    if (kandidatCalonJabatan === 'caksis') {
                        $('.btn-vote-caksis').prop('disabled', false).text('Pilih');
                    } else if (kandidatCalonJabatan === 'cawaksis') {
                        $('.btn-vote-cawaksis').prop('disabled', false).text('Pilih');
                    }
                }
            },
            error: function(xhr) {
                alert('Terjadi kesalahan koneksi.');
                
                if (kandidatCalonJabatan === 'caksis') {
                    $('.btn-vote-caksis').prop('disabled', false).text('Pilih');
                } else if (kandidatCalonJabatan === 'cawaksis') {
                    $('.btn-vote-cawaksis').prop('disabled', false).text('Pilih');
                }
            }
        });
    });
});