<?php
/*
FUNCTIONS CLASS:
LICENCE: CC

*/

$functions = new functions_core();
$functions->crypto = new functions_crypto();
$functions->crypto->encryption = new functions_crypto_encryption();
$functions->crypto->hash = new functions_crypto_hash();
$functions->crypto->encoding = new functions_crypto_encoding();
$functions->web = new functions_web();
$functions->settings = new functions_settings();

class functions_core
{
}

class functions_crypto
{
}

class functions_crypto_encryption
{
    public function AES256Decrypt($KEY, $IV, $content)
    {
        $string_to_decrypt = base64_decode($content);
        $rtn = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $KEY, $string_to_decrypt, MCRYPT_MODE_CBC, $IV);
        $rtn = rtrim($rtn, "\4");
        return($rtn);
    }

    public function AES256Encrypt($KEY, $IV, $content)
    {
        $rtn = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $KEY, $content, MCRYPT_MODE_CBC, $IV);
        $rtn = base64_encode($rtn);
        return($rtn);
    }

    public function help()
    {
        return "Encrypt: AES256Encrypt(key, iv, text) Decrypt: AES256Decrypt(key, iv, encrypted_text)";
    }
}

class functions_crypto_hash
{
    public function md5($str)
    {
        return hash("md5", $str);
    }
    public function sha1($str)
    {
        return hash("sha1", $str);
    }
    public function sha256($str)
    {
        return hash("sha256", $str);
    }
    public function sha512($str)
    {
        return hash("sha512", $str);
    }
}

class functions_crypto_encoding
{
    public function base64_encode($str)
    {
        return base64_encode($str);
    }
    public function base64_decode($str)
    {
        return base64_decode($str);
    }
}

class functions_settings
{
    public $useragent = "";
    public $self_proxy = false;
}

class functions_web
{
    public function get($url)
    {
        global $functions;

        $options  = array('http' => array('user_agent' => $functions->settings->useragent));
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return $response;
    }
    public function post($url, $data) // data as array
    {
        global $functions;
        $postdata = http_build_query($data);
        $opts = array('http' =>
        array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/x-www-form-urlencoded
User-Agent: '.$functions->settings->useragent,
          'content' => $postdata
        )
        );
        $context  = stream_context_create($opts);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
}

$functions->settings->useragent = "Functions.PHP /" .phpversion(). " (" .PHP_OS. "  " .$_SERVER["SERVER_SOFTWARE"].")  " . $_SERVER["HTTP_HOST"];
