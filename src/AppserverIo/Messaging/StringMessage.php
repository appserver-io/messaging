<?php

/**
 * AppserverIo\Messaging\StringMessage
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

/**
 * The implementation for sending a message containing
 * data encapsulated in a string.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class StringMessage extends AbstractMessage
{

    /**
     * The message id as hash value.
     *
     * @var string
     */
    protected $messageId = null;

    /**
     * The message itself.
     *
     * @var string
     */
    protected $message = null;

    /**
     * Initializes the message with the String
     * to send to the queue.
     *
     * @param string $message The string with the data to send
     *
     * @throws \Exception Is thrown if the passed message is not a valid string value
     */
    public function __construct($message)
    {

        // check if we've an string passed
        if (is_string($message)) {
            // initialize the String sent with the message
            $this->message = $message;

            // initialize the message id
            $this->messageId = md5(uniqid(rand(), true));

            return;
        }

        // throw an exception if the message is no string value
        throw new \Exception(sprintf('Message \'%s\' is not a valid string', $message));
    }

    /**
     * Returns the message id.
     *
     * @return string The message id as hash value
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * The message itself.
     *
     * @return string The message itself
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Returns the message as string.
     *
     * @return string The message as string
     */
    public function __toString()
    {
        return $this->message;
    }
}
