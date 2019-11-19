<?php
/*
 * This code was developed by NIMA SOFTWARE SRL | nimasoftware.com
 * For details contact contact@nimasoftware.com
 */

namespace Stev\BarcodeBundle\Service;

class BarcodeGenerator
{
    public function generateHtml(string $data)
    {
        // instantiate the barcode class
        $barcode = new \Com\Tecnick\Barcode\Barcode();

        // generate a barcode
        $bobj = $barcode->getBarcodeObj(
            'QRCODE,H',                     // barcode type and additional comma-separated parameters
            $data,          // data string to encode
            -4,                             // bar width (use absolute or negative value as multiplication factor)
            -4,                             // bar height (use absolute or negative value as multiplication factor)
            'black',                        // foreground color
            [-2, -2, -2, -2]           // padding (use absolute or negative values as multiplication factors)
        )->setBackgroundColor('white'); // background color

        // output the barcode as HTML div (see other output formats in the documentation and examples)
        $html = $bobj->getHtmlDiv();

        return $html;
    }
}