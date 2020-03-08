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
 * Class User
 *
 * @package PJZ9n\PterodactylSDK\Objects\User
 */
class User
{
    
    /** @var int id */
    private $id;
    
    /** @var string|null external_id */
    private $externalId;
    
    /** @var string uuid */
    private $uuid;
    
    /** @var string username */
    private $userName;
    
    /** @var string email */
    private $email;
    
    /** @var string first_name */
    private $firstName;
    
    /** @var string last_name */
    private $lastName;
    
    /** @var string language */
    private $language;
    
    /** @var bool root_admin */
    private $rootAdmin;
    
    /** @var bool 2fa */
    private $twoFactor;
    
    /** @var string created_at */
    private $createdAt;
    
    /** @var string updated_at */
    private $updatedAt;
    
    /**
     * User constructor.
     *
     * @param int $id
     * @param string|null $externalId
     * @param string $uuid
     * @param string $userName
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $language
     * @param bool $rootAdmin
     * @param bool $twoFactor
     * @param string $createdAt
     * @param string $updatedAt
     */
    public function __construct(int $id, ?string $externalId, string $uuid, string $userName, string $email,
                                string $firstName, string $lastName, string $language, bool $rootAdmin,
                                bool $twoFactor, string $createdAt, string $updatedAt)
    {
        $this->id = $id;
        $this->externalId = $externalId;
        $this->uuid = $uuid;
        $this->userName = $userName;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->language = $language;
        $this->rootAdmin = $rootAdmin;
        $this->twoFactor = $twoFactor;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
    
    /**
     * To UserSettings Object
     *
     * Some non-existent values are set to null. Use the UserSettings Setter method.
     *
     * @return UserSettings
     *
     * @see UserSettings
     */
    public function toUserSettings(): UserSettings
    {
        return new UserSettings(
            null,
            $this->userName,
            $this->email,
            $this->firstName,
            $this->lastName,
            null,
            $this->rootAdmin,
            $this->language
        );
    }
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @return string|null
     */
    public function getExternalId()
    {
        return $this->externalId;
    }
    
    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
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
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }
    
    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }
    
    /**
     * @return bool
     */
    public function isRootAdmin(): bool
    {
        return $this->rootAdmin;
    }
    
    /**
     * @param bool $rootAdmin
     */
    public function setRootAdmin(bool $rootAdmin): void
    {
        $this->rootAdmin = $rootAdmin;
    }
    
    /**
     * @return bool
     */
    public function isTwoFactor(): bool
    {
        return $this->twoFactor;
    }
    
    /**
     * TODO
     *
     * @param bool $twoFactor
     */
    public function setTwoFactor(bool $twoFactor): void
    {
        $this->twoFactor = $twoFactor;
    }
    
    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
    
    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }
    
}