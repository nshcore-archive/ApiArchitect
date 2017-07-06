<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class Event
 *
 * @package App\Events
 * @author  James Kirkby <jkirkby@protonmail.ch>
 */
abstract class Event
{
    use SerializesModels;
}
