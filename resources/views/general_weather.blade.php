<?php 
    Route::get('/current', [WeatherController::class, 'current']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>testing</title>
</head>
<body>
    @include('nav_bar')
    <div class="p-5">
        <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Search City</label>
              <input type="text" id="query" name="query" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        <div >
            <h1>El Tiempo en {{ $data->location->name }}</h1>
            <div class="d-flex flex-row row-gap-3 gap-2">
                <p>
                    {{ $data->location->localtime }}                 
                </p>
                    |
                <p>
                </p>
            </div>
        </div>
        <div class="p-3 rounded fw-bold d-flex flex-row row-gap-3 gap-3" style="max-width: 380px; background-color: #009ee2; align-items:center;">
            <div>
                <h2 style="font-size: 4.625rem" class="m-0">{{ $data->current->temperature }}°</h2>
            </div>
            <div>
                <p>UV Index: {{ $data->current->uv_index }}</p>               
            </div>
        </div>
        <div>
        </div>

    </div>

</body>
</html>