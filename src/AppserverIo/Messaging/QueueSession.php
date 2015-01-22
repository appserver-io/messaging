<?php

/**
 * AppserverIo\Messaging\QueueSession
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

/**
 * The queue session implementation.
 *
 * @category  Library
 * @package   Messaging
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2014 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class QueueSession
{

    /**
     * Holds the QueueConnection instance to use for the server connect.
     *
     * @var \AppserverIo\Messaging\QueueConnection
     */
    protected $connection = null;

    /**
     * Holds the unique session id.
     *
     * @var string
     */
    protected $id = null;

    /**
     * Initializes the session with the QueueConnection instance
     * to use for the server connection.
     *
     * @param \AppserverIo\Messaging\QueueConnection $connection Holds the QueueConnection instance to use
     */
    public function __construct(QueueConnection $connection)
    {
        // initialize the internal connection
        $this->connection = $connection;
        // generate and return the unique session id
        return $this->id = md5(uniqid(rand(), true));
    }

    /**
     * Sends the passed Message instance to the server,
     * using the QueueConnection instance.
     *
     * @param \AppserverIo\Pms\Message $message          The message to send
     * @param boolean                  $validateResponse If this flag is true, the QueueConnection waits for the MessageQueue response and validates it
     *
     * @return \AppserverIo\Messaging\QueueResponse The response of the MessageQueue, or null
     */
    public function send(Message $message, $validateResponse)
    {
        return $this->connection->send($message, $validateResponse);
    }

    /**
     * Creates and returns a new QueueSender instance for sending
     * the Message to the server.
     *
     * @param \AppserverIo\Pms\Queue $queue the Queue instance to use for sending the message
     *
     * @return \AppserverIo\Messaging\QueueSender The initialized QueueSender instance
     */
    public function createSender(Queue $queue)
    {
        return new QueueSender($this, $queue);
    }

    /**
     * Returns the session id.
     *
     * @return string The unique id
     */
    public function getId()
    {
        return $this->id;
    }
}
