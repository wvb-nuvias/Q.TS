var L;
var map;

$wire.on('alert_remove',()=> {
    setTimeout(function() {
        $(".alert").fadeOut('fast');
    }, 4000);
});


