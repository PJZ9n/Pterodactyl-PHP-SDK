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

namespace PJZ9n\PterodactylSDK\Objects\User;

/**
 * Class UserSettings
 *
 * This is used when creating and editing users.
 *
 * @package PJZ9n\PterodactylSDK\Objects\User
 */
class UserSettings
{
    
    /** @var string|null external_id */
    private $externalId;
    
    /** @var string username */
    private $userName;
    
    /** @var string email */
    private $email;
    
    /** @var string first_name */
    private $firstName;
    
    /** @var string last_name */
    private $lastName;
    
    /** @var string|null password */
    private $password;
    
    /** @var bool|null root_admin */
    private $rootAdmin;
    
    /** @var string|null language */
    private $language;
    
    /**
     * UserSettings constructor.
     *
     * @param string|null $externalId
     * @param string $userName
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string|null $password
     * @param bool|null $rootAdmin
     * @param string|null $language
     */
    public function __construct(?string $externalId, string $userName, string $email,
                                string $firstName, string $lastName, ?string $password, ?bool $rootAdmin, ?string $language)
    {
        $this->externalId = $externalId;
        $this->userName = $userName;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->rootAdmin = $rootAdmin;
        $this->language = $language;
    }
    
    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }
    
    /**
     * @param string|null $externalId
     */
    public function setExternalId(?string $externalId): void
    {
        $this->externalId = $externalId;
    }
    
    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }
    
    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }
    
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }
    
    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
    
    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
    
    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }
    
    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }
    
    /**
     * @return bool|null
     */
    public function getRootAdmin(): ?bool
    {
        return $this->rootAdmin;
    }
    
    /**
     * @param bool|null $rootAdmin
     */
    public function setRootAdmin(?bool $rootAdmin): void
    {
        $this->rootAdmin = $rootAdmin;
    }
    
    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    
    /**
     * @param string|null $language
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }
    
}