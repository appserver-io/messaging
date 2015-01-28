<?php

/**
 * AppserverIo\Messaging\Utils\StateKeys
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
 * This class holds the priority keys used as message state.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class StateKeys
{

    /**
     * Private constructor for marking the class as utility.
     */
    final protected function __construct()
    {
        /* Class is a utility class */
    }

    /**
     * Returns the initialized state key for the passed priority key.
     *
     * @param integer $key The state key to return the instance for
     *
     * @return \AppserverIo\Psr\Pms\StateKeyInterface The instance
     *
     * @throws \Exception
     */
    public static function get($key)
    {
        switch($key) { // check the passed key and return the requested state key instance
            case 1:
                return StateActive::get();
            case 2:
                return StatePaused::get();
            case 3:
                return StateToProcess::get();
            case 4:
                return StateInProgress::get();
            case 5:
                return StateProcessed::get();
            case 6:
                return StateFailed::get();
            case 7:
                return StateUnknown::get();
            default:
                throw new \Exception(sprintf('StateKey with key %s doesn\'t exist', $key));
        }
    }
}
