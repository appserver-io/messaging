<?php

/**
 * AppserverIo\Psr\MessageQueueProtocol\QueueResponseTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
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

namespace AppserverIo\Psr\MessageQueueProtocol;

/**
 * Test implementation for the QueueResponse class.
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
class QueueResponseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The instance we want to test.
     *
     * @var \AppserverIo\Psr\MessageQueueProtocol\QueueResponse
     */
    protected $queueResponse;

    /**
     * Initializes the method we wan to test.
     *
     * @return void
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->queueResponse = new QueueResponse(MessageQueueProtocol::STATUS_CODE_OK, 'test');
    }

    /**
     * Test the success() method.
     *
     * @return void
     */
    public function testSuccess()
    {
        $this->assertTrue($this->queueResponse->success());
    }
}
