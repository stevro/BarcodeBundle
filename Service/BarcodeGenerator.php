<?php
/*
 * This code was developed by NIMA SOFTWARE SRL | nimasoftware.com
 * For details contact contact@nimasoftware.com
 */

namespace Stev\BarcodeBundle\Service;

use Com\Tecnick\Barcode\Barcode;
use Stev\BarcodeBundle\Model\Type;

class BarcodeGenerator
{

    /**
     * @var Barcode
     */
    private $generator;

    /**
     * BarcodeGenerator constructor.
     */
    public function __construct()
    {
        $this->generator = new \Com\Tecnick\Barcode\Barcode();
    }

    /**
     * Get the low level barcode generator to use it as you wish
     * @return Barcode
     */
    public function getGenerator(): Barcode
    {
        return $this->generator;
    }

    public function generateHtml(string $data, string $barcodeType = Type::QRCODE, array $params = []): string
    {

        $type = $barcodeType.','.implode(',', $params);

        // generate a barcode
        $bobj = $this->generator->getBarcodeObj(
            $type,                     // barcode type and additional comma-separated parameters
            $data,          // data string to encode
            -8,                             // bar width (use absolute or negative value as multiplication factor)
            -8,                             // bar height (use absolute or negative value as multiplication factor)
            'black',                        // foreground color
//            [-2, -2, -2, -2]           // padding (use absolute or negative values as multiplication factors)
        )->setBackgroundColor('white'); // background color

        // output the barcode as HTML div (see other output formats in the documentation and examples)
        $html = $bobj->getHtmlDiv();

        return $html;
    }
}