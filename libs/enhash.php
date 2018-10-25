<?php

class enhash {

    /**
     * 
     * @param Hash $algo function encrypt from PHP (sha128, sha256, md5, dsb)
     * @param String $data data
     * @param String $key key same like salt
     * @return encrypted data
     */
    public static function _hash_password($data, $key = HASH_PWD_KEY, $algo = HASH_PWD_ALGO) {
        $context = hash_init($algo, HASH_HMAC, $key);
        hash_update($context, $data);
        return hash_final($context);
    }
    

}
