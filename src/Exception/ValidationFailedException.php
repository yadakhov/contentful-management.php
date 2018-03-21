<?php

/**
 * This file is part of the contentful-management.php package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */
declare(strict_types=1);

namespace Contentful\Management\Exception;

use Contentful\Core\Api\Exception;

/**
 * ValidationFailedException class.
 *
 * A ValidationFailedException is thrown when persisting an object
 * that's in an invalid state.
 */
class ValidationFailedException extends Exception
{
}