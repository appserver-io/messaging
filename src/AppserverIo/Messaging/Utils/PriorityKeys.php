<?php

/**
 * AppserverIo\Messaging\Utils\PriorityKeys
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

/**
 * This class holds the priority keys used as message priority.
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
class PriorityKeys
{

    /**
     * Private constructor for marking the class as utility.
     */
    final protected function __construct()
    {
        /* Class is a utility class */
    }

    /**
     * Returns the initialized priority key for the passed priority key.
     *
     * @param integer $key The priority key to return the instance for
     *
     * @return \AppserverIo\Psr\Pms\PriorityKey The instance
     * @throws \Exception
     */
    public static function get($key)
    {
        switch($key) { // check the passed key and return the requested priority key instance
            case 1:
                return PriorityLow::get();
            case 2:
                return PriorityMedium::get();
            case 3:
                return PriorityHigh::get();
            default:
                throw new \Exception(sprintf('PriorityKey with key %s doesn\'t exist', $key));
        }
    }

    /**
     * Returns an array with all available priority keys.
     *
     * @return array The available priority keys
     */
    public static function getAll()
    {
        return array(PriorityLow::get(), PriorityMedium::get(), PriorityHigh::get());
    }
}
