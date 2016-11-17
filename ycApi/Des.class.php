<?php  
    class Des  
    {  
        var $key;  
        var $iv; //偏移量  
          
        function DES($key,$iv=0 ) {  
        //key长度8例如:1234abcd  
            $this->key = $key;  
            if( $iv == 0 ) {  
                $this->iv = $key; //默认以$key 作为 iv  
            } else {  
                $this->iv = $iv; //mcrypt_create_iv ( mcrypt_get_block_size (MCRYPT_DES, MCRYPT_MODE_CBC), MCRYPT_DEV_RANDOM );  
            }  
        }  
          
        function encrypt($str) {  
        //加密，返回大写十六进制字符串  
            $size = mcrypt_get_block_size ( MCRYPT_DES, MCRYPT_MODE_CBC );  
            $str = $this->pkcs5Pad ( $str, $size );  
            return strtoupper( bin2hex( mcrypt_cbc(MCRYPT_DES, $this->key, $str, MCRYPT_ENCRYPT, $this->iv ) ) );  
        }  
          
        function decrypt($str) {  
        //解密  
            $strBin = $this->hex2bin( strtolower( $str ) );  
            $str = mcrypt_cbc( MCRYPT_DES, $this->key, $strBin, MCRYPT_DECRYPT, $this->iv );  
            $str = $this->pkcs5Unpad( $str );  
            return $str;  
        }  
          
        function hex2bin($hexData) {  
            $binData = "";  
            for($i = 0; $i < strlen ( $hexData ); $i += 2) {  
                $binData .= chr ( hexdec ( substr ( $hexData, $i, 2 ) ) );  
            }  
            return $binData;  
        }  
      
        function pkcs5Pad($text, $blocksize) {  
            $pad = $blocksize - (strlen ( $text ) % $blocksize);  
            return $text . str_repeat ( chr ( $pad ), $pad );  
        }  
          
        function pkcs5Unpad($text) {  
            $pad = ord ( $text {strlen ( $text ) - 1} );  
            if ($pad > strlen ( $text ))  
                return false;  
            if (strspn ( $text, chr ( $pad ), strlen ( $text ) - $pad ) != $pad)  
                return false;  
            return substr ( $text, 0, - 1 * $pad );  
        }  
          
    }  
?>  