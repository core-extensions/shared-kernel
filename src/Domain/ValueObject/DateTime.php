<?php

/** @noinspection CallableParameterUseCaseInTypeContextInspection */
/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\Assert\Assert;
use CoreExtensions\SharedKernel\Domain\ValueObject;
use CoreExtensions\SharedKernel\Domain\ValueObjectTrait;
use CoreExtensions\SharedKernel\Feature\FloatSerializable;
use CoreExtensions\SharedKernel\Feature\IntegerSerializable;
use CoreExtensions\SharedKernel\Feature\StringSerializable;

/**
 * Actually this class should be final,
 * but there is an issue https://github.com/doctrine/instantiator/issues/39
 * related to doctrine/instantiator that can't correctly
 * instantiate final classes inherited from internal PHP classes.
 *
 * @final
 */
class DateTime extends \DateTimeImmutable implements
    ValueObject,
    StringSerializable,
    IntegerSerializable,
    FloatSerializable
{
    use ValueObjectTrait;

    /** @const string */
    public const FORMAT = 'Y-m-d\TH:i:s.uP';

    private function __construct(string $dateTime = 'now', \DateTimeZone $timezone = null)
    {
        parent::__construct($dateTime, $timezone ?? new \DateTimeZone('UTC'));
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public static function fromDateTime(\DateTimeInterface $dateTime): self
    {
        if ($dateTime instanceof \DateTime) {
            $dateTime = \DateTimeImmutable::createFromMutable($dateTime);
        }

        if ($dateTime instanceof \DateTimeImmutable && !$dateTime instanceof static) {
            $dateTime = $dateTime->setTimezone(new \DateTimeZone('UTC'));
            Assert::notEmpty($dateTime, 'DateTime object has UTC timezone.');
        }

        return new static($dateTime->format(static::FORMAT), $dateTime->getTimezone());
    }

    public static function fromFormat(
        string $dateTime,
        string $format = self::FORMAT,
        \DateTimeZone $timezone = null
    ): self {
        $dateTime = \DateTimeImmutable::createFromFormat($format, $dateTime, $timezone);
        Assert::notEmpty($dateTime, 'Invalid date/time format.');

        return static::fromDateTime($dateTime);
    }

    public static function fromTimestamp(int $timestamp): self
    {
        return static::fromFormat((string)$timestamp, 'U');
    }

    /**
     * @return static
     */
    public static function fromString(string $dateTime): StringSerializable
    {
        return static::fromFormat($dateTime);
    }

    /**
     * @return static
     */
    public static function fromInteger(int $timestamp): IntegerSerializable
    {
        return static::fromTimestamp($timestamp);
    }

    /**
     * @return static
     */
    public static function fromFloat(float $timestamp): FloatSerializable
    {
        return static::fromFormat((string)$timestamp, 'U.u');
    }

    public static function now(): self
    {
        return new static();
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return static
     */
    public static function createFromMutable($dateTime)
    {
        return static::fromDateTime($dateTime);
    }

    /**
     * @param string $format
     * @param string $dateTime
     *
     * @return static
     */
    public static function createFromFormat($format, $dateTime, \DateTimeZone $timezone = null)
    {
        return static::fromFormat($dateTime, $format, $timezone);
    }

    /**
     * @param \DateInterval $interval
     *
     * @return static
     */
    public function add($interval)
    {
        return static::fromDateTime(parent::add($interval));
    }

    /**
     * @param string $modify
     *
     * @return static
     */
    public function modify($modify)
    {
        return static::fromDateTime(parent::modify($modify));
    }

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     *
     * @return static
     */
    public function setDate($year, $month, $day)
    {
        return static::fromDateTime(parent::setDate($year, $month, $day));
    }

    /**
     * @param int $year
     * @param int $week
     * @param int $day
     *
     * @return static
     */
    public function setISODate($year, $week, $day = 1)
    {
        return static::fromDateTime(parent::setISODate($year, $week, $day));
    }

    /**
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param int $microseconds
     *
     * @return static
     */
    public function setTime($hour, $minute, $second = 0, $microseconds = 0)
    {
        return static::fromDateTime(parent::setTime($hour, $minute, $second, $microseconds));
    }

    /**
     * @param int $timestamp
     *
     * @return static
     */
    public function setTimestamp($timestamp)
    {
        return static::fromDateTime(parent::setTimestamp($timestamp));
    }

    /**
     * @param \DateTimeZone $timezone
     *
     * @return static
     */
    public function setTimezone($timezone)
    {
        return static::fromDateTime(parent::setTimezone($timezone));
    }

    /**
     * @param \DateInterval $interval
     *
     * @return static
     */
    public function sub($interval)
    {
        return static::fromDateTime(parent::sub($interval));
    }

    /**
     * @param string $format
     *
     * @return string
     */
    public function format($format): string
    {
        return parent::format($format ?: static::FORMAT);
    }

    public function toString(): string
    {
        return $this->format(static::FORMAT);
    }

    public function toScalar(): string
    {
        return $this->toString();
    }

    public function toFloat(): float
    {
        return (float)$this->format('U.u');
    }

    public function toInteger(): int
    {
        return $this->getTimestamp();
    }
}
