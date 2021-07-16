<?php

declare(strict_types=1);

namespace App\Message;

use App\MessageQueue\QueueManager;

abstract class AbstractMessage
{
    public function getQueue(): string
    {
        return QueueManager::QUEUE_NORMAL_PRIORITY;
    }
}
