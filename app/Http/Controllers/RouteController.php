<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

class RouteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    /**
     * The index function makes a GET request to an API endpoint, retrieves the response, and passes it
     * to the front.index view.
     * 
     * @param Request request The  parameter is an instance of the Request class, which
     * represents the current HTTP request. It contains information about the request such as the
     * request method, headers, and input data.
     * 
     * @return a view called 'front.index' with the data variable .
     */
    public function index(Request $request)
    {
        // $name = $request->name;

        // call apis
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://tatapi.tourismthailand.org/tatapi/v5/routes',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json, text/json',
            'Accept-Language: th',
            'Authorization: Bearer GkijxeB2XqsBv0q3NgHADIjSuXVjl9(cyEw1oQ7XZ7u5Ug)vvFtb)N(aWhU80mSl2TC8GSlcc(B91Ab1rh91t1G=====2'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        $data['response'] = json_decode($response, JSON_UNESCAPED_UNICODE);
        // echo '<pre>';
        // print_r($data['response']);
        // die();

        return view('front.index', $data);
 
        //
    }

    public function routeList(Request $request, $routeId){
        $nmber_of_day = $request->day;

        // call apis
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://tatapi.tourismthailand.org/tatapi/v5/routes/'.$routeId.'?day='.$nmber_of_day,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json, text/json',
            'Accept-Language: th',
            'Authorization: Bearer GkijxeB2XqsBv0q3NgHADIjSuXVjl9(cyEw1oQ7XZ7u5Ug)vvFtb)N(aWhU80mSl2TC8GSlcc(B91Ab1rh91t1G=====2'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        $data_decoded = json_decode($response, JSON_UNESCAPED_UNICODE); // decode data from json
        
        $data['response'] = $data_decoded;
        // echo '<pre>';
        // print_r($data['response']);
        // die();
        

        // Accessing the "place_stops" array
        $data['places'] = $data_decoded['result']['days'][0]['place_stops'];
        // echo '<pre>';
        // print_r($data['places']);
        // die();
        
        return view('front.routeLists', $data);

        // end

    }

    /*
    GetAttractionDetail
    Get Attraction Details. Additional information about specified location such as open-close time, telephone number, email, etc.

    */
    public function attraction_detail(Request $request, $id){
        // $nmber_of_day = $request->day;
        $place_id = $id;

        // call apis
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://tatapi.tourismthailand.org/tatapi/v5/attraction/'.trim($place_id),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: 	application/json, text/json',
            'Accept-Language: th',
            'Authorization: Bearer GkijxeB2XqsBv0q3NgHADIjSuXVjl9(cyEw1oQ7XZ7u5Ug)vvFtb)N(aWhU80mSl2TC8GSlcc(B91Ab1rh91t1G=====2'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, JSON_UNESCAPED_UNICODE); // decode data from json
        // echo '<pre>';
        // print_r($data);
        // die();

        // end
        return view('front.detail', $data);

    }


}
