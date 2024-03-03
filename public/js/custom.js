$wire.on('alert_remove',()=> {
    setTimeout(function() {
        $(".alert").fadeOut('fast');
    }, 4000);
});

$wire.on('refresh_map',()=> {

    alert('ok');

    enablemap(lat,lng);
});
