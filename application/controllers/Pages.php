<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


    public function index()
    {
      //  delete_page_index("pages");
       // create_page_index();
        echo("welcome to pages crawler");
        //$this->load->view('welcome_message');
    }



    public function search_pages($query=null)
    {
        if(empty($query))
        {
            $query=$this->input->post("phrase");
        }
       $results= search_pages($query);

        $publications=search_publications($query);
        
        $results_array=array();
        foreach($results['hits']['hits'] as $result)
        {


            $result['_source']['index']="pages";
            $result['_source']['label']=$result['_source']['title'];
            $result['_source']['category']="pages";
          $results_array[]=$result['_source'];


        }
   foreach($publications['hits']['hits'] as $publication)
        {


            $publication['_source']['index']="pages";
            $publication['_source']['label']=$publication['_source']['title'];
            $publication['_source']['category']="pages";
          $results_array[]=$publication['_source'];


        }

        echo(json_encode($results_array));




    }

    public function fetch_all_pages()
    {
        delete_page_index("pages");
        create_page_index();
       // $xmlData = file_get_contents('http://apps.unep.org/repository/api/v1/views/pages_search_api?limit=20');

        $pages=file(BASEPATH."../main-pages.dat");

       // print_r($pages);
        foreach($pages as $page)
        {
            $title=explode(",",$page)[0];
            $url=explode(",",$page)[1];



              $params = [
               'index' => 'pages',
               'type' => 'main_pages',


               'body' => [
                   'title' => $title,
                   'description' =>"",
                   'url' => $url


               ]
           ];

           index_page($params);
           unset($params);
       }




    }




}
