var pusher_key = document.querySelector('meta[name=pusher_key]').content;
var pusher = new Pusher(pusher_key);
var user_id = document.querySelector('meta[name=user_id]').content;

var channel = pusher.subscribe('user_notifications-to_user_id-'+user_id);

channel.bind('notifications_create', function(data) {
    console.log(data);
    $.pjax.reload({ container: '#menu-pjax', timeout: false });
});
