<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ConnectionsBundle\Event;

use ONGR\ConnectionsBundle\Sync\Panther\PantherInterface;
use ONGR\ElasticsearchBundle\Document\DocumentInterface;

/**
 * SyncImportModifyEvent class - assigns data from doctrine item to Elasticsearch document.
 */
class SyncExecuteModifyEvent extends AbstractInitialSyncModifyEvent
{
    /**
     * Modifies EventItem.
     *
     * @param AbstractImportItem $eventItem
     */
    protected function modify(AbstractImportItem $eventItem)
    {
        /** @var SyncExecuteItem $eventItem */
        if ($eventItem->getPantherData()['type'] == PantherInterface::OPERATION_CREATE) {
            $this->assignDataToDocument($eventItem->getDocument(), $eventItem->getEntity());
        } elseif ($eventItem->getPantherData()['type'] == PantherInterface::OPERATION_UPDATE) {
            $this->assignDataToDocument($eventItem->getDocument(), $eventItem->getEntity());
        }
    }
}