<?php

define("SITE",[
"name"=>"App Facilita | ",
"root"=>rtrim("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "/ "),
"viewpath"=> dirname(__DIR__, 1)."/views/themes",
"className"=>"Source\Controllers\\"

]);

define("URL_ATUAL", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
