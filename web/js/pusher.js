var pusher_key = document.querySelector('meta[name=pusher_key]').content;
var pusher = new Pusher(pusher_key);
var user_id = document.querySelector('meta[name=user_id]').content;

var channel = pusher.subscribe('user_notifications-to_user_id-'+user_id);

channel.bind('notifications_create', function(data) {
    console.log(data);
    $.pjax.reload({ container: '#user-notifications-pjax', timeout: false });
    $.notify({
        icon: 'https://randomuser.me/api/portraits/med/men/77.jpg',
        title: '',
        message: data.message
    },{
        type: 'minimalist',
        delay: 5000,
        icon_type: 'image',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<img data-notify="icon" class="img-circle pull-left">' +
        '<span data-notify="title">{1}</span>' +
        '<span data-notify="message">{2}</span>' +
        '</div>'
    });
});
