# Druid

[![Build Status]](https://travis-ci.org/IcecaveStudios/druid)
[![Test Coverage]](https://coveralls.io/r/IcecaveStudios/druid?branch=develop)
[![SemVer]](http://semver.org)

**Druid** is a simple PHP library for generating universally unique identifiers (UUIDs).

* Install via [Composer](http://getcomposer.org) package [icecave/druid](https://packagist.org/packages/icecave/druid)
* Read the [API documentation](http://icecavestudios.github.io/druid/artifacts/documentation/api/)

## Example

```php
use Icecave\Druid\UuidVersion4Factory;
use Icecave\Druid\UuidInterface;

// First create a factory for the appropriate UUID version ...
$factory = new UuidVersion4Factory;

// The generate a UUID by calling create() ...
$uuid = $factory->create();

assert($uuid instanceof UuidInterface);
```

<!-- references -->
[Build Status]: https://travis-ci.org/IcecaveStudios/druid.png?branch=develop
[Test Coverage]: https://coveralls.io/repos/IcecaveStudios/druid/badge.png?branch=develop
[SemVer]: http://calm-shore-6115.herokuapp.com/?label=semver&value=0.0.0&color=red
