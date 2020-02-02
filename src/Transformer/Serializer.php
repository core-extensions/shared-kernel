<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Transformer;

use CoreExtensions\SharedKernel\Transformer\Exception\SerializationException;

interface Serializer
{
    public const FORMAT_OPTION = 'format';

    /**
     * Serializes data in the appropriate format.
     *
     * @param mixed  $data
     * @param string $format
     * @param array  $context
     *
     * @throws SerializationException
     *
     * @return string
     */
    public function serialize($data, string $format, array $context = []): string;

    /**
     * @param mixed  $data
     * @param string $format
     * @param array  $context
     *
     * @return bool
     */
    public function supportsSerialization($data, string $format, array $context = []): bool;

    /**
     * Deserializes data into the given type.
     *
     * @param string $data
     * @param string $targetType
     * @param string $format
     * @param array  $context
     *
     * @throws SerializationException
     *
     * @return mixed
     */
    public function deserialize($data, string $targetType, string $format, array $context = []);

    /**
     * @param mixed  $data
     * @param string $targetType
     * @param string $format
     * @param array  $context
     *
     * @return bool
     */
    public function supportsDeserialization($data, string $targetType, string $format, array $context = []): bool;
}
