<?php

$app->get("/", "HomeController:index");
$app->post("/buscar", "HomeController:buscar");
$app->get("/detalle/{id}", "HomeController:detalle");
$app->get("/servicio/{minimo}/{maximo}", "HomeController:servicio");
