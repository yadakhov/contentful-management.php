<?php

/**
 * This file is part of the contentful-management.php package.
 *
 * @copyright 2015-2017 Contentful GmbH
 * @license   MIT
 */

namespace Contentful\Management\Resource;

/**
 * Snapshot class.
 */
abstract class Snapshot extends BaseResource
{
    /**
     * @var ResourceInterface
     */
    protected $snapshot;

    /**
     * Snapshot constructor.
     */
    final public function __construct()
    {
        throw new \LogicException(sprintf(
            'Class "%s" can only be instantiated as a result of an API call, manual creation is not allowed.',
            static::class
        ));
    }

    /**
     * @return ResourceInterface
     */
    public function getSnapshot(): ResourceInterface
    {
        return $this->snapshot;
    }

    /**
     * Returns an array to be used by "json_encode" to serialize objects of this class.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'sys' => $this->sys,
            'snapshot' => $this->snapshot,
        ];
    }
}