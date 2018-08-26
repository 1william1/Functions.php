# FUNCTIONS.php

This is an php class to include in your php projects. Functions.php maintains the exact same class structure as Functions.net (for .NET applications)
The encryption method used in both Functions.net and Functions.php are the exact same.


## Features

|                     | Description                                       |
|:-------------------:|---------------------------------------------------|
| AES-256-CBC ENCRYPT | Encrypts a string using the AES algorithm         |
| AES-256-CBC DECRYPT | Decrypts a string using the AES algorithm         |
| *Hash*              |                                                   |
| MD5                 | Hashes a string using MD5                         |
| SHA1                | Hashes a string using SHA1                         |
| SHA256              | Hashes a string using SHA256                       |
| SHA512              | Hashes a string using SHA512                       |
| *Encoding*          |                                                   |
| BASE64 ENCODE       | Encodes a string in base64                        |
| BASE64 DECODE       | Decodes a string in base64                        |
| *WEB*               |                                                   |
| GET                 | Makes an http get request with a custom useragent |
| POST                | Makes an http POST request with a custom useragent|

## Download

Composer
```
composer require 1william1/functions-php
```
Git
```
git clone https://github.com/1william1/Functions.php.git
```

## Install
To use Functions.php in your own projects just include this command at the top of your code:
```php
include_once("Functions.php");
```

## Docs

Documentation on how to use these functions.

#### AES-256-CBC
Encrypt
```php
$encrypted = $functions->crypto->encryption->AES256Encrypt("Encryption key *32 chars only", "IV *32 chars only", "my string to encrypt");
echo $encrypted;
```
Decrypt
```php
$decrypted = $functions->crypto->encryption->AES256Decrypt("Encryption key *32 chars only", "IV *32 chars only", "encrypted string");
echo $decrypted;
```

#### Hash
MD5
```php
$hash = $functions->crypto->hash->md5("my string");
echo $hash;
```
SHA1
```php
$hash = $functions->crypto->hash->sha1("my string");
echo $hash;
```
SHA256
```php
$hash = $functions->crypto->hash->sha256("my string");
echo $hash;
```
SHA512
```php
$hash = $functions->crypto->hash->sha512("my string");
echo $hash;
```

#### Encoding
Base64 Encode
```php
$encoded = $functions->crypto->encoding->base64_encode("my string");
echo $encoded;
```
Base64 Decode
```php
$decoded = $functions->crypto->encoding->base64_decode("my string");
echo $decoded;
```

#### Web
settings
```
useragent
```

GET REQUEST
```php
$data = $functions->web->get("https://example.com");
echo $data;
```
POST REQUEST
```php
$post = array(
    "username"=>"myamazing_username",
    "password"=>"100%secure"
);
$data = $functions->web->post("https://example.com", $post);
echo $data;
```
