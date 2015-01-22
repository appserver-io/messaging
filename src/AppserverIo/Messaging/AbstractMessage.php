<?php

/**
 * AppserverIo\Messaging\AbstractMessage
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
use AppserverIo\Psr\Pms\Monitor;
use AppserverIo\Psr\Pms\Utils\StateKey;
use AppserverIo\Psr\Pms\Utils\PriorityKey;
use AppserverIo\Messaging\Utils\PriorityKeys;
use AppserverIo\Messaging\Utils\PriorityLow;
use AppserverIo\Messaging\Utils\StateKeys;
use AppserverIo\Messaging\Utils\StateActive;

/**
 * The abstract superclass for all messages.
 *
 * @category  Library
 * @package   Messaging
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2014 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
abstract class AbstractMessage implements Message, \Serializable
{

    /**
     * The unique session id.
     *
     * @var string
     */
    protected $sessionId = "";

    /**
     * The destination queue to send the message to.
     *
     * @var \AppserverIo\Psr\Pms\Queue
     */
    protected $destination = null;

    /**
     * The parent message.
     *
     * @var \AppserverIo\Psr\Pms\Message
     */
    protected $parentMessage = null;

    /**
     * The monitor for monitoring the message.
     *
     * @var \AppserverIo\Psr\Pms\Monitor
     */
    protected $messageMonitor = null;

    /**
     * The priority of the message, defaults to 'low'.
     *
     * @var integer
     */
    protected $priority = PriorityLow::KEY;

    /**
     * The state of the message, defaults to 'active'.
     *
     * @var integer
     */
    protected $state = StateActive::KEY;

    /**
     * The flag if the message should be deleted when finished or not.
     *
     * @var boolean
     */
    protected $locked = false;

    /**
     * Sets the unique session id.
     *
     * @param string $sessionId The uniquid id
     *
     * @return void
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    /**
     * Returns the unique session id.
     *
     * @return string The uniquid id
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Sets the destination queue.
     *
     * @param \AppserverIo\Psr\Pms\Queue $destination The destination queue
     *
     * @return void
     */
    public function setDestination(Queue $destination)
    {
        $this->destination = $destination;
    }

    /**
     * Returns the destination queue.
     *
     * @return \AppserverIo\Psr\Pms\Queue The destination queue
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Sets the priority of the message.
     *
     * @param \AppserverIo\Psr\Pms\PriorityKey $priority The priority to set the message to
     *
     * @return void
     */
    public function setPriority(PriorityKey $priority)
    {
        $this->priority = $priority->getPriority();
    }

    /**
     * Returns the priority of the message.
     *
     * @return \AppserverIo\Psr\Pms\Utils\PriorityKey The priority of the message
     */
    public function getPriority()
    {
        return PriorityKeys::get($this->priority);
    }

    /**
     * Sets the state of the message.
     *
     * @param \AppserverIo\Psr\Pms\StateKey $state The new state
     *
     * @return void
     */
    public function setState(StateKey $state)
    {
        $this->state = $state->getState();
    }

    /**
     * Returns the state of the message.
     *
     * @return \AppserverIo\Messaging\Utils\StateKey The message state
     */
    public function getState()
    {
        return StateKeys::get($this->state);
    }

    /**
     * Sets the parent message.
     *
     * @param \AppserverIo\Psr\Pms\Message $parentMessage The parent message
     *
     * @return void
     */
    public function setParentMessage(Message $parentMessage)
    {
        $this->parentMessage = $parentMessage;
    }

    /**
     * Returns the parent message.
     *
     * @return \AppserverIo\Psr\Pms\Message The parent message
     *
     * @see \AppserverIo\Psr\Pms\Message::getParentMessage()
     */
    public function getParentMessage()
    {
        return $this->parentMessage;
    }

    /**
     * Sets the monitor for monitoring the message itself.
     *
     * @param \AppserverIo\Psr\Pms\Monitor $messageMonitor The monitor
     *
     * @return void
     */
    public function setMessageMonitor(Monitor $messageMonitor)
    {
        $this->messageMonitor = $messageMonitor;
    }

    /**
     * Returns the message monitor.
     *
     * @return \AppserverIo\Psr\Pms\Monitor The monitor
     */
    public function getMessageMonitor()
    {
        return $this->messageMonitor;
    }

    /**
     * Locks the message.
     *
     * @return void
     */
    public function lock()
    {
        $this->locked = true;
    }

    /**
     * Unlocks the message.
     *
     * @return void
     */
    public function unlock()
    {
        $this->locked = false;
    }

    /**
     * Returns the message lock flag.
     *
     * @return boolean TRUE if the message is locked, else FALSE
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * Serializes the message and returns the serialized representation.
      *
     * @return string the string representation of the object or null
     * @link http://php.net/manual/en/serializable.serialize.php
     */
    public function serialize()
    {
        return serialize(get_object_vars($this));
    }

    /**
     * The serialized representation of the message.
     *
     * @param string $data The string representation of the object
     *
     * @return void
     * @link http://php.net/manual/en/serializable.unserialize.php
     */
    public function unserialize($data)
    {
        foreach (unserialize($data) as $propertyName => $propertyValue) {
            $this->$propertyName = $propertyValue;
        }
    }
}
