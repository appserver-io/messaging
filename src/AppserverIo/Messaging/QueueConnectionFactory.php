<?php

/**
 * AppserverIo\Messaging\QueueConnectionFactory
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
 * A factory implementation for creating queue connections.
 *
 * @category  Library
 * @package   Messaging
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2014 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class QueueConnectionFactory
{

    /**
     * Private constructor to use class only in static context.
     *
     * @return void
     */
    protected function __construct()
    {
    }

    /**
     * Returns the queue connection instance as singleton.
     *
     * @param string $appName Name of the webapp using this client connection
     *
     * @return \AppserverIo\Messaging\QueueConnection The singleton instance
     */
    public static function createQueueConnection($appName)
    {
        return new QueueConnection($appName);
    }
}
