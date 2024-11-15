<?php


function usersOnly($redirect = 'index.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You need to login first';
        $_SESSION['type'] = 'error';
        header('location: '. $redirect);
        exit(0);
    }
}

function adminOnly($redirect = 'adminonly.php')
{
        if (!empty($_SESSION['nome_gruppo'])){
        session_start();
        session_unset();
        session_destroy();
        header('location: '. $redirect);
        exit(0);
    }
    if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: '. $redirect);
        exit(0);
    }
}

function guestsOnly($redirect = 'index.php')
{
    if (isset($_SESSION['id'])) {
        header('location: '. $redirect);
        exit(0);
    }
}