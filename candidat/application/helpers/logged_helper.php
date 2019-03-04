<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01/03/2019
 * Time: 16:54
 */


function is_logged()
{
    $ve =&get_instance();

    if(isset($ve->session->candidat) &&
        isset($ve->session->candidat['id']) &&
        isset($ve->session->candidat['email']) &&
        isset($ve->session->candidat['ip'])) {
        if($ve->session->candidat['ip'] == $_SERVER['REMOTE_ADDR']) {
            return true;
        }
    } else {
        return false;
    }
}