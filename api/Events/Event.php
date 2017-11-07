<?php

namespace Healer\Api\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class Event
 *
 * @package Healer\Api\Events
 * @author  James Kirkby <jkirkby@protonmail.ch>
 */
abstract class Event
{
    use SerializesModels;
}
