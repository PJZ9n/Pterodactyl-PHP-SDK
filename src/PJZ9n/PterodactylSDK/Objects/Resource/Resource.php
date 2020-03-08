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

namespace PJZ9n\PterodactylSDK\Objects\Resource;

use PJZ9n\PterodactylSDK\Objects\Resource\Cpu\Cpu;
use PJZ9n\PterodactylSDK\Objects\Resource\Disk\Disk;
use PJZ9n\PterodactylSDK\Objects\Resource\Memory\Memory;

/**
 * Class Resource
 *
 * @package PJZ9n\PterodactylSDK\Objects\Resource
 */
class Resource
{
    
    /** @var bool state */
    private $state;
    
    /** @var Memory memory */
    private $memory;
    
    /** @var Cpu cpu */
    private $cpu;
    
    /** @var Disk disk */
    private $disk;
    
    /**
     * Resource constructor.
     *
     * @param bool $state
     * @param Memory $memory
     * @param Cpu $cpu
     * @param Disk $disk
     */
    public function __construct(bool $state, Memory $memory, Cpu $cpu, Disk $disk)
    {
        $this->state = $state;
        $this->memory = $memory;
        $this->cpu = $cpu;
        $this->disk = $disk;
    }
    
    /**
     * @return bool
     */
    public function isState(): bool
    {
        return $this->state;
    }
    
    /**
     * @return Memory
     */
    public function getMemory(): Memory
    {
        return $this->memory;
    }
    
    /**
     * @return Cpu
     */
    public function getCpu(): Cpu
    {
        return $this->cpu;
    }
    
    /**
     * @return Disk
     */
    public function getDisk(): Disk
    {
        return $this->disk;
    }
    
}