<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 22/02/2020
 * Time: 14:22
 */

class TokenTest extends TestCase
{
    public function test_token_can_be_genarated(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:8088/api/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\n    \"email\": \"nanamensah1140@gmail.com\",\n    \"password\": \"password\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        

        $this->assertEquals(200,json_decode($response)->StatusCode);
    }
}