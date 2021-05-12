<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Encryption Keys
    |--------------------------------------------------------------------------
    |
    | Passport uses encryption keys while generating secure access tokens for
    | your application. By default, the keys are stored as local files but
    | can be set via environment variables when that is more convenient.
    |
    */
    'private_key' => '-----BEGIN RSA PRIVATE KEY-----
MIICXgIBAAKBgQDNjqqU52O0nL47E/SxwSKiniRJz+NIMsvPoMV0A6f8wWuncxLE
eYR436dzElFTJAHOk2qkeT6HX2VyrRxHFUJrtK4a3F1QuPoqZOvhxehO7mH4KkAz
TCNHQmGZZqD3gikyFxFHPYKOwr6Vit1kuRo4fznPYWFmnlDn3usWkKyA6wIDAQAB
AoGBALXOwodTJTfBDuwX2WxCw4yLTNNQINlhvCxXKW1UMod21+3R9L58MDPstSEt
CWr8xPBeKItyhWCcepD0Fbe1UPl2CNm+VcUV3gZ2taTzRvkXvbBDHF1GA0U4UcHI
7safW3rk+hZd3u1Dkcfrq3z17BWjN8Q1k0WFT1Lom7JWnHN5AkEA8dWMkVKH8EfQ
/6/Y3+6fFzYwXJ/nnzKGWCXXLdtZ+/iyx2DJ/pv3r2nhvP8wi0anhQh0RZbkiKUS
L6V9NisBPwJBANmZH4uSubd0T0vSXRk040sjq/5hjuEOgZf2uFtVKTh32TcRVzT5
xS099bjkdYuR6ccXtAYK0xj7+Gp937BOKVUCQQDBHVSo34zqVY8R/uxitfyY3o70
CEVAHWqmjWEtn1JWIh0xlZr4FLhPfW/kKqwrK/quAzhGMd7BN4A0SCSa0vClAkBR
rYCBy5mamzYIp/X6ODf5RHKTEdun7uIGQL4CynymjZYjbYbmg7rXuKI7vMXClgrC
iMsyWW3TuwEMOCN28l/hAkEA0D35CCMRio4/+GHS5qDM5c76D2ZaxXEDbZ1Iutl/
7Ijk1DUM5ih2NY7cWVliCQnu8nXkhoj3BiYPn2dJgwjqiQ==
-----END RSA PRIVATE KEY-----',

    'public_key' => '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDNjqqU52O0nL47E/SxwSKiniRJ
z+NIMsvPoMV0A6f8wWuncxLEeYR436dzElFTJAHOk2qkeT6HX2VyrRxHFUJrtK4a
3F1QuPoqZOvhxehO7mH4KkAzTCNHQmGZZqD3gikyFxFHPYKOwr6Vit1kuRo4fznP
YWFmnlDn3usWkKyA6wIDAQAB
-----END PUBLIC KEY-----',


    /*
    |--------------------------------------------------------------------------
    | Client UUIDs
    |--------------------------------------------------------------------------
    |
    | By default, Passport uses auto-incrementing primary keys when assigning
    | IDs to clients. However, if Passport is installed using the provided
    | --uuids switch, this will be set to "true" and UUIDs will be used.
    |
    */

    'client_uuids' => false,

    /*
    |--------------------------------------------------------------------------
    | Personal Access Client
    |--------------------------------------------------------------------------
    |
    | If you enable client hashing, you should set the personal access client
    | ID and unhashed secret within your environment file. The values will
    | get used while issuing fresh personal access tokens to your users.
    |
    */

    'personal_access_client' => [
        'id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
        'secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Passport Storage Driver
    |--------------------------------------------------------------------------
    |
    | This configuration value allows you to customize the storage options
    | for Passport, such as the database connection that should be used
    | by Passport's internal database models which store tokens, etc.
    |
    */

    'storage' => [
        'database' => [
            'connection' => env('DB_CONNECTION', 'mysql'),
        ],
    ],

];
