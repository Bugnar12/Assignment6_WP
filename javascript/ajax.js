// ajax.js
function createRequest(url, method, data, successCallback, errorCallback) {
    const request = new XMLHttpRequest();
    request.open(method, url);
    request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    request.onreadystatechange = function () {
        if (request.readyState === XMLHttpRequest.DONE) {
            if (request.status === 200) {
                successCallback(JSON.parse(request.responseText));
            } else {
                errorCallback(request);
            }
        }
    };
    request.send(new URLSearchParams(data).toString());
}