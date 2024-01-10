<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Weather;
use Carbon\Carbon;

class WeatherController extends Controller
{
    public function current(Request $request)
    {
        $accessKey = env('ACCESS_KEY');
        $city =  $request->input('query');

        if(!$city){
            $city = 'New York';
        }

        $currentHour = date('Y-m-d H:i:s');

        $weather = Weather::where('city', $city)
            ->where('hour', $currentHour)
            ->first();

        if ($weather) {
            $response = response()->json($weather);
            $data = json_decode($weather->data, false);
         
            return view('general_weather', ['data' => $data, 'currentHour' => $currentHour]);
            /* return $response = response()->json($weather); */
        } else {
            $client = new Client();
            $response = $client->request('GET', "http://api.weatherstack.com/current?access_key={$accessKey}&query={$city}");

            $weatherData = $response->getBody()->getContents();

            $weather = new Weather;
            $weather->city = $city;
            $weather->hour = $currentHour;
            $weather->data = $weatherData;

            $weather->save();
            
            /* $response = response()->json($weather); */  
            $data = json_decode($weather->data, false);

            /* return $response = response()->json($weatherData); */   
            return view('general_weather', ['data' => $data]);
        }
    }
    public function ba_weather()
    {
        $websiteContent = file_get_contents('https://www.tiempo.com/buenos-aires.htm');
    
        $crawler = new Crawler($websiteContent);
        $now = Carbon::now('America/Argentina/Buenos_Aires');

        $weatherArray = [
            'cardHTML' => $crawler->filter('.dato-temperatura')->html(),
            'titleHTML' => $crawler->filter('.title-h1')->text(),
            'sensacionHTML' => $crawler->filter('.sensacion')->text(),
            'datosUvHTML' => $crawler->filter('.datos-uv')->text(),
            'descripcionHTML' => $crawler->filter('.descripcion')->text(),
    
            'hourMinute' => $now->format('H:i'),
            'dayName' => $now->isoFormat('dddd'),

        ];
    
        /*return view('ba_weather', ['cardHTML' => $cardHTML,'titleHTML' => $titleHTML, 'dayName' => $dayName, 'hourMinute' => $hourMinute]);*/
        return view('ba_weather', ['weatherArray' => $weatherArray]);
    }
}
