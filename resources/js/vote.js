function submitVote(button) {
    const candidateId = button.getAttribute('data-kandidat-id');
    const position = button.getAttribute('data-kandidat-calon_jabatan');

    const data = {
        candidate_id: candidateId,
        position: position,
        _token: '{{ csrf_token() }}'
    };

    fetch('/vote', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest', // A good practice for AJAX requests
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (response.ok) {
            return response.json(); 
        }
        return response.json().then(errorData => {
            throw new Error(errorData.message || 'An error occurred.');
        });
    })
    .then(data => {
       alert(data.message);
    })
    .catch(error => {
    alert('Error: ' + error.message);
    });
}