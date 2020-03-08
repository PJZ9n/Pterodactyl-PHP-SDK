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

namespace PJZ9n\PterodactylSDK\Objects\Server\FeatureLimits;

/**
 * Class FeatureLimits
 *
 * @package PJZ9n\PterodactylSDK\Objects\Server\FeatureLimits
 */
class FeatureLimits
{
    
    /** @var int databases */
    private $databases;
    
    /** @var int allocations */
    private $allocations;
    
    /**
     * FeatureLimits constructor.
     *
     * @param int $databases
     * @param int $allocations
     */
    public function __construct(int $databases, int $allocations)
    {
        $this->databases = $databases;
        $this->allocations = $allocations;
    }
    
    /**
     * @return int
     */
    public function getDatabases(): int
    {
        return $this->databases;
    }
    
    /**
     * @param int $databases
     */
    public function setDatabases(int $databases): void
    {
        $this->databases = $databases;
    }
    
    /**
     * @return int
     */
    public function getAllocations(): int
    {
        return $this->allocations;
    }
    
    /**
     * @param int $allocations
     */
    public function setAllocations(int $allocations): void
    {
        $this->allocations = $allocations;
    }
    
}