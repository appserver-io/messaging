<?php

/**
 * AppserverIo\Messaging\Utils\PropertyKeys
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

namespace AppserverIo\Messaging\Utils;

/**
 * This class holds the property keys used to create the host connection.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class PropertyKeys
{

    /**
     * The property name with the host address.
     *
     * @var string
     */
    const ADDRESS = 'address';

    /**
     * The property name with the host port.
     *
     * @var string
     */
    const PORT = 'port';

    /**
     * The property name with the transport to use.
     *
     * @var string
     */
    const TRANSPORT = 'transport';

    /**
     * The property name with the index file to use.
     *
     * @var string
     */
    const INDEX_FILE = 'indexFile';

    /**
     * Private constructor for marking the class as utility.
     */
    final protected function __construct()
    {
        /* Class is a utility class */
    }
}
