<?php
declare(strict_types=1);

namespace Jayreis\Barcode\Model\Barcode;

use Laminas\Barcode\Renderer\Image;

class GetImageString implements GetImageStringInterface
{
    /**
     * {@inheritDoc}
     */
    public function execute(Image $barcodeRenderer)
    {
        // Get image resource for barcode
        $imageResource = $barcodeRenderer->draw();

        // Determine php image function (imagepng(), imagegif(), imagejpeg()) to call based on barcode image type
        $functionName = 'image' . $barcodeRenderer->getImageType();;

        // Capture the image data as a string
        $stream = fopen('php://memory', 'r+');
        $functionName($imageResource, $stream);
        rewind($stream);
        $imageString = stream_get_contents($stream);

        return $imageString;
    }
}
