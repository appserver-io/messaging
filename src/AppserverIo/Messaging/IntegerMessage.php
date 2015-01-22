<?php

/**
 * AppserverIo\Messaging\IntegerMessage
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

/**
 * The implementation for sending a message containing
 * data encapsulated in a Integer.
 *
 * @category  Library
 * @package   Messaging
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2014 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class IntegerMessage extends AbstractMessage
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
     * @var integer
     */
    protected $message = null;

    /**
     * Initializes the message with the Integer
     * to send to the queue.
     *
     * @param integer $message The integer with the data to send
     *
     * @throws \Exception Is thrown if the passed message is not a valid integer value
     */
    public function __construct($message)
    {

        // check if we've an integer passed
        if (is_integer($message)) {

            // initialize the Integer sent with the message
            $this->message = $message;

            // initialize the message id
            $this->messageId = md5(uniqid(rand(), true));

            return;
        }

        // throw an exception if the message is no integer value
        throw new \Exception(sprintf('Message \'%s\' is not a valid integer', $message));
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
     * @return integer The message itself
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
        return "'" . $this->message . "'";
    }
}
