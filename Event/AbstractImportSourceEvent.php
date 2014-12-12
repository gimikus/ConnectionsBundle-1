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

use Doctrine\ORM\EntityManager;
use ONGR\ConnectionsBundle\Pipeline\Event\SourcePipelineEvent;
use ONGR\ElasticsearchBundle\ORM\Manager;

/**
 * Class AbstractImportSourceEvent - gets items from Doctrine, creates empty Elasticsearch documents.
 */
abstract class AbstractImportSourceEvent
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var string Type of source.
     */
    protected $entityClass;

    /**
     * @var Manager
     */
    protected $elasticSearchManager;

    /**
     * @var string Classname of Elasticsearch document. (e.g. Product).
     */
    protected $documentClass;

    /**
     * @param EntityManager $manager
     * @param string        $entityClass
     * @param Manager       $elasticSearchManager
     * @param string        $documentClass
     */
    public function __construct(EntityManager $manager, $entityClass, Manager $elasticSearchManager, $documentClass)
    {
        $this->entityManager = $manager;
        $this->entityClass = $entityClass;
        $this->elasticSearchManager = $elasticSearchManager;
        $this->documentClass = $documentClass;
    }

    /**
     * Gets data and adds source.
     *
     * @param SourcePipelineEvent $event
     */
    abstract public function onSource(SourcePipelineEvent $event);
}