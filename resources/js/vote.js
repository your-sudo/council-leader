import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function() {
    
    $.ajaxSetup({
        headers: {
 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-vote').on('click', function() {
    const button = $(this);
         const kandidatId = button.data('paslonid');

        $('.btn-vote').prop('disabled', true).text('Memproses...');

        $.ajax({
    url: '/votesubmit', 
        type: 'POST',
            data: {
                kandidat_id: kandidatId,
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert('Vote berhasil! ' + response.message);
                 $('.btn-vote').text('Sudah Memilih').prop('disabled', true);
                        button.closest('.card').css('border', '3px solid var(--highlight)');
                } else {
             alert('Vote Gagal: ' + response.message);
        $('.btn-vote').prop('disabled', false).text('Pilih');
                }
            },
            error: function(xhr) {
                alert('gagal');
                $('.btn-vote').prop('disabled', false).text('Pilih');
            }
        });
    });
});