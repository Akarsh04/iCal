<?php

/*
 * This file is part of the eluceo/iCal package.
 *
 * (c) 2019 Markus Poerschke <markus@poerschke.nrw>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eluceo\iCal\Domain\Entity;

class Calendar
{
    private string $productIdentifier = '-//eluceo/ical//2.0/EN';

    /**
     * @var Event[]
     */
    private array $events = [];

    private function __construct(array $events)
    {
        array_walk($events, [$this, 'addEvent']);
    }

    public static function create(array $events = []): self
    {
        return new static($events);
    }

    public function getProductIdentifier(): string
    {
        return $this->productIdentifier;
    }

    public function setProductIdentifier(string $productIdentifier): self
    {
        $this->productIdentifier = $productIdentifier;

        return $this;
    }

    /**
     * @return Event[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        $this->events[] = $event;

        return $this;
    }
}