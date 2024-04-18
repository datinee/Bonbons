<?php
class PDF
{
function Header()
{
    $this->Image('Images.logo.jpg', 10, 6, 30);
    $this->SetFont('Arial', 'B', 15);
    $this->Cell(80);
    $this->Cell(35,15,'Votre panier',1,0,'C');
    $this->Ln(20);
}
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 9);
    $this->Cell(0,10,"Les bonbons, c'est trop bon",0,0,'C');
}
}
$pdf=newFPDF();
   $pdf->AddPage();
   $pdf->SetFont('Arial','',14);

$pdf->Output(); // permet l’affichage
functionentete_table($position_entete){
    global$pdf;
    $pdf->SetDrawColor(183);// Couleur du fond RVB
    $pdf->SetFillColor(221);// Couleur des filets RVB
    $pdf->SetTextColor(0);// Couleur du texte noir
    $pdf->SetY($position_entete);
    // position de colonne 1 (10mm à gauche)  
    $pdf->SetX(10);
    $pdf->Cell(60,8,'Produit',1,0,'C',1);  // 60 >largeur colonne, 8 >hauteur colonne
    // position de la colonne 2 (70 = 10+60)
    $pdf->SetX(70);
    $pdf->Cell(40,8,'PU',1,0,'C',1);
    // position de la colonne 3 (110 = 70+40)
    	… à compléter 
     //position de la colonne 4 
… à compléter
  }
// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (70 mm)
$position_entete=70;
// police des caractères
$pdf->SetTextColor(0);
// on affiche les en-têtes du tableau
 entete_table($position_entete);
 $position_detail=78;// Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (60+8)
//initialisation des variables 
$total=0;
$frais=5;
//pour chaque ligne du panier
foreach($_SESSION['panier']as$id=>$quantite)
{
$produits=Produit::trouverUnBonbon($id);
$total+=$produits->getPrix()*$quantite;

// position abscisse de la colonne 1 (10mm du bord)
$pdf->SetY($position_detail);
$pdf->SetX(10);
$pdf->MultiCell(60,8,$produits->getNom(),1,'C');
// position abscisse de la colonne 2 (70 = 10 + 60)  
$pdf->SetY($position_detail);
$pdf->SetX(70);
$pdf->MultiCell(40,8,$produits->getPrix()."".chr(128),1,'C');
// position abscisse de la colonne 3 (110 = 70+ 40)
$pdf->SetY($position_detail);
$pdf->SetX(110);
$pdf->MultiCell(40,8,……………...,1,'C');
// position abscisse de la colonne 4……
$pdf->SetY($position_detail);
…………
…………
// on incrémente la position ordonnée de la ligne suivante (+8mm = hauteur des cellules)  
$position_detail+=8;
$position_detail=130;
       
// position titre total
    $pdf->SetFillColor(230,230,230);
    $pdf->SetY($position_detail);
    $pdf->SetX(50);
    $pdf->Cell(60,8,"Total HT",1,'','',1);

    //position montant total
    $pdf->SetY($position_detail);
    $pdf->SetX(110);
    $pdf->Cell(60,8,number_format($total,2,',','')."".chr(128),1,'C');

}
