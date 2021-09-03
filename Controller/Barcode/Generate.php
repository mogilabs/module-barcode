<?php
declare(strict_types=1);

namespace Jayreis\Barcode\Controller\Barcode;

use Jayreis\Barcode\Api\Data\BarcodeOptionsInterface;
use Jayreis\Barcode\Api\Data\BarcodeOptionsInterfaceFactory;
use Jayreis\Barcode\Model\Barcode\GenerateInterface;
use Jayreis\Barcode\Model\Barcode\GetImageStringInterface;
use Laminas\Barcode\Renderer\Image;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;

class Generate implements HttpGetActionInterface
{
    private RequestInterface $request;
    private ResultFactory $resultFactory;
    private BarcodeOptionsInterfaceFactory $barcodeOptionsFactory;
    private GenerateInterface $generate;
    private GetImageStringInterface $getImageString;

    public function __construct(
        RequestInterface $request,
        ResultFactory $resultFactory,
        BarcodeOptionsInterfaceFactory $barcodeOptionsFactory,
        GenerateInterface $generate,
        GetImageStringInterface $getImageString
    ) {
        $this->request = $request;
        $this->resultFactory = $resultFactory;
        $this->barcodeOptionsFactory = $barcodeOptionsFactory;
        $this->generate = $generate;
        $this->getImageString = $getImageString;
    }

    /**
     * Returns raw response consisting of barcode image
     *
     * {@inheritDoc}
     */
    public function execute()
    {
        /** @var BarcodeOptionsInterface $barcodeOptions */
        $barcodeOptions = $this->barcodeOptionsFactory->create([
            'data' => $this->request->getParams()
        ]);

        /** @var Image $barcodeRenderer */
        $barcodeRenderer = $this->generate->execute($barcodeOptions);

        $imageString = $this->getImageString->execute($barcodeRenderer);

        $contentType = sprintf('image/%s', $barcodeRenderer->getImageType());

        return $this->resultFactory
            ->create(ResultFactory::TYPE_RAW)
            ->setContents($imageString)
            ->setHttpResponseCode(200)
            ->setHeader('Content-Type', $contentType);
    }
}
