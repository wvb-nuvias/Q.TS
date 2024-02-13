
    <div class="container mb-6 bg-green-400 border border-green-600 rounded-md alert alert-success text-light" role="alert">
        <div class="flex flex-row">
            <div class="col col-lg-1"><i class="fa fa-thumbs-up fa-2xl h1 text-light"></i></div>
            <div class="col">
                <p class="h4 text-light"><strong>Success</strong></p><br>
                <p class="h6 text-light">{{ session('success') }} </p>
            </div>
        </div>
    </div>
@if (session()->has('success'))
@endif

@if (session()->has('info'))
<div class="container mb-6 bg-blue-400 border border-blue-600 rounded-md alert alert-info text-light" role="alert">
    <div class="flex flex-row">
        <div class="col col-lg-1"><i class="fa fa-circle-info fa-2xl h1 text-light"></i></div>
        <div class="col">
            <p class="h4 text-light"><strong>Info</strong></p><br>
            <p class="h6 text-light">{{ session('info') }} </p>
        </div>
    </div>
</div>
@endif

@if (session()->has('warning'))
<div class="container mb-6 bg-orange-400 border border-orange-600 rounded-md alert alert-warning text-light" role="alert">
    <div class="flex flex-row">
        <div class="col col-lg-1"><i class="fa fa-circle-exclamation fa-2xl h1 text-light"></i></div>
        <div class="col">
            <p class="h4 text-light"><strong>Warning</strong></p><br>
            <p class="h6 text-light">{{ session('warning') }} </p>
        </div>
    </div>
</div>
@endif

@if (session()->has('error'))
<div class="container mb-6 bg-red-400 border border-red-600 rounded-md alert alert-danger text-light" role="alert">
    <div class="flex flex-row">
        <div class="col col-lg-1"><i class="fa fa-triangle-exclamation fa-2xl h1 text-light"></i></div>
        <div class="col">
            <p class="h4 text-light"><strong>Error</strong></p><br>
            <p class="h6 text-light">{{ session('error') }} </p>
        </div>
    </div>
</div>
@endif

@script
<script>
    $wire.on('alert_remove',()=> {
        setTimeout(function() {
            $(".alert").fadeOut('fast');
        }, 4000);
    });
</script>
@endscript
