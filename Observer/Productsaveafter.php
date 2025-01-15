<?php

namespace Lokeshyourfriend\MsgQueueBulkOperation\Observer;

use Magento\Framework\Event\ObserverInterface;

class Productsaveafter implements ObserverInterface {

    const TOPIC_NAME = 'lokeshyourfriend.msg.queue.bulk.operation.topic';

    private \Magento\Framework\MessageQueue\PublisherInterface $publisher;
    private \Lokeshyourfriend\MsgQueueBulkOperation\Model\ScheduleBulk $scheduleBulk;

    public function __construct(
            \Magento\Framework\MessageQueue\PublisherInterface $publisher,
            \Lokeshyourfriend\MsgQueueBulkOperation\Model\ScheduleBulk $scheduleBulk
    ) {
        $this->publisher = $publisher;
        $this->scheduleBulk = $scheduleBulk;
    }

    public function execute(\Magento\Framework\Event\Observer $observer) {
        $operationData = [];
        $operationData[] = ['entity_id' => $observer->getEvent()->getProduct()->getId()];
        $this->scheduleBulk->execute($operationData);
    }
}
