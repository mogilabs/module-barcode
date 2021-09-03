<?php
declare(strict_types=1);

namespace Mogilabs\Barcode\Model\Barcode;

use Mogilabs\Barcode\Api\Data\BarcodeOptionsInterface;
use Laminas\Barcode\Barcode;
use Laminas\Barcode\Renderer\RendererInterface;
use Laminas\Config\ConfigFactory;
use Magento\Framework\DataObject\Factory;

class Generate implements GenerateInterface
{
    private ConfigFactory $configFactory;
    private Factory $dataObjectFactory;

    public function __construct(
        ConfigFactory $configFactory,
        Factory $dataObjectFactory
    ) {
        $this->configFactory = $configFactory;
        $this->dataObjectFactory = $dataObjectFactory;
    }

    public function execute(BarcodeOptionsInterface $barcodeOptions): RendererInterface
    {
        $defaults = $this->dataObjectFactory->create([
            'barcode_class' => 'code39',
            'barcode_text' => '00000',
            'barcode_image_type' => 'png',
        ]);

        $config = $this->configFactory->create([
            'array' => [
                'barcode' => $barcodeOptions->getS() ?: $defaults->getBarcodeClass(),
                'barcodeParams' => [
                    'text' => $barcodeOptions->getD() ?: $defaults->getBarcodeText()
                ],
                'renderer' => 'image',
                'rendererParams' => [
                    'imageType' => $barcodeOptions->getF() ?: $defaults->getBarcodeImageType()
                ],
            ]
        ]);

        return Barcode::factory($config);
    }
}
