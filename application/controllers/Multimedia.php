<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia extends CI_Controller {


    public function index()
    {
        echo("welcome to multimedia crawler");
        //$this->load->view('welcome_message');
    }



    public function search_multimedia()
    {
        search_multimedia();
    }

    public function fetch_all_multimedia()
    {
        delete_multimedia_index("multimedia");
       // create_multimedia_index();
        $xmlData = file_get_contents('http://uneplive.unep.org/Json/multimedia?');
        $multimedia=json_decode($xmlData);
        //print_r($multimedia->media);

        $multimedia=$multimedia->media;
        //die();

        foreach($multimedia as $multimedia)
        {




            $params = [
                'index' => 'multimedia',
                'type' => 'multimedia',


                'body' => [
                    'title' => $multimedia->title,
                    'file_path' => $multimedia->file_path,
                    'abstract' => $multimedia->abstract,
                    'publish_date' => $multimedia->publish_date,
                    'img_path' => $multimedia->img_path,
                    'embed_type' => $multimedia->embed_type,
                    'embed_code' => $multimedia->embed_code


                ]
            ];

            index_multimedia($params);
            unset($params);
        }



    }


}
