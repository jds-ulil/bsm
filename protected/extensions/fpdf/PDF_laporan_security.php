<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDF
 *
 * @author oelhyl
 */
class PDF_laporan_security extends FPDF{
    public $divisi = 'Security';
    public $kcp = '';
    function Header()
{
    // Logo
    $this->Image('images/logo_bsm.jpg',175,8,24);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Move to the right
    $this->Cell(5);
    // Title
    //$this->Cell(30,		10          ,'Title' ,     1,                       0,'C');
    //            kekanan       kebawah      Isi          garis                    star dalam kotak 
    $this->SetFont('Arial','B',12);
    $this->Cell(0,8,'Laporan ' .$this->divisi,0,1,'L');   
    $this->Cell(5);         
    $this->SetFont('Arial','B',10);
    $this->Cell(0,8,$this->kcp,0,1,'L');   
    $this->Cell(5);        
    
    $this->Line(200,25,10,25);
    // Line break
    $this->Ln(20);
}
    function setDivisi($unk) {
        $this->unitDivisi = $unk;
    }
    function setKcp($unk) {
        $this->kcp = $unk;
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
            // Margins
        var $left = 10;
        var $right = 10;
        var $top = 10;
        var $bottom = 10;

        // Create Table
        function WriteTable($tcolums)
        {
            // go through all colums
            for ($i = 0; $i < sizeof($tcolums); $i++)
            {
                $current_col = $tcolums[$i];
                $height = 0;

                // get max height of current col
                $nb=0;
                for($b = 0; $b < sizeof($current_col); $b++)
                {
                    // set style
                    $this->SetFont($current_col[$b]['font_name'], $current_col[$b]['font_style'], $current_col[$b]['font_size']);
                    $color = explode(",", $current_col[$b]['fillcolor']);
                    $this->SetFillColor($color[0], $color[1], $color[2]);
                    $color = explode(",", $current_col[$b]['textcolor']);
                    $this->SetTextColor($color[0], $color[1], $color[2]);            
                    $color = explode(",", $current_col[$b]['drawcolor']);            
                    $this->SetDrawColor($color[0], $color[1], $color[2]);
                    $this->SetLineWidth($current_col[$b]['linewidth']);

                    $nb = max($nb, $this->NbLines($current_col[$b]['width'], $current_col[$b]['text']));            
                    $height = $current_col[$b]['height'];
                }  
                $h=$height*$nb;


                // Issue a page break first if needed
                $this->CheckPageBreak($h);

                // Draw the cells of the row
                for($b = 0; $b < sizeof($current_col); $b++)
                {
                    $w = $current_col[$b]['width'];
                    $a = $current_col[$b]['align'];

                    // Save the current position
                    $x=$this->GetX();
                    $y=$this->GetY();

                    // set style
                    $this->SetFont($current_col[$b]['font_name'], $current_col[$b]['font_style'], $current_col[$b]['font_size']);
                    $color = explode(",", $current_col[$b]['fillcolor']);
                    $this->SetFillColor($color[0], $color[1], $color[2]);
                    $color = explode(",", $current_col[$b]['textcolor']);
                    $this->SetTextColor($color[0], $color[1], $color[2]);            
                    $color = explode(",", $current_col[$b]['drawcolor']);            
                    $this->SetDrawColor($color[0], $color[1], $color[2]);
                    $this->SetLineWidth($current_col[$b]['linewidth']);

                    $color = explode(",", $current_col[$b]['fillcolor']);            
                    $this->SetDrawColor($color[0], $color[1], $color[2]);


                    // Draw Cell Background
                    $this->Rect($x, $y, $w, $h, 'FD');

                    $color = explode(",", $current_col[$b]['drawcolor']);            
                    $this->SetDrawColor($color[0], $color[1], $color[2]);

                    // Draw Cell Border
                    if (substr_count($current_col[$b]['linearea'], "T") > 0)
                    {
                    $this->Line($x, $y, $x+$w, $y);
                    }            

                    if (substr_count($current_col[$b]['linearea'], "B") > 0)
                    {
                    $this->Line($x, $y+$h, $x+$w, $y+$h);
                    }            

                    if (substr_count($current_col[$b]['linearea'], "L") > 0)
                    {
                    $this->Line($x, $y, $x, $y+$h);
                    }

                    if (substr_count($current_col[$b]['linearea'], "R") > 0)
                    {
                    $this->Line($x+$w, $y, $x+$w, $y+$h);
                    }


                    // Print the text
                    $this->MultiCell($w, $current_col[$b]['height'], $current_col[$b]['text'], 0, $a, 0);

                    // Put the position to the right of the cell
                    $this->SetXY($x+$w, $y);         
                }

                // Go to the next line
                $this->Ln($h);          
            }                  
        }


        // If the height h would cause an overflow, add a new page immediately
        function CheckPageBreak($h)
        {
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }


        // Computes the number of lines a MultiCell of width w will take
        function NbLines($w, $txt)
        {
            $cw=&$this->CurrentFont['cw'];
            if($w==0)
                $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r", '', $txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
            $sep=-1;
            $i=0;
            $j=0;
            $l=0;
            $nl=1;
            while($i<$nb)
            {
                $c=$s[$i];
                if($c=="\n")
                {
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                    continue;
                }
                if($c==' ')
                    $sep=$i;
                $l+=$cw[$c];
                if($l>$wmax)
                {
                    if($sep==-1)
                    {
                    if($i==$j)
                        $i++;
                    }
                    else
                    $i=$sep+1;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                }
                else
                    $i++;
            }
            return $nl;
        }
}


?>
