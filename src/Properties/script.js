document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById('video-input');
    const iframe = document.getElementById('video-iframe');

    document.getElementById('video-input').addEventListener('input', function (e) {
        iframe.setAttribute('src', input.value);
    })
});