<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Transformer;

interface FullStackTransformer extends Transformer, Serializer, Normalizer, Denormalizer
{
}
