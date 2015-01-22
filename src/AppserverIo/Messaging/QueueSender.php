<?php

/**
 * AppserverIo\Messaging\QueueSender
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

use AppserverIo\Psr\Pms\Queue;
use AppserverIo\Psr\Pms\Message;
use AppserverIo\Messaging\QueueProxy;

/**
 * A queue sender implementation.
 *
 * @category  Library
 * @package   Messaging
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2014 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class QueueSender
{

    /**
     * Holds the queue instance used for sending the message.
     *
     * @var \AppserverIo\Psr\Pms\Queue
     */
    protected $queue = null;

    /**
     * Holds the queue session instance for sending the message.
     *
     * @var \AppserverIo\Messaging\QueueSession
     */
    protected $session = null;

    /**
     * Initializes the queue sender with the queue session and queue instance
     * to use for sending the message to the server.
     *
     * @param \AppserverIo\Messaging\QueueSession $session The queue session instance for sending the message
     * @param \AppserverIo\Psr\Pms\Queue          $queue   The queue instance used for sending the message
     */
    public function __construct(QueueSession $session, Queue $queue)
    {
        $this->session = $session;
        $this->queue = $queue;
    }

    /**
     * Sends the passed Message to the server.
     *
     * @param \AppserverIo\Psr\Pms\Message $message          The message to send
     * @param boolean                      $validateResponse If this flag is TRUE, the queue connection waits for the message queue response and validates it
     *
     * @return \AppserverIo\Messaging\QueueResponse The response of the message queue, or null
     */
    public function send(Message $message, $validateResponse = false)
    {

        // create a new queue proxy instance, because we want to send it over a network)
        $queueProxy = QueueProxy::createFromQueue($this->queue);

        // prepare and send the message
        $message->setDestination($queueProxy);
        $message->setSessionId($this->session->getId());
        return $this->session->send($message, $validateResponse);
    }
}
