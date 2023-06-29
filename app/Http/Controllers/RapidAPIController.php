<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapidAPIController extends Controller
{
    // Get all the fixtures from a championship
    // Ref. https://rapidapi.com/GiulianoCrescimbeni/api/football98/
    /**
     * The function makes a GET request to an API endpoint to retrieve Premier League football fixtures
     * and then prints the decoded response.
     * 
     * @param Request request The  parameter is an instance of the Request class, which is
     * typically used in Laravel applications to handle HTTP requests. It contains information about
     * the current request, such as the request method, headers, and input data. In this case, it is
     * not being used in the code snippet provided.
     */
    public function championshipTable(Request $request)
    {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://football98.p.rapidapi.com/premierleague/table",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: football98.p.rapidapi.com",
                "X-RapidAPI-Key: e7a1de6b33msh20f6ed3ff4c4cb8p13f87ajsn05a9de0dd93b"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $data['response'] = json_decode($response, JSON_UNESCAPED_UNICODE); // decode data from json
        }
        
        return view('front.rapidapi.championshiptable', $data);


    }

}
