<?php

// cantoni.mobi utility functions

define ('SECRET', '2jnwpe0OOPnwSWfqdn');

/*
 * Hash function - URL combined with secret - use last 8 chars
 *
 */
function calcHash ($url) {
    $hash = hash_hmac ('sha1', $url, SECRET);
    $last = substr ($hash, strlen($hash)-9, 8);
    return ($last);
}

