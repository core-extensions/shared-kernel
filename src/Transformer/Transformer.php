<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Transformer;

use CoreExtensions\SharedKernel\Transformer\Exception\TransformationException;

interface Transformer
{
    /**
     * Transforms $fromObject to some another representation.
     *
     * @param mixed  $data
     * @param string $targetType
     * @param array  $context
     *
     * @throws TransformationException
     *
     * @return mixed
     */
    public function transform($data, string $targetType, array $context = []);

    /**
     * Checks that transformer can be used to transform $fromObject.
     *
     * @param mixed  $data
     * @param string $targetType
     * @param array  $context    transformation context
     *
     * @return bool
     */
    public function supportsTransformation($data, string $targetType, array $context = []): bool;
}
