<?php 
class Reports extends CI_controller{
	public function index()
	{
		$data["name"]="MIT";
		$this->layouts->view("Reports/Views/example",$data);
	}
	public function generate_pdf()
	{
		$this->load->library('Pdf');
		$data["name"]="MIT";$html=$this->load->view("Reports/Exports/example",$data,true);

		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('My Title');
		$pdf->SetHeaderMargin(30);
		$pdf->SetTopMargin(20);
		$pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);	
		$pdf->SetAuthor('Author');
		$pdf->SetDisplayMode('real', 'default');

		$pdf->AddPage();

		$pdf->WriteHtml(5, $html);

		$pdf->Output('My-File-Name.pdf','I');
	}
}
?>