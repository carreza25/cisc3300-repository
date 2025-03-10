<?php

try {
    $charge = 100;
    
    if ($charge > 0) {
        throw new Exception("Charge needs to be negative!");
    }

} catch (Error $e) {
    echo "caught error";
}

?> 