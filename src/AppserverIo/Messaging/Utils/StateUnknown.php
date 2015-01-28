<?php

/**
 * AppserverIo\Messaging\Utils\StateUnknown
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

use AppserverIo\Psr\Pms\StateKeyInterface;

/**
 * This class holds the state key used for messages with unknown state.
 *
 * Messages are turned to this state when they are running longer than ten minutes.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class StateUnknown implements StateKeyInterface
{

    /**
     * Holds the state key for failed messages.
     *
     * @var integer
     */
    const KEY = 7;

    /**
     * The string value for the 'unknown' state key.
     *
     * @var string
     */
    protected $state = "unknown";

    /**
     * Private constructor for marking the class as utility.
     */
    final protected function __construct()
    {
        /* Class is a utility class */
    }

    /**
     * Returns a new instance of the state key.
     *
     * @return \AppserverIo\Messaging\Utils\StateUnknown The instance
     */
    public static function get()
    {
        return new StateUnknown();
    }

    /**
     * Returns the key value of the state key instance.
     *
     * @return integer The key value
     */
    public function getState()
    {
        return StateUnknown::KEY;
    }

    /**
     * Returns the string value for the state key.
     *
     * @return string The string value
     */
    public function __toString()
    {
        return $this->state;
    }
}
