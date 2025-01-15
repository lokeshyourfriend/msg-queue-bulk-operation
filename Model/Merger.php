<?php

namespace Lokeshyourfriend\MsgQueueBulkOperation\Model;

use Magento\Framework\MessageQueue\MergerInterface;

class Merger implements MergerInterface
{
   public function merge(array $messages)
   {
       return $messages;
   }
}
