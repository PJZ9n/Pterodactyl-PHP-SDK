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

namespace PJZ9n\PterodactylSDK\Objects\Server;

use PJZ9n\PterodactylSDK\Objects\Server\FeatureLimits\FeatureLimits;
use PJZ9n\PterodactylSDK\Objects\Server\Limits\Limits;

/**
 * Class Server
 *
 * @package PJZ9n\PterodactylSDK\Objects\Server
 */
class Server
{
    
    /** @var bool server_owner */
    private $isOwner;
    
    /** @var string ideitifier */
    private $id;
    
    /** @var string uuid */
    private $uuid;
    
    /** @var string name */
    private $name;
    
    /** @var string description */
    private $description;
    
    /** @var Limits limits */
    private $limits;
    
    /** @var FeatureLimits feature_limits */
    private $featureLimits;
    
    /**
     * Server constructor.
     *
     * @param bool $isOwner
     * @param string $id
     * @param string $uuid
     * @param string $name
     * @param string $description
     * @param Limits $limits
     * @param FeatureLimits $featureLimits
     */
    public function __construct(bool $isOwner, string $id, string $uuid, string $name, string $description, Limits $limits, FeatureLimits $featureLimits)
    {
        $this->isOwner = $isOwner;
        $this->id = $id;
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->limits = $limits;
        $this->featureLimits = $featureLimits;
    }
    
    /**
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->isOwner;
    }
    
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    
    /**
     * @return Limits
     */
    public function getLimits(): Limits
    {
        return $this->limits;
    }
    
    /**
     * @param Limits $limits
     */
    public function setLimits(Limits $limits): void
    {
        $this->limits = $limits;
    }
    
    /**
     * @return FeatureLimits
     */
    public function getFeatureLimits(): FeatureLimits
    {
        return $this->featureLimits;
    }
    
    /**
     * @param FeatureLimits $featureLimits
     */
    public function setFeatureLimits(FeatureLimits $featureLimits): void
    {
        $this->featureLimits = $featureLimits;
    }
    
}