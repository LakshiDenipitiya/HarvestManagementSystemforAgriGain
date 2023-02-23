<?php
class Reportsupplier extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Supplier_Model");
         $this->isLoggedIn();
     }


      private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }



     //status option for so_bo
    function selectcitytype(){

    
        if($this->input->post('city_type')==2){
            redirect('Reportsupplier/suppliersbycityanuradhapura');
        }else if($this->input->post('city_type')==3){
            redirect('Reportsupplier/suppliersbycitycolombo');
        }else if ($this->input->post('city_type')==4){
            redirect('Reportsupplier/suppliersbycitymonaragala');
        }
                 
     }
       
    
 
 function index(){
    $this->isLoggedIn();

           $data['supplierList'] = $this->Supplier_Model->GetAllactivesuppliersby();

      $this->layouts->view("Reports/supplierreport",$data);
 }



 function suppliersbycityanuradhapura(){
    $this->isLoggedIn();

           $data['supplierList'] = $this->Supplier_Model->GetAllactivesuppliersbycity();
            $this->layouts->view("Reports/supplierreport2",$data);
}
function suppliersbycitycolombo(){

 
             $data['supplierList'] = $this->Supplier_Model->GetAllactivesuppliersbycolombo();
            $this->layouts->view("Reports/supplierreport3",$data);

        }

function suppliersbycitymonaragala(){

             $data['supplierList'] = $this->Supplier_Model->GetAllactivesuppliersbymonaragala();
            $this->layouts->view("Reports/supplierreport4",$data);
        }
 
 public function supplierReport()
  {    

    $supplierList = $this->Supplier_Model->GetAllactivesuppliersbycity(); 



    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING );
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetMargins(10, 30, 10, true);

            // Add a page
    $pdf->AddPage();
 


    $title = "<h2>Supplier Details </h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';


          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Title</th>
    <th style="border: 1px solid #000000; ">First Name</th>
    <th style="border: 1px solid #000000; ">NIC</th>
    <th style="border: 1px solid #000000; ">City</th>
    <th style="border: 1px solid #000000; ">Age</th>
   
    
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($supplierList as $key => $supplier) {
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$supplier->title.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->firstname.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->nicno.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->city.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->age.'</td>
   
      
      </tr>
      ';
    }
    $tbl .= '</tbody>';

    $tbl=utf8_encode($tbl);
    $pdf->writeHTML($title. $tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
            // $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output();
  }

 public function supplierReport2()
  {    

    $supplierList = $this->Supplier_Model->GetAllactivesuppliersbycolombo(); 



    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING );
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetMargins(10, 30, 10, true);

            // Add a page
    $pdf->AddPage();
 


    $title = "<h2>Supplier Details </h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';


          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Title</th>
    <th style="border: 1px solid #000000; ">First Name</th>
    <th style="border: 1px solid #000000; ">NIC</th>
    <th style="border: 1px solid #000000; ">City</th>
    <th style="border: 1px solid #000000; ">Age</th>
   
    
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($supplierList as $key => $supplier) {
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$supplier->title.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->firstname.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->nicno.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->city.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->age.'</td>
   
      
      </tr>
      ';
    }
    $tbl .= '</tbody>';

    $tbl=utf8_encode($tbl);
    $pdf->writeHTML($title. $tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
            // $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output();
  }

  public function supplierReport3()
  {    

    $supplierList = $this->Supplier_Model->GetAllactivesuppliersbymonaragala(); 



    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING );
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetMargins(10, 30, 10, true);

            // Add a page
    $pdf->AddPage();
 


    $title = "<h2>Supplier Details </h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';


          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Title</th>
    <th style="border: 1px solid #000000; ">First Name</th>
    <th style="border: 1px solid #000000; ">NIC</th>
    <th style="border: 1px solid #000000; ">City</th>
    <th style="border: 1px solid #000000; ">Age</th>
   
    
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($supplierList as $key => $supplier) {
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$supplier->title.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->firstname.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->nicno.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->city.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->age.'</td>
   
      
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