import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function() {
    $('.btn-vote-paslon, .btn-vote-cawaksis').on('click', function() {
        const button = $(this);
        const kandidatId = button.data('paslonid');

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
                        $('.btn-vote-paslon').prop('disabled', false).text('Pilih');
                    } 
                }
            },
            error: function(xhr) {
                alert('Terjadi kesalahan koneksi.');
                
            }
        });
    });
});