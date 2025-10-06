<?php

require 'app.php';

function incluirTemplate( string $nombre, bool $inicio = false ){
    include __DIR__ . "/templates/${nombre}.php"; 
}