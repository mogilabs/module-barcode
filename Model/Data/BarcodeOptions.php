<?php
declare(strict_types=1);

namespace Jayreis\Barcode\Model\Data;

use Jayreis\Barcode\Api\Data\BarcodeOptionsInterface;
use Magento\Framework\DataObject;

class BarcodeOptions extends DataObject implements BarcodeOptionsInterface
{
    /**
     * @inheritDoc
     */
    public function getF(): ?string
    {
        return $this->getData(self::F);
    }

    /**
     * @inheritDoc
     */
    public function setF(?string $f): void
    {
        $this->setData(self::F, $f);
    }

    /**
     * @inheritDoc
     */
    public function getS(): ?string
    {
        return $this->getData(self::S);
    }

    /**
     * @inheritDoc
     */
    public function setS(?string $s): void
    {
        $this->setData(self::S, $s);
    }

    /**
     * @inheritDoc
     */
    public function getD(): ?string
    {
        return $this->getData(self::D);
    }

    /**
     * @inheritDoc
     */
    public function setD(?string $d): void
    {
        $this->setData(self::D, $d);
    }
}
