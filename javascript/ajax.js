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
    request.send(JSON.stringify(data));
}

/*
function createGetRequestWithParams(url, data, successCallback, errorCallback) {
    const params = Object.keys(data).map(key => key + '=' + encodeURIComponent(data[key])).join('&');
    url += '?' + params;
    const request = new XMLHttpRequest();
    request.open('GET', url);
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
    request.send(null);
}*/

function createPostRequestWithJson(url, data, successCallback, errorCallback) {
    const request = new XMLHttpRequest();
    request.open('POST', url);
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
    request.send(JSON.stringify(data));
}
