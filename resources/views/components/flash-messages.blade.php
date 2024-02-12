@if (session()->has('success'))
    <div class="alert alert-success text-light container" role="alert">
        <div class="row">
            <div class="col col-lg-1"><i class="fa fa-thumbs-up fa-2xl h1 text-light"></i></div>
            <div class="col">
                <p class="h4 text-light"><strong>Success</strong></p><br>
                <p class="h6 text-light">{{ session('success') }} </p>
            </div>
        </div>
    </div>
@endif

@if (session()->has('info'))
<div class="alert alert-info text-light container" role="alert">
    <div class="row">
        <div class="col col-lg-1"><i class="fa fa-circle-info fa-2xl h1 text-light"></i></div>
        <div class="col">
            <p class="h4 text-light"><strong>Info</strong></p><br>
            <p class="h6 text-light">{{ session('info') }} </p>
        </div>
    </div>
</div>
@endif

@if (session()->has('warning'))
<div class="alert alert-warning text-light container" role="alert">
    <div class="row">
        <div class="col col-lg-1"><i class="fa fa-circle-exclamation fa-2xl h1 text-light"></i></div>
        <div class="col">
            <p class="h4 text-light"><strong>Warning</strong></p><br>
            <p class="h6 text-light">{{ session('warning') }} </p>
        </div>
    </div>
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger text-light container" role="alert">
    <div class="row">
        <div class="col col-lg-1"><i class="fa fa-triangle-exclamation fa-2xl h1 text-light"></i></div>
        <div class="col">
            <p class="h4 text-light"><strong>Error</strong></p><br>
            <p class="h6 text-light">{{ session('error') }} </p>
        </div>
    </div>
</div>
@endif
