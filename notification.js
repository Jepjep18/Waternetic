$(document).ready(function() {
    function loadNotifications() {
        $.ajax({
            url: 'fetch_notifications.php',
            method: 'GET',
            success: function(data) {
                $('.dropdown-list').html(data);
            }
        });
    }

    // Load notifications initially and set interval for every 10 seconds
    loadNotifications();
    setInterval(loadNotifications, 10000);
});
