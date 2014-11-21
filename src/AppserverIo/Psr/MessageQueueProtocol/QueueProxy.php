<?php

/**
 * AppserverIo\Psr\MessageQueueProtocol\QueueProxy
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Appserver
 * @package    Psr
 * @subpackage MessageQueueProtocol
 * @author     Tim Wagner <tw@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io-psr/messagequeueprotocol
 * @link       http://www.appserver.io
 */

namespace AppserverIo\Psr\MessageQueueProtocol;

use AppserverIo\Psr\MessageQueueProtocol\Queue;

/**
 * A proxy implementation for a queue.
 *
 * @category   Appserver
 * @package    Psr
 * @subpackage MessageQueueProtocol
 * @author     Tim Wagner <tw@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io-psr/messagequeueprotocol
 * @link       http://www.appserver.io
 */
class QueueProxy implements Queue
{

    /**
     * The queue name to use.
     *
     * @var string
     */
    protected $name = null;

    /**
     * Initializes the queue with the name to use.
     *
     * @param string $name Holds the queue name to use
     */
    private function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the queue name.
     *
     * @return string The queue name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Initializes and returns a new proxy instance for the passed queue.
     *
     * @param \AppserverIo\Psr\MessageQueueProtocol\Queue $queue The queue to create the proxy for
     *
     * @return \AppserverIo\Psr\MessageQueueProtocol\Queue The proxy instance
     */
    public static function createFromQueue(Queue $queue)
    {
        return new QueueProxy($queue->getName());
    }
}
