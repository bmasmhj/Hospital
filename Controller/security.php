<?php

function chkcode($codex) {
    if (strpos($codex, "--") !== false) {
        return false  ; 
    }
    else if (strpos($codex, "=") !== false) {
        return false ;
    }
    else if (strpos($codex, "==") !== false) {
        return false ;
    }
    else if (strpos($codex, "===") !== false) {
        return false ;
    }
    else if (strpos($codex, "' or") !== false) {
        return false ;
    }
    else if (strpos($codex, "'or") !== false) {
        return false ;
    }
    else if (strpos($codex, "'") !== false) {
        return false;
    }
    else {
        for ($i = 0; $i < strlen($codex); $i++) {
            if ( ctype_digit($codex[$i]) ) {
                return false;
                break;
            }
            else {
                return true ;
            }
        }
    }
}

?>