<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeeTheWeatherController extends AbstractController
{
    /**
     * @Route("/see/the/weather", name="see_the_weather")
     */
    public function weather()
    { /* $number = random_int(0, 100);*/

        $apiKey = "9e5cae3c73aecf9b145ae70642983157";
        $cityId = "1850144";//tokyo
        $cityId = "2464470";
        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        curl_close($ch);


        return $this->render('see_the_weather/index.html.twig', [
                'weather' => $response,]
        );
    }

}
