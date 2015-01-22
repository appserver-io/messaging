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
 * @category  Library
 * @package   Messaging
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2014 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Messaging;

use AppserverIo\Psr\Application\ApplicationInterface;

/**
 * An abstract implementation for a message listener.
 *
 * @category  Library
 * @package   Messaging
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2014 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
abstract class AbstractMessageListener implements MessageListener
{

    /**
     * The application instance that provides the entity manager.
     *
     * @var \AppserverIo\Appserver\Core\Interfaces\ApplicationInterface
     */
    protected $application;

    /**
     * Initializes the session bean with the Application instance.
     *
     * Checks on every start if the database already exists, if not
     * the database will be created immediately.
     *
     * @param \AppserverIo\Appserver\Core\Interfaces\ApplicationInterface $application The application instance
     */
    public function __construct(ApplicationInterface $application)
    {
        $this->application = $application;
    }

    /**
     * Returns the application instance.
     *
     * @return \AppserverIo\Appserver\Core\Interfaces\ApplicationInterface The application instance
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Updates the message monitor over the applications queue manager method.
     *
     * @param \AppserverIo\Psr\Pms\Message $message The message to update the monitor for
     *
     * @return void
     * @throws \AppserverIo\Psr\Pms\MessageQueueException Is thrown if no queue manager is registered in the application
     */
    protected function updateMonitor(Message $message)
    {

        // check if a application instance is available
        $queueManager = $this->getApplication()->search('QueueContext');
        if ($queueManager == null) {
            throw new MessageQueueException(
                sprintf('Can\'t find queue manager instance in application %s', $this->getApplication()->getName())
            );
        }

        // update the monitor
        $queueManager->updateMonitor($message);
    }
}
