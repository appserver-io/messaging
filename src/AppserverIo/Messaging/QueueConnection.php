<?php

/**
 * AppserverIo\Messaging\QueueConnection
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

use Guzzle\Http\Client;
use Guzzle\Http\Exception\CurlException;
use AppserverIo\Psr\Pms\MessageInterface;
use AppserverIo\Properties\PropertiesInterface;
use AppserverIo\Properties\Properties;
use AppserverIo\Messaging\Utils\PropertyKeys;

/**
 * A connection implementation that handles the connection to the message queue.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class QueueConnection
{

    /**
     * The default transport to use.
     *
     * @var string
     */
    const DEFAULT_TRANSPORT = 'http';

    /**
     * The default client sockets IP address.
     *
     * @var string
     */
    const DEFAULT_ADDRESS = '127.0.0.1';

    /**
     * The default client sockets port.
     *
     * @var integer
     */
    const DEFAULT_PORT = 8587;

    /**
     * The default index file.
     *
     * @var string
     */
    const DEFAULT_INDEX_FILE = 'index.mq';

    /**
     * The name of the webapp using this client connection.
     *
     * @var string
     */
    protected $appName;

    /**
     * Holds an ArrayList with the initialized sessions.
     *
     * @var \ArrayObject
     */
    protected $sessions = null;

    /**
     * The message queue parser instance.
     *
     * @var \AppserverIo\Messaging\MessageQueueParser
     */
    protected $parser;

    /**
     * The HTTP client we use for connection to the persistence container.
     *
     * @var \Guzzle\Http\Client
     */
    protected $client;

    /**
     * The default properties for the context configuration.
     *
     * @var array
     */
    protected $defaultProperties = array(
        'transport' => QueueConnection::DEFAULT_TRANSPORT,
        'address'   => QueueConnection::DEFAULT_ADDRESS,
        'port'      => QueueConnection::DEFAULT_PORT,
        'indexFile' => QueueConnection::DEFAULT_INDEX_FILE
    );

    /**
     * Initializes the connection.
     *
     * @param string                                      $appName    Name of the webapp using this client connection
     * @param \AppserverIo\Properties\PropertiesInterface $properties The properties containing the connection parameters
     */
    public function __construct($appName = '', PropertiesInterface $properties = null)
    {

        // set the application name
        $this->appName = $appName;

        // initialize the message queue parser and the session
        $this->parser = new MessageQueueParser();
        $this->sessions = new \ArrayObject();

        // initialize the default properties if no ones has been passed
        if ($properties == null) {
            // initialize the default properties
            $properties = new Properties();
            foreach ($this->defaultProperties as $key => $value) {
                $properties->setProperty($key, $value);
            }
        }

        // inject the properties
        $this->injectProperties($properties);
    }

    /**
     * The properties used to create the connection.
     *
     * @param \AppserverIo\Properties\PropertiesInterface $properties The connection properties
     *
     * @return void
     */
    public function injectProperties(PropertiesInterface $properties)
    {
        $this->properties = $properties;
    }

    /**
     * Return's the properties used to create the connection.
     *
     * @return \AppserverIo\Properties\PropertiesInterface The connection properties
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Returns the parser to process the message.
     *
     * @return \AppserverIo\Messaging\MessageQueueParser The parser instance
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * Sets the clients webapp name
     *
     * @param string $appName Name of the webapp using this client connection
     *
     * @return void
     */
    public function setAppName($appName)
    {
        $this->appName = $appName;
    }

    /**
     * Returns the name of the webapp this connection is for
     *
     * @return string The webapp name
     */
    public function getAppName()
    {
        return $this->appName;
    }

    /**
     * Returns the IP address or domain name of the server the
     * message queue is running on.
     *
     * @return string Holds the server to connect to
     */
    public function getAddress()
    {
        return $this->getProperties()->getProperty(PropertyKeys::ADDRESS);
    }

    /**
     * Returns the port for the connection.
     *
     * @return integer The port to use
     */
    public function getPort()
    {
        return $this->getProperties()->getProperty(PropertyKeys::PORT);
    }

    /**
     * Returns the transport to use.
     *
     * @return string The transport to use.
     */
    public function getTransport()
    {
        return $this->getProperties()->getProperty(PropertyKeys::TRANSPORT);
    }

    /**
     * Returns the index file to use.
     *
     * @return string The index file to use.
     */
    public function getIndexFile()
    {
        return $this->getProperties()->getProperty(PropertyKeys::INDEX_FILE);
    }

    /**
     * Creates the connection to the container.
     *
     * @return void
     */
    public function connect()
    {
        $this->client = new Client($this->getBaseUrl());
    }

    /**
     * Shutdown the connection to the container.
     *
     * @return void
     */
    public function disconnect()
    {
        $this->client = null;
    }

    /**
     * Returns the socket the connection is based on.
     *
     * @return \Guzzle\Http\Client The socket instance
     */
    public function getSocket()
    {
        return $this->client;
    }

    /**
     * Sends a Message to the server by writing it to the socket.
     *
     * @param \AppserverIo\Psr\Pms\MessageInterface $message          Holds the message to send
     * @param boolean                               $validateResponse If this flag is TRUE, the queue connection validates the response code
     *
     * @return \AppserverIo\Messaging\QueueResponse The response of the message queue, or null
     *
     * @throws \Guzzle\Http\Exception\CurlException
     * @throws \Exception
     */
    public function send(MessageInterface $message, $validateResponse = false)
    {
        // connect to the server if necessary
        $this->connect();

        // serialize the message and write it to the socket
        $packed = MessageQueueProtocol::pack($message);

        // invoke the RMC with a number of retries
        $maxRetries = 0;
        $retry = true;
        while ($retry) {
            try {
                // send a POST request
                $request = $this->getSocket()->post($this->getPath(), array('timeout' => 5));
                $request->setBody($packed);
                $response = $request->send();

                $retry = false;

            } catch (CurlException $ce) {
                $maxRetries++;
                if ($maxRetries >= 5) {
                    $retry = false;
                    throw $ce;
                }
            }
        }

        // check if we should validate the response
        if ($validateResponse && $response->getStatusCode() !== 200) {
            throw new \Exception($response->getBody());
        }
    }

    /**
     * Prepares path for the connection to the persistence container.
     *
     * @return string The path to define the persistence container module
     */
    protected function getPath()
    {
        return sprintf('/%s/%s', $this->getAppName(), $this->getIndexFile());
    }

    /**
     * Prepares the base URL we used for the connection
     * to the persistence container.
     *
     * @return string The default base URL
     */
    protected function getBaseUrl()
    {
        return sprintf('%s://%s:%s', $this->getTransport(), $this->getAddress(), $this->getPort());
    }

    /**
     * Initializes a new queue session instance, registers it
     * in the array with the open sessions and returns it.
     *
     * @return \AppserverIo\Messaging\QueueSession The initialized queue session instance
     */
    public function createQueueSession()
    {
        return $this->sessions[] = new QueueSession($this);
    }
}
