<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geo extends CI_Controller {


    public function index()
    {
        echo("welcome to geos crawler");
        //$this->load->view('welcome_message');
    }



    public function search_geos()
    {
        search_geos();
    }

    public function fetch_all_geos()
    {
        delete_geo_index("geos");
        create_geo_index();
        $xmlData = file_get_contents('http://apps.unep.org/repository/api/v1/views/publications_search_api?limit=20');

        $geos=json_decode($xmlData);
        foreach($geos as $geo)
        {


            //print($geo->title);
            // die("dd");
            /* $params = [

                 'title' => $geo->title,
                 'description' => $geo->description,
                 'author' => $geo->author,
                 'division_office' => $geo->division_office,
                 'type' => $geo->type,
                 'date' => $geo->date,
                 'uneplive_geo' => $geo->uneplive_geo,
                 'free_keywords' => $geo->free_keywords,
                 'coverage' => $geo->coverage,
                 'subject' => $geo->subject,
                 'language' => $geo->language,
                 'downloads' => $geo->downloads,
                 'thumbnail' => $geo->thumbnail
             ];*/


            $params = [
                'index' => 'geos',
                'type' => 'publications',


                'body' => [
                    'title' => $geo->title,
                    'description' => $geo->description,
                    'author' => $geo->author,
                    'division_office' => $geo->division_office,
                    'type' => $geo->type,
                    'date' => $geo->date,
                    'uneplive_publication' => $geo->uneplive_publication,
                    'free_keywords' => $geo->free_keywords,
                    'coverage' => $geo->coverage,
                    'subject' => $geo->subject,
                    'language' => $geo->language,
                    'downloads' => $geo->downloads,
                    'thumbnail' => $geo->thumbnail


                ]
            ];

            index_geo($params);
            unset($params);
        }
        // create_geo_index();

        //delete_geo_index("geos");

        /* $curl = curl_init("http://127.0.0.1:9200/customer/external/1?pretty");
         $data = array(
             'name' => 'John'
         );
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         curl_setopt($curl, CURLOPT_HEADER, false);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

         curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(json_encode($data)));

 // Make the REST call, returning the result
         $response = curl_exec($curl);

         if (!$response) {
             die("Connection Failure.n");
         }
         else
             print $response;*/
    }


}
