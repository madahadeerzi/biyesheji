<?php
function json($arr) {
    die(json_encode($arr));
}

function password($password){
    return sha1('af78q38gruifgreuiavg'.$password);
}