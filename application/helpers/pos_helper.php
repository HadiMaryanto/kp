<?php

function chek_session()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
    if($session!='oke')
    {

        redirect('Welcome');

    }
}


function chek_session_login()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
    
    if($session=='oke')
    {

        redirect('Muzakki');
    }
    
}
?>
