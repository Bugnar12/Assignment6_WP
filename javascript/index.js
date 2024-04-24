/*
// index.js
document.getElementById('createForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const data = getFormData('createForm');
    createRequest('php/crud/create.php', 'POST', data, function(response) {
        console.log(response);
        refreshFiles();
    }, function(request) {
        console.error('Error:', request.status, request.statusText);
    });
});

document.getElementById('updateForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const data = getFormData('updateForm');
    createRequest('php/crud/update.php', 'PUT', data, function(response) {
        console.log(response);
        refreshFiles();
    }, function(request) {
        console.error('Error:', request.status, request.statusText);
    });
});

document.getElementById('deleteForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const data = getFormData('deleteForm');
    console.log(data);
    createRequest('php/crud/delete.php', 'DELETE', data, function(response) {
        console.log(response);
        refreshFiles();
    }, function(request) {
        console.error('Error:', request.status, request.statusText);
    });
});

// Fetch the files when the page loads
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

function refreshFiles() {
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
}

window.addEventListener('load', function() {
    refreshFiles();
});*/
