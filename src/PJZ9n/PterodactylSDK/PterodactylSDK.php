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

use PJZ9n\PterodactylSDK\Errors\ApiRequestError;

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
            CURLOPT_FAILONERROR => true,
        ]);
        $result = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);
        if ($result === false) {
            throw new ApiRequestError($this, "Curl: " . $curlError);
        }
        $decodedResult = json_decode($result, true);
        if (json_last_error_msg() !== "No error") {
            throw new ApiRequestError($this, "Json Decode: " . json_last_error_msg());
        }
        if (!is_array($decodedResult)) {
            throw new ApiRequestError($this, "API returned not an array.");
        }
        return [
            "code" => $responseCode,
            "result" => $decodedResult,
        ];
    }
    
}