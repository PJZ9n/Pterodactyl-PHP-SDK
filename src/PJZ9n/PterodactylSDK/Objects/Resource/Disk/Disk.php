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

namespace PJZ9n\PterodactylSDK\Objects\Resource\Disk;

/**
 * Class Disk
 *
 * @package PJZ9n\PterodactylSDK\Objects\Resource\Disk
 */
class Disk
{
    
    /** @var int current */
    private $current;
    
    /** @var int limit */
    private $limit;
    
    /**
     * Disk constructor.
     *
     * @param int $current
     * @param int $limit
     */
    public function __construct(int $current, int $limit)
    {
        $this->current = $current;
        $this->limit = $limit;
    }
    
    /**
     * @return int
     */
    public function getCurrent(): int
    {
        return $this->current;
    }
    
    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
    
}