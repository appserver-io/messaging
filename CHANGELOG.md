# Version 0.4.1

## Bugfixes

* None

## Features

* Add dependency to rhumsaa/uuid composer dependency to genere unique message-IDs
* Generate message-IDs as UUID

# Version 0.4.0

## Bugfixes

* None

## Features

* Applied new file name and comment conventions
* Adapted to latest dependency changes

# Version 0.3.2

## Bugfixes

* Fixed invalid namespace in QueueConnection class

## Features

* None

# Version 0.3.1

## Bugfixes

* None

## Features

* Merge with appserver-io/messagequeueclient and make that package obsolete

# Version 0.3.0

## Bugfixes

* None

## Features

* Split package into appserver-io/messaging + appserver-io-psr/pms

# Version 0.2.6

## Bugfixes

* None

## Features

* Update constant IDENTIFIER to use short class name instead of fully qualified one

# Version 0.2.5

## Bugfixes

* Move composer dependenies to techdivision/application + techdivision/server to require-dev

## Features

* None

# Version 0.2.4

## Bugfixes

* None

## Features

* AbstractMessage class now implements \Serializable interface

# Version 0.2.3

## Bugfixes

* None

## Features

* Add new QueueProxy class as DTO to allow sending MessageQueue instance over a network

# Version 0.2.2

## Bugfixes

* Replace QueueContext::class with class name for PHP 5.4 compatibility
* Resolve some PHPMD errors/warnings

## Features

* None

# Version 0.2.1

## Bugfixes

* None

## Features

* Refactoring ANT PHPUnit execution process
* Composer integration by optimizing folder structure (move bootstrap.php + phpunit.xml.dist => phpunit.xml)
* Switch to new appserver-io/build build- and deployment environment