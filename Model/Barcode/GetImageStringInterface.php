<?php
declare(strict_types=1);

namespace Jayreis\Barcode\Model\Barcode;

use Laminas\Barcode\Renderer\Image;

interface GetImageStringInterface
{
    /**
     * Get an image string from a barcode image renderer object
     *
     * @return false|string
     */
    public function execute(Image $barcodeRenderer);
}
