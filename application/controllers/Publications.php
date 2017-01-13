<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publications extends CI_Controller {


    public function index()
    {
        echo("welcome to publications crawler");
        //$this->load->view('welcome_message');
    }



    public function search_publications()
    {
        search_publications();
    }

    public function fetch_all_publications()
    {
        delete_publication_index("publications");
        create_publication_index();
        $xmlData = file_get_contents('http://apps.unep.org/repository/api/v1/views/publications_search_api?limit=20');

        $publications=json_decode($xmlData);
        foreach($publications as $publication)
        {


            //print($publication->title);
           // die("dd");
           /* $params = [

                'title' => $publication->title,
                'description' => $publication->description,
                'author' => $publication->author,
                'division_office' => $publication->division_office,
                'type' => $publication->type,
                'date' => $publication->date,
                'uneplive_publication' => $publication->uneplive_publication,
                'free_keywords' => $publication->free_keywords,
                'coverage' => $publication->coverage,
                'subject' => $publication->subject,
                'language' => $publication->language,
                'downloads' => $publication->downloads,
                'thumbnail' => $publication->thumbnail
            ];*/


            $params = [
                'index' => 'publications',
                'type' => 'publications',


                'body' => [
                    'title' => $publication->title,
                    'description' => $publication->description,
                    'author' => $publication->author,
                    'division_office' => $publication->division_office,
                    'type' => $publication->type,
                    'date' => $publication->date,
                    'uneplive_publication' => $publication->uneplive_publication,
                    'free_keywords' => $publication->free_keywords,
                    'coverage' => $publication->coverage,
                    'subject' => $publication->subject,
                    'language' => $publication->language,
                    'downloads' => $publication->downloads,
                    'thumbnail' => $publication->thumbnail


                ]
            ];

            index_publication($params);
            unset($params);
        }
       // create_publication_index();



        //delete_publication_index("publications");




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
