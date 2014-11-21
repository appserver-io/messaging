<?php

/**
 * AppserverIo\Psr\MessageQueueProtocol\Message
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

/**
 * The interface for all messages.
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
interface Message
{

    /**
     * Returns the destination queue.
     *
     * @return \AppserverIo\Psr\MessageQueueProtocol\Queue The destination queue
     */
    public function getDestination();

    /**
    * Returns the message id as an
    * hash value..
    *
    * @return string The message id as hash value
    */
    public function getMessageId();

    /**
     * Returns the message itself.
     *
     * @return Object The message depending on the type of the Message object
     */
    public function getMessage();

    /**
     * Sets the unique session id.
     *
     * @param string $sessionId The uniquid id
     *
     * @return void
     */
    public function setSessionId($sessionId);

    /**
     * Returns the unique session id.
     *
     * @return string The uniquid id
     */
    public function getSessionId();

    /**
     * Returns the parent message.
     *
     * @return \AppserverIo\Psr\MessageQueueProtocol\Message The parent message
     */
    public function getParentMessage();

    /**
     * Returns the message monitor.
     *
     * @return \AppserverIo\Psr\MessageQueueProtocol\Monitor The monitor
     */
    public function getMessageMonitor();
}
