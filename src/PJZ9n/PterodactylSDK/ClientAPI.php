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

use PJZ9n\PterodactylSDK\Objects\Server\FeatureLimits\FeatureLimits;
use PJZ9n\PterodactylSDK\Objects\Server\Limits\Limits;
use PJZ9n\PterodactylSDK\Objects\Server\Server;
use PJZ9n\PterodactylSDK\Errors\ApiRequestError;

/**
 * Class ClientAPI
 *
 * @package PJZ9n\PterodactylSDK
 */
class ClientAPI extends PterodactylSDK
{
    
    /** @var string Client API Endpoint */
    private const CLIENT_ENDPOINT = "/client";
    
    /**
     * Get All Servers
     *
     * @return Server[]
     *
     * @throws ApiRequestError
     */
    public function getServers(): array
    {
        $servers = [];
        //Get all pages
        for ($i = 1; true; $i++) {
            $response = $this->apiRequest("GET", self::CLIENT_ENDPOINT, [
                "page" => $i,
            ]);
            $servers = array_merge($servers, $response["result"]["data"]);
            if ($i >= $response["result"]["meta"]["pagination"]["total_pages"]) {
                //Page end
                break;
            }
        }
        //to Attributes
        $serverAttributes = [];
        foreach ($servers as $server) {
            $serverAttributes[] = $server["attributes"];
        }
        $servers = [];
        foreach ($serverAttributes as $serverAttribute) {
            $servers[] = new Server(
                $serverAttribute["server_owner"],
                $serverAttribute["identifier"],
                $serverAttribute["uuid"],
                $serverAttribute["name"],
                $serverAttribute["description"],
                new Limits(
                    $serverAttribute["limits"]["memory"],
                    $serverAttribute["limits"]["swap"],
                    $serverAttribute["limits"]["disk"],
                    $serverAttribute["limits"]["io"],
                    $serverAttribute["limits"]["cpu"]
                ),
                new FeatureLimits(
                    $serverAttribute["feature_limits"]["databases"],
                    $serverAttribute["feature_limits"]["allocations"]
                )
            );
        }
        return $servers;
    }
    
}