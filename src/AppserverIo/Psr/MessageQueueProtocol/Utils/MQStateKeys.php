<?php

/**
 * AppserverIo\Psr\MessageQueueProtocol\Utils\MQStateKeys
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
 * @package    TechDivision_MessageQueueProtocol
 * @subpackage Utils
 * @author     Tim Wagner <tw@techdivision.com>
 * @author     Markus Stockbauer <ms@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_MessageQueueProtocol
 * @link       http://www.appserver.io
 */

namespace AppserverIo\Psr\MessageQueueProtocol\Utils;

/**
 * This class holds the priority keys used
 * as message state.
 *
 * @category   Appserver
 * @package    Psr
 * @subpackage MessageQueueProtocol
 * @author     Tim Wagner <tw@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io-psr/messagequeueprotocol
 * @link       http://www.appserver.io
 */
class MQStateKeys
{

    /**
     * Private constructor for marking
     * the class as utiltiy.
     */
    final protected function __construct()
    {
        /* Class is a utility class */
    }

    /**
     * Returns the initialized MQStateKey for the
     * passed priority key.
     *
     * @param integer $key The state key to return the instance for
     *
     * @return MQStateKey The instance
     */
    public static function get($key)
    {
        switch($key) { // check the passed key and return the requested MQStateKey instance
            case 1:
                return MQStateActive::get();
            case 2:
                return MQStatePaused::get();
            case 3:
                return MQStateToProcess::get();
            case 4:
                return MQStateInProgress::get();
            case 5:
                return MQStateProcessed::get();
            case 6:
                return MQStateFailed::get();
            case 7:
                return MQStateUnknown::get();
            default:
                throw new \Exception(sprintf('MQStateKey with key %s doesn\'t exist', $key));
        }
    }
}
