<?php

/**
 * Copyright (c) 2020 PJZ9n.
 *
 * This file is part of Pterodactyl-PHP-SDK.
 *
 * Pterodactyl-PHP-SDK is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Pterodactyl-PHP-SDK is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Pterodactyl-PHP-SDK.  If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace PJZ9n\PterodactylSDK;

use PJZ9n\PterodactylSDK\Errors\ApiRequestError\ApiRequestError;
use PJZ9n\PterodactylSDK\Errors\ApiRequestError\CurlError;
use PJZ9n\PterodactylSDK\Errors\ApiRequestError\JsonError;
use PJZ9n\PterodactylSDK\Errors\ApiRequestError\ResponseError;
use PJZ9n\PterodactylSDK\Errors\ApiRequestError\ReturnTypeError;

/**
 * Class PterodactylSDK
 *
 * @package PJZ9n\PterodactylSDK
 */
abstract class PterodactylSDK
{
    
    /**
     * @var string API URL
     * ex: https://pterodactyl.app/api
     */
    private $apiUrl;
    
    /**
     * @var string API KEY
     * ex: HogeFuga12345abc
     */
    private $apiKey;
    
    /**
     * PterodactylSDK constructor.
     *
     * @param string $apiUrl API URL
     * @param string $apiKey API KEY
     */
    public function __construct(string $apiUrl, string $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
    }
    
    /**
     * Get API URL
     *
     * @return string
     */
    final public function getApiUrl(): string
    {
        return $this->apiUrl;
    }
    
    /**
     * Get API KEY
     *
     * @return string
     */
    final public function getApiKey(): string
    {
        return $this->getAPIKey();
    }
    
    /**
     * @param string $method Request Method
     * @param string $endpoint API Endpoint
     * @param array|null $data Data
     *
     * @return array
     *
     * @throws ApiRequestError
     */
    protected function apiRequest(string $method, string $endpoint, ?array $data = null): array
    {
        $ch = curl_init();
        $header = [];
        if ($data !== null) {
            $header[] = "Content-Type: application/json";
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        $header[] = "Authorization: Bearer " . $this->apiKey;
        $header[] = "Accept: Application/vnd.pterodactyl.v1+json";
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->apiUrl . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $header,
            //CURLOPT_FAILONERROR => true,
        ]);
        $result = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $curlError = curl_error($ch);
        $curlErrorNo = curl_errno($ch);
        curl_close($ch);
        //Check curl errror
        if ($result === false) {
            throw new CurlError($this, $curlError, $curlErrorNo);
        }
        //Check response code
        if (substr((string)$responseCode, 0, 1) !== "2") {
            //No 2xx
            throw new ResponseError($this, "Response code " . $responseCode, $responseCode);
        }
        if ($responseCode === 204) {
            //No Content
            return [
                "code" => $responseCode,
                "result" => null,
            ];
        }
        $decodedResult = json_decode($result, true);
        //Check json error
        if (json_last_error_msg() !== "No error") {
            throw new JsonError($this, json_last_error_msg(), json_last_error());
        }
        //Check type
        if (!is_array($decodedResult)) {
            throw new ReturnTypeError($this, "API returned not an array.");
        }
        return [
            "code" => $responseCode,
            "result" => $decodedResult,
        ];
    }
    
}