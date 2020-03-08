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

namespace PJZ9n\PterodactylSDK\Objects\Resource\Cpu;

/**
 * Class Cpu
 *
 * @package PJZ9n\PterodactylSDK\Objects\Resource\Cpu
 */
class Cpu
{
    
    /** @var float current */
    private $current;
    
    /** @var float[] cores */
    private $cores;
    
    /** @var int limit */
    private $limit;
    
    /**
     * Cpu constructor.
     *
     * @param float $current
     * @param float[] $cores
     * @param int $limit
     */
    public function __construct(float $current, array $cores, int $limit)
    {
        $this->current = $current;
        $this->cores = $cores;
        $this->limit = $limit;
    }
    
    /**
     * @return float
     */
    public function getCurrent(): float
    {
        return $this->current;
    }
    
    /**
     * @return float[]
     */
    public function getCores(): array
    {
        return $this->cores;
    }
    
    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
    
}