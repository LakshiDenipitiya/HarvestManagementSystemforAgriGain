<?php
require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Reportadvancetobepaid extends CI_Controller {
  function __construct()
  {
    parent::__construct();

   $this->load->model("Manageorderstatus_Model"); //load location model

    
  }

  public function index()
  {

    $boid = $this->uri->segment(3);
            
           
              $data['done_bo'] = $this->Manageorderstatus_Model->get_advpaid_bo();
            
        $this->layouts->view("Reports/advancetobepaidreport", $data);
  }



  public function advancetobepaidReport()
  {    
        $done_bo = $this->Manageorderstatus_Model->get_advpaid_bo();


    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING );
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetMargins(10, 30, 10, true);

            // Add a page
    $pdf->AddPage();
 


    $title = "<h2>Advance to be paid buying orders </h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';


          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Location</th>
    <th style="border: 1px solid #000000; ">No</th>
    <th style="border: 1px solid #000000; ">Buyer Name</th>
    <th style="border: 1px solid #000000; ">Advance Payment(Rs.)</th>
    <th style="border: 1px solid #000000; ">Date From</th>
    <th style="border: 1px solid #000000; ">Date To</th>
   
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($done_bo as $key => $done_bo) {
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$done_bo->code.'</td>
       <td style="border: 1px solid #000000; text-align:center">'.$done_bo->bo_id.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$done_bo->title.'&nbsp;.'.$done_bo->firstname.'&nbsp;'.$done_bo->lastname.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.($done_bo->bo_grand_total*30/100).'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$done_bo->date_from.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$done_bo->date_to.'</td>
     
      
      </tr>
      ';
    }
    $tbl .= '</tbody>';

    $tbl=utf8_encode($tbl);
    $pdf->writeHTML($title. $tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
            // $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output();
  }
}
?>