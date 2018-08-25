# FUNCTIONS.php

This is an php class to include in your php projects. Functions.php maintains the exact same class structure as Functions.net (for .NET applications)
The encryption method used in both Functions.net and Functions.php are the exact same.


## Features

|                     | Description                                       |
|--------------------:|--------------------------------------------------:|
| AES-256-CBC ENCRYPT | Encrypts a string using the AES algorithm         |
| AES-256-CBC DECRYPT | Decrypts a string using the AES algorithm         |
| *Hash*              |                                                   |
| MD5                 | Hashs a string using MD5                          |
| SHA1                | Hashs a string using SHA1                         |
| SHA256              | Hashs a string using SHA256                       |
| SHA512              | Hashs a string using SHA512                       |
| *Encoding*          |                                                   |
| BASE64 ENCODE       | Encodes a string in base64                        |
| BASE64 DECODE       | Decodes a string in base64                        |
| *WEB*               |                                                   |
| GET                 | Makes an http get request with a custom useragent |
| POST                | Makes an http POST request with a custom useragent|

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
