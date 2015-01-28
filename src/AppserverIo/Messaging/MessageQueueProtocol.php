<?php

/**
 * AppserverIo\Messaging\MessageQueueProtocol
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
 * This is a parser for a native persistence container remote method call.
 *
 * A Remote method call must have the following format:
 *
 * <METHOD> <CONTENT-LENGTH> <PROTOCOL>/<VERSION>\r\n
 * <CONTENT>
 *
 * for example:
 *
 * MSG 12 MQ/1.0\r\n
 * czoxOiIxIjs=
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class MessageQueueProtocol
{

    /**
     * This is the line ending we use.
     *
     * @var string
     */
    const EOL = "\r\n";

    /**
     * Protocol identifier.
     *
     * @var string
     */
    const PROTOCOL = 'MQ';

    /**
     * Protocol version.
     *
     * @var string
     */
    const VERSION = '1.0';

    /**
     * Default message type.
     *
     * @var string
     */
    const MESSAGE_TYPE_MSG = 'MSG';

    /**
     * Response code for a successfully accepted message.
     *
     * @var integer
     */
    const STATUS_CODE_OK = 200;

    /**
     * Response code for a unknow message queue state.
     *
     * @var integer
     */
    const STATUS_CODE_UNKNOWN = 100;

    /**
     * Response code if we can't accept a message.
     *
     * @var string
     */
    const STATUS_CODE_INTERNAL_SERVER_ERROR = 500;

    /**
     * Array with the available response messages.
     *
     * @var array
     */
    protected static $responseMessages = array(
        MessageQueueProtocol::STATUS_CODE_OK => "OK",
        MessageQueueProtocol::STATUS_CODE_UNKNOWN => "Unknown",
        MessageQueueProtocol::STATUS_CODE_INTERNAL_SERVER_ERROR => "Internal Server Error"
    );

    /**
     * Prepares the header line for a remote method invocation request.
     *
     * @param string $string The packed remote method instance
     *
     * @return string The remote method invocation header for the passed remote method instance
     */
    public static function prepareMessageHeader($string)
    {
        return MessageQueueProtocol::prepareHeader(MessageQueueProtocol::MESSAGE_TYPE_MSG, $string);
    }

    /**
     * Prepares the result string that will be sent back to the client.
     *
     * @param integer $statusCode The status code we want to send back
     *
     * @return string The prepared result, read to send back
     */
    public static function prepareResult($statusCode)
    {
        // check if we have a valid status code
        if (!isset(MessageQueueProtocol::$responseMessages[$statusCode])) {
            $statusCode = MessageQueueProtocol::STATUS_CODE_UNKNOWN;
        }

        // prepare the header elements
        $protocol = MessageQueueProtocol::PROTOCOL;
        $version = MessageQueueProtocol::VERSION;

        // prepare the message result ready to be send back to the client
        return "$protocol/$version $statusCode " . MessageQueueProtocol::$responseMessages[$statusCode] . MessageQueueProtocol::EOL;
    }

    /**
     * Prepares the header line for the passed remote method.
     *
     * @param string $method The remote method to prepare the head for
     * @param string $string The packed remote method instance
     *
     * @return string The remote method header for the passed method
     */
    protected static function prepareHeader($method, $string)
    {
        // prepare the header elements
        $protocol = MessageQueueProtocol::PROTOCOL;
        $version = MessageQueueProtocol::VERSION;
        $contentLength = strlen($string);

        // concatenate the header string
        return "$method $contentLength $protocol/$version" . MessageQueueProtocol::EOL;
    }

    /**
     * Returns an array with the available response messages.
     *
     * @return array The array with the available response messages
     */
    public static function getResponseMessages()
    {
        return MessageQueueProtocol::$responseMessages;
    }

    /**
     * Packs the passed instance.
     *
     * @param object $instance The instance to be packed
     *
     * @return string The packed instance
     */
    public static function pack($instance)
    {
        return base64_encode(serialize($instance));
    }

    /**
     * Unpacks the passed instance.
     *
     * @param string $string The packed object instance.
     *
     * @return object The un-packed object instance
     */
    public static function unpack($string)
    {
        return unserialize(base64_decode($string));
    }
}
