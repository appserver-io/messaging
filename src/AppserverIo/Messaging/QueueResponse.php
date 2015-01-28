<?php

/**
 * AppserverIo\Messaging\QueueResponse
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
 * A message queue response implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class QueueResponse
{

    /**
     * The message status.
     *
     * @var integer
     */
    protected $statusCode = MessageQueueProtocol::STATUS_CODE_UNKNOWN;

    /**
     * The message status message.
     *
     * @var string
     */
    protected $message = '';

    /**
     * Initializes the response with the parts splitted from the message queue response.
     *
     * @param integer $statusCode The response status from the queue
     * @param string  $message    The status message sent along with status code
     */
    public function __construct($statusCode, $message)
    {
        $this->statusCode = $statusCode;
        $this->message = $message;
    }

    /**
     * Returns true if the message was successfully delivered
     * to the message queue.
     *
     * @return boolean TRUE if the message was successfully delivered, else FALSE
     */
    public function success()
    {
        return $this->getStatusCode() === MessageQueueProtocol::STATUS_CODE_OK;
    }

    /**
     * Returns the status from the message queue response.
     *
     * @return integer The status itself
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Returns the status message from the message queue response.
     *
     * @return string The status message
     */
    public function getMessage()
    {
        return $this->message;
    }
}
