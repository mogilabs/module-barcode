<?php
declare(strict_types=1);

namespace Mogilabs\Barcode\Model\Barcode;

use Mogilabs\Barcode\Api\Data\BarcodeOptionsInterface;
use Laminas\Barcode\Renderer\RendererInterface;

interface GenerateInterface
{
    public function execute(BarcodeOptionsInterface $barcodeOptions): RendererInterface;
}
