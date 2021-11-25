<?php require_once("tcpdf/tcpdf.php"); ?>
<?php
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);

    // add a page
    $pdf->AddPage();
    $pdf->SetFont('times','',10);
    
    $html = "";
    $html1 = "";
    
    $html .= '<html>
        	<body style="width: 100%;">
                <table style="width: 100%;min-height: 300px;background-color: #2D7ABE;background-size: contain;" cellpadding="10">
                    <tr>
                        <td width="30%" align="center">
                            <img src="assets/images/user.jpg" style="border-radius: 50%;width: 100px;margin-top: 50px;margin-left: 50px;" />
                        </td>
                        <td width="70%">
                            <span style="text-transform: uppercase;color: #FFF;font-size:17px;">Hello! My name is Amarshi Jamod</span>
                            <br /><br />
                            <span style="color: #fff;">In publishing and graphic design, lorem ipsum is a filler text or greeking commonly used to demonstrate the textual elements of a graphic document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.</span>
                        </td>
                    </tr>
                </table>
                <br /><br />
                
                <table style="width: 100%;" cellpadding="10">
                    <tr style="background-color: #F2F2F2;">
                        <th>PHONE:</th>
                        <th>EMAIL:</th>
                    </tr>
                    <tr>
                        
                        
                    </tr>
                </table>
        	</body>
        </html>';
    
    //echo $html;exit;
    $html1 = '<div style="width: 100%;background-color: #2D7ABE;background-size: contain;">
                    <div style="width: 20%;border:1px solid red;">
                        <img src="assets/images/user.jpg" style="border-radius: 50%;width: 100px;margin-top: 50px;margin-left: 50px;" />
                    </div>
                    <div style="width: 80%;border:1px solid red;">
                        <img src="assets/images/user.jpg" style="border-radius: 50%;width: 100px;margin-top: 50px;margin-left: 50px;" />
                    </div>
               </div>';
               
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    // reset pointer to the last page
    $pdf->lastPage();
    $pdf->Output('cv.pdf', 'I');
?>