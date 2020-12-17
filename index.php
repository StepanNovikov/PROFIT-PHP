<?php

use App\Models\Article;

require __DIR__.'/autoload.php';


    
    $data = \App\Models\Article::findAll();


    
    echo "<pre>";
    print_r($data);
    echo "</pre>";
