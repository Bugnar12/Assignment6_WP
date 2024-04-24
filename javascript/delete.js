document.getElementById('deleteForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const data = getFormData('deleteForm');
    const isConfirmed = window.confirm('Are you sure you want to delete this file?');
    if (isConfirmed) {
        createRequest('php/crud/delete.php', 'DELETE', data, function(response) {
            console.log(response);
            window.location.href = 'readFile.html';
        }, function(request) {
            console.error('Error:', request.status, request.statusText);
        });
    }
});