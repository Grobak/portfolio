<?php

    require_once('html2pdf//html2pdf.class.php');

    // get the HTML
    ob_start();
    include(dirname('__FILE__').'/cv/cv.php');
    $content = ob_get_clean();

    $script = "";

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));

        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');

        // add js (not jquery)
        $html2pdf->pdf->IncludeJS($script);

        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        
        // send the PDF
        $html2pdf->Output('cv.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
