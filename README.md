# Druid

[![Build Status]](https://travis-ci.org/IcecaveStudios/druid)
[![Test Coverage]](https://coveralls.io/r/IcecaveStudios/druid?branch=develop)
[![SemVer]](http://semver.org)

**Druid** is an [RFC-4122] compliant PHP library for generating and parsing universally unique identifiers (UUIDs).

* Install via [Composer](http://getcomposer.org) package [icecave/druid](https://packagist.org/packages/icecave/druid)
* Read the [API documentation](http://icecavestudios.github.io/druid/artifacts/documentation/api/)

## Examples

**Druid** provides a generator class for each supported UUID version. UUIDs are created by first instantiating the
generator for the desired UUID version, then calling the `create()` method.

All generator classes implement the `UuidGeneratorInterface` interface, and produce UUIDs that implement
`UuidInterface`.

### Generating UUIDs

#### Version 1 - Network address and time based identifier

```php
// Not yet implemented.
```

#### Version 2 - Network address and time based identifier, with POSIX user information

```php
// Not yet implemented.
```

#### Version 3 - Named-based MD5 hash identifer

```php
// Not yet implemented.
```

#### Version 4 - Randomly generated identifier

```php
$generator = new Icecave\Druid\UuidVersion4Generator;
$uuid = $generator->create();

assert($uuid instanceof Icecave\Druid\UuidInterface);
```

#### Version 5 - Name-based SHA-1 identifier

```php
// Not yet implemented.
```

### Parsing UUIDs

UUIDs can be constructed from hexadecimal strings and binary buffers using the `Uuid::fromString()` and
`Uuid::fromBinary()` methods, respectively.

```php
$uuidFromString = Icecave\Druid\Uuid::fromString(
    '550e8400-e29b-41d4-a716-446655440000'
);

$uuidFromBinary = Icecave\Druid\Uuid::fromBinary(
    "\x55\x0e\x84\x00\xe2\x9b\x41\xd4\xa7\x16\x44\x66\x55\x44\x00\x00"
);
```

<!-- references -->
[Build Status]: http://img.shields.io/travis/IcecaveStudios/druid/develop.svg
[Test Coverage]: http://img.shields.io/coveralls/IcecaveStudios/druid/develop.svg
[SemVer]: http://img.shields.io/:semver-1.0.0-green.svg
[RFC-4122]: http://tools.ietf.org/html/rfc4122
