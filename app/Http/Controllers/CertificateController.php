<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CertificateController extends Controller
{
    private $request;
    private $learnerName = "Manuel Bonilla";
    private $completedDateText = "Dec 28, 2021";

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function generateCertificateOptOne()
    {
        // https://knet-kloud.kognito.com/resources/credits/71
        $course = 'SBI with Adolescents: Comorbid Substance use and Mental Health';

        /*
        $completedDateUNIX = strtotime($courseStatusRecord['completed_date']);
        $completedDateText = date('F j, Y', $completedDateUNIX);
        $learnerName = $userData['firstname'] . ' ' . $userData['lastname'];
         */
        $pdf = new Fpdf('L', 'in', 'A4');
        $pdf->AddPage();
        $pdf->Image('sbia_cme_phy_certificate.png', 0, 0, 11.7);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 35);
        $pdf->Ln(3.2);
        $pdf->Cell(0, 0, $this->learnerName, 0, 0, 'C');

        $pdf->Ln(1.1);
        $pdf->SetFont('Arial', 'I', 20);
        $pdf->Cell(0, 0, $course, 0, 0, 'C');

        $pdf->Ln(1.2);
        $pdf->SetFont('Arial', '', 24);
        $pdf->Cell(0, 0, $this->completedDateText, 0, 0, 'C');

        ob_start();
        $pdf->Output('F', 'Completion_Certificate.pdf');
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'Completion_Certificate.pdf';
        ob_get_contents();
        ob_end_clean();
        return response()->download('Completion_Certificate.pdf', $fileName, $headers);
    }

    public function generateCertificateOptTwo()
    {
        // https://knet-kloud.kognito.com/resources/credits/73
        $course = 'SBI with Adults';
        $pdf = new Fpdf('L', 'in', 'A4');
        $pdf->AddPage();
        $pdf->Image('sbia_cne_nur_certificate.png', 0, 0, 11.7);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 35);
        $pdf->Ln(3.2);
        $pdf->Cell(0, 0, $this->learnerName, 0, 0, 'C');

        $pdf->Ln(1.15);
        $pdf->SetFont('Arial', 'I', 29);
        $pdf->Cell(0, 0, $course, 0, 0, 'C');

        $pdf->Ln(.5);
        $pdf->SetFont('Arial', '', 23);
        $pdf->Cell(0, 0, $this->completedDateText, 0, 0, 'C');

        ob_start();
        $pdf->Output('F', 'Completion_Certificate.pdf');
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'Completion_Certificate.pdf';
        ob_get_contents();
        ob_end_clean();
        return response()->download('Completion_Certificate.pdf', $fileName, $headers);
    }

    public function generateCertificateOptThree()
    {
        // https://knet-kloud.kognito.com/resources/credits/72
        $course = 'SBI with Adolescents: Comorbid Substance use and Mental Health';
        $pdf = new Fpdf('L', 'in', 'A4');
        $pdf->AddPage();
        $pdf->Image('sbia_cme_nonphy_certificate.png', 0, 0, 11.7);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 35);
        $pdf->Ln(3.2);
        $pdf->Cell(0, 0, $this->learnerName, 0, 0, 'C');

        $pdf->Ln(1.1);
        $pdf->SetFont('Arial', 'I', 20);
        $pdf->Cell(0, 0, $course, 0, 0, 'C');

        $pdf->Ln(1.2);
        $pdf->SetFont('Arial', '', 24);
        $pdf->Cell(0, 0, $this->completedDateText, 0, 0, 'C');

        ob_start();
        $pdf->Output('F', 'Completion_Certificate.pdf');
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'Completion_Certificate.pdf';
        ob_get_contents();
        ob_end_clean();
        return response()->download('Completion_Certificate.pdf', $fileName, $headers);
    }

    /***
     *
     * Este es el metodo donde toca cuadrar todo basicamente es jugar con los valores de los metodos Ln y Cell
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateCertificateDei()
    {
        // https://knet-kloud.kognito.com/resources/credits/247
        $course = 'Cultivating Inclusive Communities';
        $pdf = new Fpdf('L', 'in', 'A4');
        $pdf->AddPage();
        // Si la imagen no encaja se debe jugar con el ultimo parametro del metodo Image para encajar el png en el certificado
        $pdf->Image('dei_generic_certificate.png', 0, 0, 11.7);

        $pdf->SetTextColor(0, 0, 0);
        // Modificar el tamaño de la fuente
        $pdf->SetFont('Arial', '', 35);
        // Linea, movimiento vertical en el pdf
        $pdf->Ln(3.2);
        // Celda, movimiento horizontal y distribucion del texto
        $pdf->Cell(0, 0, $this->learnerName, 0, 0, 'C');

        $pdf->Ln(1.1);
        $pdf->SetFont('Arial', 'I', 20);
        $pdf->Cell(0, 0, $course, 0, 0, 'C');

        $pdf->Ln(1.2);
        $pdf->SetFont('Arial', '', 24);
        $pdf->Cell(0, 0, $this->completedDateText, 0, 0, 'C');

        ob_start();
        $pdf->Output('F', 'Completion_Certificate.pdf');
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'Completion_Certificate.pdf';
        ob_get_contents();
        ob_end_clean();
        return response()->download('Completion_Certificate.pdf', $fileName, $headers);
    }


}
