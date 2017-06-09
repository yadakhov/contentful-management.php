<?php
/**
 * @copyright 2015-2017 Contentful GmbH
 * @license   MIT
 */

namespace Contentful\Management\Field\Validation;

class AssetImageDimensionsValidation implements ValidationInterface
{
    /**
     * @var int|null
     */
    private $minWidth;

    /**
     * @var int|null
     */
    private $maxWidth;

    /**
     * @var int|null
     */
    private $minHeight;

    /**
     * @var int|null
     */
    private $maxHeight;

    /**
     * AssetImageDimensionsValidation constructor.
     *
     * @param int|null $minWidth
     * @param int|null $maxWidth
     * @param int|null $minHeight
     * @param int|null $maxHeight
     */
    public function __construct(int $minWidth = null, int $maxWidth = null, int $minHeight = null, int $maxHeight = null)
    {
        $this->minWidth = $minWidth;
        $this->maxWidth = $maxWidth;
        $this->minHeight = $minHeight;
        $this->maxHeight = $maxHeight;
    }

    public static function getValidFieldTypes(): array
    {
        return ['Link'];
    }

    /**
     * @return int|null
     */
    public function getMinWidth()
    {
        return $this->minWidth;
    }

    /**
     * @param int|null $minWidth
     *
     * @return $this
     */
    public function setMinWidth(int $minWidth = null)
    {
        $this->minWidth = $minWidth;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxWidth()
    {
        return $this->maxWidth;
    }

    /**
     * @param int|null $maxWidth
     *
     * @return $this
     */
    public function setMaxWidth(int $maxWidth = null)
    {
        $this->maxWidth = $maxWidth;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinHeight()
    {
        return $this->minHeight;
    }

    /**
     * @param int|null $minHeight
     *
     * @return $this
     */
    public function setMinHeight(int $minHeight = null)
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxHeight()
    {
        return $this->maxHeight;
    }

    /**
     * @param int|null $maxHeight
     *
     * @return $this
     */
    public function setMaxHeight(int $maxHeight = null)
    {
        $this->maxHeight = $maxHeight;

        return $this;
    }

    public static function fromApiResponse(array $data): ValidationInterface
    {
        $values = $data['assetImageDimensions'];
        $minWidth = null;
        $maxWidth = null;
        $minHeight = null;
        $maxHeight = null;

        if (isset($values['width'])) {
            $widthValues = $values['width'];
            $minWidth = isset($widthValues['min']) ? $widthValues['min'] : null;
            $maxWidth = isset($widthValues['max']) ? $widthValues['max'] : null;
        }
        if (isset($values['height'])) {
            $heightValues = $values['height'];
            $minHeight = isset($heightValues['min']) ? $heightValues['min'] : null;
            $maxHeight = isset($heightValues['max']) ? $heightValues['max'] : null;
        }

        return new self($minWidth, $maxWidth, $minHeight, $maxHeight);
    }

    public function jsonSerialize()
    {
        $data = [];
        if ($this->minWidth !== null || $this->maxWidth !== null) {
            $withData = [];
            if ($this->minWidth !== null) {
                $withData['min'] = $this->minWidth;
            }
            if ($this->maxWidth !== null) {
                $withData['max'] = $this->maxWidth;
            }

            $data['width'] = (object) $withData;
        }
        if ($this->minHeight !== null || $this->maxHeight !== null) {
            $heightData = [];
            if ($this->minHeight !== null) {
                $heightData['min'] = $this->minHeight;
            }
            if ($this->maxHeight !== null) {
                $heightData['max'] = $this->maxHeight;
            }

            $data['height'] = (object) $heightData;
        }

        return (object) [
            'assetImageDimensions' => (object) $data
        ];
    }
}