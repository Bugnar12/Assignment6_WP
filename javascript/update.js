document.getElementById('updateForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const data = getFormData('updateForm');
    const validateData = validateFile(data);
    if(validateData !== null)
    {
        alert(validateData);
        return;
    }
    createRequest('php/crud/update.php', 'PUT', data, function(response) {
        console.log(response);
        window.location.href = 'readFile.html';
    }, function(request) {
        console.error('Error:', request.status, request.statusText);
    });
});