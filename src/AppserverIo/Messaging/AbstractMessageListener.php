<?php

/**
 * AppserverIo\Messaging\AbstractMessageListener
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Messaging;

use AppserverIo\Psr\Pms\MessageInterface;
use AppserverIo\Psr\Pms\MessageListenerInterface;
use AppserverIo\Psr\Pms\MessageQueueException;
use AppserverIo\Psr\Pms\QueueContextInterface;

/**
 * An abstract implementation for a message listener.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
abstract class AbstractMessageListener implements MessageListenerInterface
{

    /**
     * The application instance that provides the entity manager.
     *
     * @var \AppserverIo\Psr\Application\ApplicationInterface
     * @Resource(name="ApplicationInterface")
     */
    protected $application;

    /**
     * Returns the application instance.
     *
     * @return \AppserverIo\Psr\Application\ApplicationInterface The application instance
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Updates the message monitor over the applications queue manager method.
     *
     * @param \AppserverIo\Psr\Pms\MessageInterface $message The message to update the monitor for
     *
     * @return void
     * @throws \AppserverIo\Psr\Pms\MessageQueueException Is thrown if no queue manager is registered in the application
     */
    protected function updateMonitor(MessageInterface $message)
    {

        // check if a application instance is available
        $queueManager = $this->getApplication()->search(QueueContextInterface::IDENTIFIER);
        if ($queueManager == null) {
            throw new MessageQueueException(
                sprintf('Can\'t find queue manager instance in application %s', $this->getApplication()->getName())
            );
        }

        // update the monitor
        $queueManager->updateMonitor($message);
    }
}
