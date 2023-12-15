document.addEventListener('DOMContentLoaded', function () {
    const showButton = document.getElementById('showButton');
    const announcement = document.getElementById('announcement');
    const closeButton = document.getElementById('closeButton');

    showButton.addEventListener('click', function () {
        announcement.style.display = 'block';
        setTimeout(function () {
            announcement.style.opacity = '1';
        }, 10);
        setTimeout(function () {
            closeAnnouncement();
        }, 5000);
    });

    closeButton.addEventListener('click', function () {
        closeAnnouncement();
    });

    function closeAnnouncement() {
        announcement.style.opacity = '0';
        setTimeout(function () {
            announcement.style.display = 'none';
        }, 500);
    }
});
