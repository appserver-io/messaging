<?php

/**
 * AppserverIo\Psr\MessageQueueProtocol\Utils\PriorityKeyLow
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
 * This class holds the PriorityKey used
 * for low priority messages.
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
class PriorityLow implements PriorityKey
{

    /**
     * Holds the key for messages with a low priority.
     * @var integer
     */
    const KEY = 1;

    /**
     * The string value for the low PriorityKey.
     * @var string
     */
    protected $priority = "low";

    /**
     * Private constructor for marking
     * the class as utility.
     */
    final protected function __construct()
    {
        /* Class is a utility class */
    }

    /**
     * Returns a new instance of the PriorityKey.
     *
     * @return PriorityLow The instance
     */
    public static function get()
    {
        return new PriorityLow();
    }

    /**
     * Returns the key value of the
     * PriorityKey instance.
     *
     * @return integer The key value
     */
    public function getPriority()
    {
        return PriorityLow::KEY;
    }

    /**
     * Returns the string value for the low PriorityKey.
     *
     * @return string The string value
     */
    public function __toString()
    {
        return $this->priority;
    }
}
