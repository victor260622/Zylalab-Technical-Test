<?php 
 $temperature = strip_tags($weatherArray['cardHTML']);
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
        <div >
            <h1>{{ $weatherArray['titleHTML']}}</h1>
            <div class="d-flex flex-row row-gap-3 gap-2">
                <p>
                    {{ $weatherArray['hourMinute'] }}                  
                </p>
                    |
                <p>
                    {{ $weatherArray['dayName'] }}
                </p>
            </div>
        </div>
        <div class="p-3 rounded fw-bold d-flex flex-row row-gap-3 gap-3" style="max-width: 380px; background-color: #009ee2">
            <div>
                <p>{{ $weatherArray['descripcionHTML'] }}</p>
                <h2 style="font-size: 4.625rem" class="m-0">{{ $temperature }}</h2>  
                <p>{{ $weatherArray['sensacionHTML'] }}</p>
            </div>
            <div>
                {{ $weatherArray['datosUvHTML']}}
            </div>
        </div>
        <div>
        </div>
    </div>
</body>
</html>