<?php

/**
 * AppserverIo\Messaging\Utils\PriorityKeyMedium
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

use AppserverIo\Psr\Pms\PriorityKeyInterface;

/**
 * This class holds the priority key used for medium priority messages.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class PriorityMedium implements PriorityKeyInterface
{

    /**
     * Holds the key for messages with a medium priority.
     *
     * @var integer
     */
    const KEY = 2;

    /**
     * The string value for the medium priority key.
     *
     * @var string
     */
    protected $priority = "medium";

    /**
     * Private constructor for marking the class as utility.
     */
    final protected function __construct()
    {
        /* Class is a utility class */
    }

    /**
     * Returns a new instance of the priority key.
     *
     * @return \AppserverIo\Messaging\Utils\PriorityMedium The instance
     */
    public static function get()
    {
        return new PriorityMedium();
    }

    /**
     * Returns the key value of the priority key instance.
     *
     * @return integer The key value
     */
    public function getPriority()
    {
        return PriorityMedium::KEY;
    }

    /**
     * Returns the string value for the medium priority key.
     *
     * @return string The string value
     */
    public function __toString()
    {
        return $this->priority;
    }
}
