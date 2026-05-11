<?php

function actif($page)
{
    $page_courante = basename($_SERVER['PHP_SELF']);

    return ($page_courante === $page)
        ? 'class="actif"'
        : '';
}


?>