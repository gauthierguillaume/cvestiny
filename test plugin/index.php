<?php

function get($resource){
    $apiUrl = 'http://localhost/projets/cvestiny/recruteur/wp-json';
    $json = file_get_contents($apiUrl.$resource);
    $result = json_decode($json);
}

// Interroge le service "/"
$api = get('/');

// Affiche le nom du site Wordpress
echo $api->name . ' ';

// Affiche la description du site Wordpress
echo $api->description;
echo '<br>';
$pages = get('/wp/v2/pages');

foreach ($pages as $page) {
    echo 'Page ' . $page->id . ' : ' . $page->slug . '<br>';
}
