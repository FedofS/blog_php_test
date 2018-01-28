<?php

$connection = mysqli_connect(
    $config['db']['serer'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name']
);
mysqli_set_charset($connection,'utf8');

if ( $connection == false )
{
    echo 'Не получен доступ к базе!';
    echo mysqli_connect_error();
    exit();
    
}

?>