<?php
require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Reportsupplyorder extends CI_Controller {
  function __construct()
  {
    parent::__construct();

        $this->load->model("Supplyingorder_Model");     //load the Supplyingorder models
        $this->load->model("Location_Model");     //load the location models
        $this->load->model("Supplier_Model");       //load the supplier models
        $this->load->model("Supplieritem_Model");        //load the supplieritem model
        $this->load->model("Item_Model");        //load the Item Model
  

    
  }


// Load all buyingorder data into view
    public function index()
    {
     

      $data['supplyingorderList'] = $this->Supplyingorder_Model->getAllSupplyingOrders();
 
        //load view
        $this->layouts->view("Reports/supplyorderreport",$data);
    }




  public function supplyorderReport()
  {    
    $supplyingorderList = $this->Supplyingorder_Model->getAllSupplyingOrders();


    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING );
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetMargins(10, 30, 10, true);

            // Add a page
    $pdf->AddPage();
 


    $title = "<h2>Supplying Order Details </h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';


          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Location</th>
    <th style="border: 1px solid #000000; ">No</th>
    <th style="border: 1px solid #000000; ">Supplier Name</th>
    <th style="border: 1px solid #000000; ">Grand Total (Rs.)</th>
    <th style="border: 1px solid #000000; ">Date Form</th>
    <th style="border: 1px solid #000000; ">Date To</th>
    <th style="border: 1px solid #000000; ">Status</th>
    
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($supplyingorderList as $key => $supplyorder) {
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$supplyorder->code.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplyorder->so_id.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplyorder->title.'&nbsp;.'.$supplyorder->firstname.'&nbsp;'.$supplyorder->lastname.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplyorder->so_grand_total.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplyorder->date_from.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplyorder->date_to.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplyorder->so_stts.'</td>
      
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