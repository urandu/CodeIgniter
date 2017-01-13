<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


    public function index()
    {
        echo("welcome to pages crawler");
        //$this->load->view('welcome_message');
    }



    public function search_pages()
    {
        search_pages();
    }

    public function fetch_all_pages()
    {
        //delete_page_index("pages");
        create_page_index();
       // $xmlData = file_get_contents('http://apps.unep.org/repository/api/v1/views/pages_search_api?limit=20');

       // $pages=json_decode($xmlData);
       // foreach($pages as $page)
        //{


            //print($page->title);
           // die("dd");
           /* $params = [

                'title' => $page->title,
                'description' => $page->description,
                'author' => $page->author,
                'division_office' => $page->division_office,
                'type' => $page->type,
                'date' => $page->date,
                'uneplive_page' => $page->uneplive_page,
                'free_keywords' => $page->free_keywords,
                'coverage' => $page->coverage,
                'subject' => $page->subject,
                'language' => $page->language,
                'downloads' => $page->downloads,
                'thumbnail' => $page->thumbnail
            ];*/


          /*  $params = [
                'index' => 'pages',
                'type' => 'pages',


                'body' => [
                    'title' => $page->title,
                    'description' => $page->description,
                    'author' => $page->author,
                    'division_office' => $page->division_office,
                    'type' => $page->type,
                    'date' => $page->date,
                    'uneplive_page' => $page->uneplive_page,
                    'free_keywords' => $page->free_keywords,
                    'coverage' => $page->coverage,
                    'subject' => $page->subject,
                    'language' => $page->language,
                    'downloads' => $page->downloads,
                    'thumbnail' => $page->thumbnail


                ]
            ];

            index_page($params);
            unset($params);
        }*/
       // create_page_index();



        //delete_page_index("pages");




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
