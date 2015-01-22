<?php

/**
 * AppserverIo\Messaging\Utils\PriorityKeyHigh
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Library
 * @package    Messaging
 * @subpackage Utils
 * @author     Tim Wagner <tw@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io/messaging
 * @link       http://www.appserver.io
 */

namespace AppserverIo\Messaging\Utils;

use AppserverIo\Psr\Pms\PriorityKey;

/**
 * This class holds the priority key used for high priority messages.
 *
 * @category   Library
 * @package    Messaging
 * @subpackage Utils
 * @author     Tim Wagner <tw@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io/messaging
 * @link       http://www.appserver.io
 */
class PriorityHigh implements PriorityKey
{

    /**
     * Holds the key for messages with a high priority.
     *
     * @var integer
     */
    const KEY = 3;

    /**
     * The string value for the high priority key.
     *
     * @var string
     */
    protected $priority = "high";

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
     * @return \AppserverIo\Messaging\Utils\PriorityHigh The instance
     */
    public static function get()
    {
        return new PriorityHigh();
    }

    /**
     * Returns the key value of the priority key instance.
     *
     * @return integer The key value
     */
    public function getPriority()
    {
        return PriorityHigh::KEY;
    }

    /**
     * Returns the string value for the high priority key.
     *
     * @return string The string value
     */
    public function __toString()
    {
        return $this->priority;
    }
}
