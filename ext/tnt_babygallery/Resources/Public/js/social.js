var sl = $('#social-likes-manual');
sl.on('counter.social-likes', function(event, service, number) {
    console.log('Counter', service, number);
});
sl.on('popup_opened.social-likes', function(event, service, win) {
    console.log('Popup opened', service, win);
});
sl.on('popup_closed.social-likes', function(event, service) {
    console.log('Popup closed', service);
    $(event.currentTarget).socialLikes({forceUpdate: true});  // Update counters
});
sl.socialLikes();
$('#social-likes-update').click(function() {
    sl.socialLikes({
        url: 'https://github.com/sapegin/grunt-webfont/',
        title: 'SVG to webfont converter for Grunt',
        data: {
            media: 'http://birdwatcher.ru/i/userpic.jpg'
        }
    });
    return false;
});
$('#social-likes-update-force').click(function() {
    sl.socialLikes({forceUpdate: true});
    return false;
});




