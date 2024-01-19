@if ($message = Session::get('alert-success'))
    <div class="p-4 rounded bg-green-100 text-green-800 border-green-300 fade show">
        <strong>{{ $message }}</strong>

        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('alert-danger'))
    <div class="p-4 rounded bg-red-100 text-red-800 border-red-300 fade show">
        <strong>{{ $message }}</strong>

        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('alert-warning'))
    <div class="p-4 rounded bg-yellow-100 text-yellow-800 border-yellow-300 fade show">
        <strong>{{ $message }}</strong>

        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('alert-info'))
    <div class="p-4 rounded bg-blue-100 text-blue-800 border-blue-300 fade show">
        <strong>{{ $message }}</strong>

        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Validation errors -->
@if ($errors->any())
    <div class="p-4 rounded bg-red-100 text-red-800 border-red-300 fade show">
        Errors:

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
