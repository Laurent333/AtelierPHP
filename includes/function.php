<?php

/**
 * Display the process result message
 * @param datas datas Result returned from a Query
 */
function displayDatasMessage($datas)
{
    if ( isset($datas['error']) ){
        $class = 'error';
    } else {
        $class = 'success';
    }
    echo '<div id="datasMessage" class="datas_message ' . $class . '">' . $datas['displayMessage'] . '</div>';
}