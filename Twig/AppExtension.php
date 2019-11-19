<?php

namespace Stev\BarcodeBundle\Twig;

use Stev\BarcodeBundle\Service\BarcodeGenerator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{

    /**
     * @var BarcodeGenerator
     */
    private $barcodeGenerator;

    /**
     * AppExtension constructor.
     * @param BarcodeGenerator $barcodeGenerator
     */
    public function __construct(BarcodeGenerator $barcodeGenerator)
    {
        $this->barcodeGenerator = $barcodeGenerator;
    }


    public function getFilters()
    {
        return [];
    }

    public function getFunctions()
    {


        return [
            new TwigFunction('generateBarcode', [$this, 'generateBarcode']),
        ];


    }

    public function generateBarcode(string $data): string
    {
        return $this->barcodeGenerator->generateHtml($data);
    }

}