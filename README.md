# Druid

> **This project has been deprecated by the authors. Use [ramsey/uuid](https://github.com/ramsey/uuid) instead.**


**Druid** is an [RFC-4122] compliant PHP library for generating and parsing universally unique identifiers (UUIDs).

    composer require icecave/druid

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
$uuid = $generator->generate();

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
