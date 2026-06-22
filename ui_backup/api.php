<?php

header('Content-Type: application/json');

$data = [
    "platform" => "MyEduConnect",
    "status" => "Running",
    "version" => "1.0"
];

echo json_encode($data);

?>
