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

use PJZ9n\PterodactylSDK\Errors\ApiGeneralError\InvalidArgumentError;
use PJZ9n\PterodactylSDK\Errors\ApiGeneralError\UserNotFoundError;
use PJZ9n\PterodactylSDK\Errors\ApiRequestError\ApiRequestError;
use PJZ9n\PterodactylSDK\Errors\ApiRequestError\ResponseError;
use PJZ9n\PterodactylSDK\Objects\User\User;
use PJZ9n\PterodactylSDK\Objects\User\UserSettings;

/**
 * Class ApplicationAPI
 *
 * @package PJZ9n\PterodactylSDK
 */
class ApplicationAPI extends PterodactylSDK
{
    
    /** @var string Application API Endpoint */
    private const APPLICATION_ENDPOINT = "/application";
    
    /**
     * Get All Users
     *
     * @return User[]
     *
     * @throws ApiRequestError
     */
    public function getUsers(): array
    {
        $users = [];
        //Get all pages
        for ($i = 1; true; $i++) {
            $response = $this->apiRequest("GET", self::APPLICATION_ENDPOINT . "/users", [
                "page" => $i,
            ]);
            $users = array_merge($users, $response["result"]["data"]);
            if ($i >= $response["result"]["meta"]["pagination"]["total_pages"]) {
                //Page end
                break;
            }
        }
        //to Attributes
        $userAttributes = [];
        foreach ($users as $user) {
            $userAttributes[] = $user["attributes"];
        }
        $users = [];
        foreach ($userAttributes as $userAttribute) {
            $users[] = new User(
                $userAttribute["id"],
                $userAttribute["external_id"],
                $userAttribute["uuid"],
                $userAttribute["username"],
                $userAttribute["email"],
                $userAttribute["first_name"],
                $userAttribute["last_name"],
                $userAttribute["language"],
                $userAttribute["root_admin"],
                $userAttribute["2fa"],
                $userAttribute["created_at"],
                $userAttribute["updated_at"]
            );
        }
        return $users;
    }
    
    /**
     * Get User
     *
     * @param int $id
     *
     * @return User
     *
     * @throws ApiRequestError
     * @throws UserNotFoundError
     */
    public function getUser(int $id): User
    {
        try {
            $response = $this->apiRequest("GET", self::APPLICATION_ENDPOINT . "/users/{$id}");
        } catch (ResponseError $responseError) {
            //Not Found User = 404
            if ($responseError->getCode() === 404) {
                throw new UserNotFoundError($this);
            }
            throw $responseError;
        }
        $userAttribute = $response["result"]["attributes"];
        $user = new User(
            $userAttribute["id"],
            $userAttribute["external_id"],
            $userAttribute["uuid"],
            $userAttribute["username"],
            $userAttribute["email"],
            $userAttribute["first_name"],
            $userAttribute["last_name"],
            $userAttribute["language"],
            $userAttribute["root_admin"],
            $userAttribute["2fa"],
            $userAttribute["created_at"],
            $userAttribute["updated_at"]
        );
        return $user;
    }
    
    /**
     * Get User By External ID
     *
     * @param string $externalId
     *
     * @return User
     *
     * @throws ApiRequestError
     * @throws UserNotFoundError
     */
    public function getUserByExternalId(string $externalId): User
    {
        try {
            $response = $this->apiRequest("GET", self::APPLICATION_ENDPOINT . "/users/external/{$externalId}");
        } catch (ResponseError $responseError) {
            //No ExternalID = 404 || Not Found User = 404
            if ($responseError->getCode() === 404) {
                throw new UserNotFoundError($this);
            }
            throw $responseError;
        }
        $userAttribute = $response["result"]["attributes"];
        $user = new User(
            $userAttribute["id"],
            $userAttribute["external_id"],
            $userAttribute["uuid"],
            $userAttribute["username"],
            $userAttribute["email"],
            $userAttribute["first_name"],
            $userAttribute["last_name"],
            $userAttribute["language"],
            $userAttribute["root_admin"],
            $userAttribute["2fa"],
            $userAttribute["created_at"],
            $userAttribute["updated_at"]
        );
        return $user;
    }
    
    /**
     * Create User
     *
     * @param UserSettings $userSettings
     *
     * @return User Created User
     *
     * @throws ApiRequestError
     * @throws InvalidArgumentError
     * @throws ResponseError
     */
    public function createUser(UserSettings $userSettings): User
    {
        try {
            $request = [
                "external_id" => $userSettings->getExternalId(),
                "username" => $userSettings->getUserName(),
                "email" => $userSettings->getEmail(),
                "first_name" => $userSettings->getFirstName(),
                "last_name" => $userSettings->getLastName(),
                "password" => $userSettings->getPassword(),
            ];
            if ($userSettings->getRootAdmin() !== null) {
                $request["root_admin"] = $userSettings->getRootAdmin();
            }
            if ($userSettings->getLanguage() !== null) {
                $request["language"] = $userSettings->getLanguage();
            }
            $response = $this->apiRequest("POST", self::APPLICATION_ENDPOINT . "/users", $request);
        } catch (ResponseError $responseError) {
            //Invalid Parameter = 422
            if ($responseError->getCode() === 422) {
                throw new InvalidArgumentError($this, "Invalid parameter.");//TODO Error Message By Response
            }
            throw $responseError;
        }
        $userAttribute = $response["result"]["attributes"];
        $user = new User(
            $userAttribute["id"],
            $userAttribute["external_id"],
            $userAttribute["uuid"],
            $userAttribute["username"],
            $userAttribute["email"],
            $userAttribute["first_name"],
            $userAttribute["last_name"],
            $userAttribute["language"],
            $userAttribute["root_admin"],
            $userAttribute["2fa"],
            $userAttribute["created_at"],
            $userAttribute["updated_at"]
        );
        return $user;
    }
    
    /**
     * Edit User
     *
     * @param int $id
     * @param UserSettings $userSettings
     *
     * @return User Edited User
     *
     * @throws ApiRequestError
     * @throws InvalidArgumentError
     * @throws UserNotFoundError
     * @throws ResponseError
     */
    public function editUser(int $id, UserSettings $userSettings): User
    {
        try {
            $request = [
                "external_id" => $userSettings->getExternalId(),
                "username" => $userSettings->getUserName(),
                "email" => $userSettings->getEmail(),
                "first_name" => $userSettings->getFirstName(),
                "last_name" => $userSettings->getLastName(),
                "password" => $userSettings->getPassword(),
            ];
            if ($userSettings->getRootAdmin() !== null) {
                $request["root_admin"] = $userSettings->getRootAdmin();
            }
            if ($userSettings->getLanguage() !== null) {
                $request["language"] = $userSettings->getLanguage();
            }
            $response = $this->apiRequest("PATCH", self::APPLICATION_ENDPOINT . "/users/{$id}", $request);
        } catch (ResponseError $responseError) {
            //Invalid Parameter = 422 || Not Found User = 404
            if ($responseError->getCode() === 422) {
                throw new InvalidArgumentError($this, "Invalid parameter.");//TODO Error Message By Response
            } else if ($responseError->getCode() === 404) {
                throw new UserNotFoundError($this);
            }
            throw $responseError;
        }
        $userAttribute = $response["result"]["attributes"];
        $user = new User(
            $userAttribute["id"],
            $userAttribute["external_id"],
            $userAttribute["uuid"],
            $userAttribute["username"],
            $userAttribute["email"],
            $userAttribute["first_name"],
            $userAttribute["last_name"],
            $userAttribute["language"],
            $userAttribute["root_admin"],
            $userAttribute["2fa"],
            $userAttribute["created_at"],
            $userAttribute["updated_at"]
        );
        return $user;
    }
    
    /**
     * Delete User
     *
     * @param int $id
     *
     * @throws ApiRequestError
     * @throws ResponseError
     * @throws UserNotFoundError
     */
    public function deleteUser(int $id): void
    {
        try {
            $response = $this->apiRequest("DELETE", self::APPLICATION_ENDPOINT . "/users/{$id}");
        } catch (ResponseError $responseError) {
            //Not Found User = 404
            if ($responseError->getCode() === 404) {
                throw new UserNotFoundError($this);
            }
            throw $responseError;
        }
    }
    
}