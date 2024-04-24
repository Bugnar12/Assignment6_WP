/*
window.addEventListener('load', function() {
    createRequest('php/crud/read.php', 'GET', null, function(response) {
        const filesDiv = document.getElementById('files');
        filesDiv.innerHTML = '';
        response.forEach(function(file) {
            const fileDiv = document.createElement('div');
            fileDiv.textContent = JSON.stringify(file);
            filesDiv.appendChild(fileDiv);
        });
    }, function(request) {
        console.error('Error:', request.status, request.statusText);
    });
});
*/
