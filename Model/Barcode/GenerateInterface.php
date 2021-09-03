<?php
declare(strict_types=1);

namespace Jayreis\Barcode\Model\Barcode;

use Jayreis\Barcode\Api\Data\BarcodeOptionsInterface;
use Laminas\Barcode\Renderer\RendererInterface;

interface GenerateInterface
{
    public function execute(BarcodeOptionsInterface $barcodeOptions): RendererInterface;
}
