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

namespace PJZ9n\PterodactylSDK\Objects\Server\Limits;

/**
 * Class Limits
 *
 * @package PJZ9n\PterodactylSDK\Objects\Server\Limits
 */
class Limits
{
    
    /** @var int memory */
    private $memory;
    
    /** @var int swap */
    private $swap;
    
    /** @var int disk */
    private $disk;
    
    /** @var int io */
    private $io;
    
    /** @var int cpu */
    private $cpu;
    
    /**
     * Limits constructor.
     *
     * @param int $memory
     * @param int $swap
     * @param int $disk
     * @param int $io
     * @param int $cpu
     */
    public function __construct(int $memory, int $swap, int $disk, int $io, int $cpu)
    {
        $this->memory = $memory;
        $this->swap = $swap;
        $this->disk = $disk;
        $this->io = $io;
        $this->cpu = $cpu;
    }
    
    /**
     * @return int
     */
    public function getMemory(): int
    {
        return $this->memory;
    }
    
    /**
     * @param int $memory
     */
    public function setMemory(int $memory): void
    {
        $this->memory = $memory;
    }
    
    /**
     * @return int
     */
    public function getSwap(): int
    {
        return $this->swap;
    }
    
    /**
     * @param int $swap
     */
    public function setSwap(int $swap): void
    {
        $this->swap = $swap;
    }
    
    /**
     * @return int
     */
    public function getDisk(): int
    {
        return $this->disk;
    }
    
    /**
     * @param int $disk
     */
    public function setDisk(int $disk): void
    {
        $this->disk = $disk;
    }
    
    /**
     * @return int
     */
    public function getIo(): int
    {
        return $this->io;
    }
    
    /**
     * @param int $io
     */
    public function setIo(int $io): void
    {
        $this->io = $io;
    }
    
    /**
     * @return int
     */
    public function getCpu(): int
    {
        return $this->cpu;
    }
    
    /**
     * @param int $cpu
     */
    public function setCpu(int $cpu): void
    {
        $this->cpu = $cpu;
    }
    
}