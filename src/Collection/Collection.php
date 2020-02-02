<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\Collection;

use CoreExtensions\SharedKernel\Feature\ArraySerializable;

/**
 * Basic collection interface.
 *
 * @template TKey
 * @template TNewKey
 * @template TElement
 * @template TNewElement
 * @template TResult
 *
 * @template-extends \ArrayAccess<TKey, TElement>
 * @template-extends \IteratorAggregate<TKey, TElement>
 */
interface Collection extends \ArrayAccess, \Countable, \IteratorAggregate, ArraySerializable
{
    /**
     * @return static
     *
     * @psalm-return static<TKey, TElement>
     */
    public static function empty(): self;

    /**
     * @param iterable $iterable
     *
     * @return static
     *
     * @psalm-param  iterable<array-key, mixed> $iterable
     *
     * @psalm-return static<TKey, TElement>
     */
    public static function fromIterable(iterable $iterable): self;

    /**
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * @param int|string $key
     *
     * @return null|mixed
     *
     * @psalm-param  TKey $key
     *
     * @psalm-return null|TElement
     */
    public function get($key);

    /**
     * @param int|string $key
     * @param mixed      $element
     *
     * @return static
     *
     * @psalm-param  TKey $key
     * @psalm-param  TElement $element
     *
     * @psalm-return static<TKey, TElement>
     */
    public function set($key, $element): self;

    /**
     * @param mixed $element
     *
     * @return static
     *
     * @psalm-param  TElement $element
     *
     * @psalm-return static<TKey, TElement>
     */
    public function add($element): self;

    /**
     * @param mixed $element
     *
     * @return static
     *
     * @psalm-param  TElement $element
     *
     * @psalm-return static<TKey, TElement>
     */
    public function remove($element): self;

    /**
     * @param int|string $key
     *
     * @return static
     *
     * @psalm-param  TKey $key
     *
     * @psalm-return static<TKey, TElement>
     */
    public function removeKey($key): self;

    /**
     * @return static
     *
     * @psalm-return static<TKey, TElement>
     */
    public function clear(): self;

    /**
     * @param mixed $element
     *
     * @return bool
     *
     * @psalm-param  TElement $element
     */
    public function contains($element): bool;

    /**
     * @param int|string $key
     *
     * @return bool
     *
     * @psalm-param TKey $key
     */
    public function containsKey($key): bool;

    /**
     * @return iterable|\Traversable
     *
     * @psalm-return iterable<int, TKey>|\Traversable<int, TKey>
     */
    public function keys(): iterable;

    /**
     * @return iterable|\Traversable
     *
     * @psalm-return iterable<int, TElement>|\Traversable<int, TElement>
     */
    public function values(): iterable;

    /**
     * @param callable $predicate
     *
     * @return bool
     *
     * @psalm-param callable(TElement, TKey=):bool $predicate
     */
    public function any(callable $predicate): bool;

    /**
     * @param callable $predicate
     *
     * @return bool
     *
     * @psalm-param callable(TElement, TKey=):bool $predicate
     */
    public function all(callable $predicate): bool;

    /**
     * @param callable $predicate
     *
     * @return static
     *
     * @psalm-param  callable(TElement, TKey=):bool $predicate
     *
     * @psalm-return static<TKey, TElement>
     */
    public function filter(callable $predicate): self;

    /**
     * @param callable $predicate
     *
     * @return static
     *
     * @psalm-param callable(TElement, TKey=):TNewElement $predicate
     *
     * @psalm-return static<TKey, TNewElement>
     */
    public function map(callable $predicate): self;

    /**
     * @param callable $predicate
     *
     * @return static
     *
     * @psalm-param callable(TElement, TKey=):TNewKey $predicate
     *
     * @psalm-return static<TNewKey, TElement>
     */
    public function mapKeys(callable $predicate): self;

    /**
     * @param callable   $predicate
     * @param null|mixed $initial
     *
     * @return mixed
     *
     * @psalm-param  callable(?TResult, TElement, TKey=):?TResult $predicate
     * @psalm-param  ?TResult $initial
     *
     * @psalm-return ?TResult
     */
    public function reduce(callable $predicate, $initial = null);

    /**
     * @param null|callable $comparator
     *
     * @return static
     *
     * @psalm-param (callable(TElement, TElement):int)|null $comparator
     *
     * @psalm-return static<TKey, TElement>
     */
    public function sort(callable $comparator = null): self;

    /**
     * @param null|callable $comparator
     *
     * @return static
     *
     * @psalm-param (callable(TKey, TKey):int)|null $comparator
     *
     * @psalm-return static<TKey, TElement>
     */
    public function sortKeys(callable $comparator = null): self;
}
