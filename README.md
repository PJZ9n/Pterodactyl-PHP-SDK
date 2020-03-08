# Pterodactyl-PHP-SDK

[![](https://img.shields.io/badge/license-GNU%20General%20Public%20License%20v3.0-yellow)](https://www.gnu.org/licenses/gpl-3.0.html)

## Overview
Language:
  - [English](#english)
  - [日本語](#日本語)

## 英語
Simple and lightweight Pterodactyl API SDK

### Feature
- Simply SDK
- Clean code
- No dependency on other libraries
- use the complement function of the IDE
- Can be used intuitively
- Object-oriented code

### Supported Action
Client API:
  - [x] Get All Servers
  - [x] Get Server (By ID)
  - [x] Get Resource (For example, get the amount of memory currently used)
  - [x] Send Console Command
  - [x] Send Power Action (For example, server start)
  
Application API:

Comming Soon...(Now Development)

### How to use
Run the following command in the command line
```shell script
composer require pjz9n/pterodactyl-php-sdk
```
Write the code!
```php
<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";

$url = "https://panel.example.com/api";
$key = "API Key";

$clientAPI = new \PJZ9n\PterodactylSDK\ClientAPI($url, $key);

echo "Server Counts: ";
try {
    echo count($clientAPI->getServers()) . PHP_EOL;
} catch (\PJZ9n\PterodactylSDK\Errors\PterodactylSDKError $pterodactylSDKError) {
    echo "Error: " . $pterodactylSDKError->getMessage();
}

$serverID = "1ab234c5";

echo "Start Server" . PHP_EOL;
try {
    $clientAPI->sendPowerAction($serverID, \PJZ9n\PterodactylSDK\Variables\PowerAction\PowerAction::POWERACTION_START);
} catch (\PJZ9n\PterodactylSDK\Errors\PterodactylSDKError $pterodactylSDKError) {
    echo "Error: " . $pterodactylSDKError->getMessage();
}

echo "Server Memory Limit: ";
try {
    echo $clientAPI->getResource($serverID)->getMemory()->getLimit() . "MB" . PHP_EOL;
} catch (\PJZ9n\PterodactylSDK\Errors\PterodactylSDKError $pterodactylSDKError) {
    echo "Error: " . $pterodactylSDKError->getMessage();
}

/*
 * Result
 * 
 * Server Counts: 100
 * Start Server
 * Server Memory Limit: 1000MB
 */
```

## 日本語
シンプルで軽量なPterodactyl APIのSDK

### 特徴
- シンプルなSDK
- クリーンなコード
- 他ライブラリへの依存性無し
- IDEによる補完を利用できる
- 直観的に扱える
- オブジェクト指向なコード

### サポートしている操作
Client API:
  - [x] 全てのサーバーを取得
  - [x] サーバーを取得 (IDから)
  - [x] リソースを取得 (例えば、現在使っているメモリの量を取得)
  - [x] コンソールコマンドを送信
  - [x] 電源アクションを送信 (例えば、サーバーの起動)
  
Application API:

Comming Soon...(開発中)

### 使い方
コマンドラインで以下のコマンドを実行する
```shell script
composer require pjz9n/pterodactyl-php-sdk
```
コードを書く！
```php
<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";

$url = "https://panel.example.com/api";
$key = "API Key";

$clientAPI = new \PJZ9n\PterodactylSDK\ClientAPI($url, $key);

echo "Server Counts: ";
try {
    echo count($clientAPI->getServers()) . PHP_EOL;
} catch (\PJZ9n\PterodactylSDK\Errors\PterodactylSDKError $pterodactylSDKError) {
    echo "Error: " . $pterodactylSDKError->getMessage();
}

$serverID = "1ab234c5";

echo "Start Server" . PHP_EOL;
try {
    $clientAPI->sendPowerAction($serverID, \PJZ9n\PterodactylSDK\Variables\PowerAction\PowerAction::POWERACTION_START);
} catch (\PJZ9n\PterodactylSDK\Errors\PterodactylSDKError $pterodactylSDKError) {
    echo "Error: " . $pterodactylSDKError->getMessage();
}

echo "Server Memory Limit: ";
try {
    echo $clientAPI->getResource($serverID)->getMemory()->getLimit() . "MB" . PHP_EOL;
} catch (\PJZ9n\PterodactylSDK\Errors\PterodactylSDKError $pterodactylSDKError) {
    echo "Error: " . $pterodactylSDKError->getMessage();
}

/*
 * 結果
 * 
 * Server Counts: 100
 * Start Server
 * Server Memory Limit: 1000MB
 */
```