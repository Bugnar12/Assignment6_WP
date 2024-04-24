document.getElementById('createForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const data = getFormData('createForm');
    console.log(data);
    const validateData = validateFile(data);

    if(validateData !== null)
    {
        alert(validateData);
        return;
    }
    createRequest('php/crud/create.php', 'POST', data, function(response) {
        console.log(response);
        window.location.href = 'readFile.html';
    }, function(request) {
        console.error('Error:', request.status, request.statusText);
    });
});