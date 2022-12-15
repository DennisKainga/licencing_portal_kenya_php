<?php 

require_once "../engine/fpdf/fpdf.php";
session_start();
$ref_no=$_GET["ref_no"];

$pdf = new FPDF();
class PDF extends FPDF
{
protected $col = 0; // Current column
protected $y0;      // Ordinate of column start

function Header()
{
    // Page header
    global $title;

    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    $this->SetDrawColor(255,255,255);
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0,0,0);
    $this->SetLineWidth(1);
    $this->Cell($w,9,$title,1,1,'C',true);
    $this->Ln(10);
    // Save ordinate
    $this->y0 = $this->GetY();
}


function Footer()
{
    // Page footer
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function SetCol($col)
{
    // Set position at a given column
    $this->col = $col;
    $x = 10+$col*65;
    $this->SetLeftMargin($x);
    $this->SetX($x);
}

function AcceptPageBreak()
{
    // Method accepting or not automatic page break
    if($this->col<2)
    {
        // Go to next column
        $this->SetCol($this->col+1);
        // Set ordinate to top
        $this->SetY($this->y0);
        // Keep on page
        return false;
    }
    else
    {
        // Go back to first column
        $this->SetCol(0);
        // Page break
        return true;
    }
}

function ChapterTitle($num, $label)
{
    // Title
    $this->SetFont('Arial','',12);
    $this->SetFillColor(200,220,255);
    $this->Cell(0,6,"$label",0,1,'L',true);
    $this->Ln(4);
    // Save ordinate
    $this->y0 = $this->GetY();
}

function ChapterBody()
{
    $name = $_SESSION["name"];
    $idno = $_SESSION["idno"];
    $licence=$_GET["licence"];
    $date=$_GET["date"];
    $sub=$_GET["sub"];
    $txt = "Name: $name
    ID No.$idno
    is hereby licensed under $licence to have a $sub licence received.Date $date";
    // Font
    $this->SetFont('Times','I',13);
    // Output text in a 6 cm width column
    $this->MultiCell(150,8,$txt,'B');
    $this->Ln();
    // Mention
    $this->SetFont('','I');
    $this->Cell(0,2,'');
    // Go back to first column
    $this->SetCol(0);
}

function PrintChapter($num, $title, $file)
{
    // Add chapter
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}

$pdf = new PDF();
$title = 'NATIONAL LICENSING BOARD';
$pdf->SetTitle($title);
$pdf->SetAuthor('Jules Verne');
$pdf->PrintChapter(1,'REF NO. '.$ref_no,'');
$pdf->Output();
?>