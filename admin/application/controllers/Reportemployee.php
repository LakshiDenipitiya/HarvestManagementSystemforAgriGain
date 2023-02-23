<?php
require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Reportemployee extends CI_Controller {
  function __construct()
  {
    parent::__construct();

    $this->load->model('Employee_Model');

    
  }

  public function index()
  {

    $data['employees'] = $this->Employee_Model->GetAll();

    
    $this->layouts->view("Reports/employeereport", $data);
  }


  public function employeeReport()
  {    
    $employees = $this->Employee_Model->GetAll();    


    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING );
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetMargins(10, 30, 10, true);

            // Add a page
    $pdf->AddPage();
 


    $title = "<h2>Employee Details </h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';


          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Location</th>
    <th style="border: 1px solid #000000; ">Name</th>
    <th style="border: 1px solid #000000; ">Address</th>
    <th style="border: 1px solid #000000; ">NIC</th>
    <th style="border: 1px solid #000000; ">Phone No</th>
    <th style="border: 1px solid #000000; ">Email</th>
    <th style="border: 1px solid #000000; ">Designation</th>
    
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($employees as $key => $employee) {
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$employee->code.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$employee->title.'&nbsp;.'.$employee->firstname.'&nbsp;'.$employee->lastname.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$employee->no.'&nbsp;,'.$employee->lane.'&nbsp;,'.$employee->city.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$employee->nicno.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$employee->phoneno.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$employee->email.'</td>
      <td style="border: 1px solid #000000; ">'.$employee->designation.'</td>
      
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