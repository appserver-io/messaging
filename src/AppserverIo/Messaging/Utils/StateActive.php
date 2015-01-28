<?php

/**
 * AppserverIo\Messaging\Utils\StateActive
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
 * This class holds the state key used for messages with the active state.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class StateActive implements StateKeyInterface
{

    /**
     * Holds the key for messages with an active state.
     *
     * @var integer
     */
    const KEY = 1;

    /**
     * The string value for the 'active' state key.
     *
     * @var string
     */
    protected $state = "active";

    /**
     * Protected constructor for marking the class as utility.
     */
    final protected function __construct()
    {
        /* Class is a utility class */
    }

    /**
     * Returns a new instance of the state key.
     *
     * @return \AppserverIo\Messaging\Utils\StateActive The instance
     */
    public static function get()
    {
        return new StateActive();
    }

    /**
     * Returns the key value of the state key instance.
     *
     * @return integer The key value
     */
    public function getState()
    {
        return StateActive::KEY;
    }

    /**
     * Returns the string value for the active state key.
     *
     * @return string The string value
     */
    public function __toString()
    {
        return $this->state;
    }
}
