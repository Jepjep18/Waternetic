<?php
require('fpdf.php');

class PDF extends FPDF {
    
    function Header() {
        $this->SetFont('Arial', 'B', 10); // Set font

        // Set header text
        $headerText = array('First name', 'Middle name', 'Last name', 'Block', 'Lot', 'Phase', 'Real_timestamp', 'Amount');

        // Initialize an array to store the maximum width of each header cell
        $maxWidths = array();

        // Calculate maximum width for each header cell
        foreach ($headerText as $text) {
            $maxWidths[] = $this->GetStringWidth($text) + 16; // Add some padding
        }

        // Add cells with dynamically adjusted width and center alignment
        for ($i = 0; $i < count($headerText); $i++) {
            $this->Cell($maxWidths[$i], 10, $headerText[$i], 0, 0, 'C'); // Align header text to center and without border
        }
        $this->Ln(); // Move to the next line
    }
    
    // Overriding Footer method to add Printed Name and Signature fields
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-30);
        $this->SetFont('Arial', '', 10);
        
        $this->Cell(50, 10, 'Printed name:', 0, 0, 'L');
        $this->Cell(100, 10, '', 'B', 1, 'L'); // Underlined blank space
        $this->Cell(50, 10, 'Signature:', 0, 0, 'L');
        $this->Cell(100, 10, '', 'B', 1, 'L'); // Underlined blank space
    }
    
    function TableRow($data) {
        // Set minimum width for each cell
        $minWidth = 16;
        
        // Calculate maximum width among all cells
        $maxWidth = max($minWidth, 10); // You can adjust this according to your needs
        
        // Calculate the remaining width after adjusting for maximum width
        $remainingWidth = (279 - $maxWidth);
        
        // Calculate the equal width for each cell
        $equalWidth = $remainingWidth / 8;
        
        // Add cells with dynamically adjusted equal width and center alignment and without border
        $this->Cell($equalWidth, 10, $data['firstname'], 5, 0, 'C');
        $this->Cell($equalWidth, 10, $data['middlename'], 5, 0, 'C');
        $this->Cell($equalWidth, 10, $data['lastname'], 0, 0, 'C');
        $this->Cell($equalWidth, 10, $data['block'], 0, 0, 'C');
        $this->Cell($equalWidth, 10, $data['lot'], 0, 0, 'C');
        $this->Cell($equalWidth, 10, $data['phase'], 0, 0, 'C');
        $this->Cell($equalWidth, 10, $data['real_timestamp'], 0, 0, 'C'); // Moved before the "Amount" cell
        $this->Cell($equalWidth, 10, $data['amount'], 0, 1, 'C'); // Move to the next line after this row and center align
    }
}

$pdf = new PDF('L'); // 'L' sets the page orientation to landscape
$pdf->AddPage();

$pdf->Rect(10, 10, 279, 190); // Draw a rectangle as a border around the content area

$con = mysqli_connect("localhost", "root", "", "waternetic");
$sql = "SELECT * FROM payment_services WHERE bill_type='{$_POST['bill_type']}'";
$result = mysqli_query($con, $sql);

$totalSales = 0; // Initialize total sales
$rowsHeight = 0; // Track the total height of all rows

if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_array($result)) {
        // Calculate the height of the current row
        $rowHeight = 10; // Each row has a fixed height of 10 units
        
        // Add the current row height to the total rows height
        $rowsHeight += $rowHeight;
        
        // Check if adding the next row will exceed the page height
        if ($pdf->GetY() + $rowsHeight + 30 > 190) { // 30 is for the footer space
            $pdf->Header = null; // Remove header for subsequent pages
        }
        
        // Add the row to the table
        $pdf->TableRow($rows);
        
        // Add amount to total sales
        $totalSales += $rows['amount'];
    }
} else {
    $pdf->Cell(0, 10, "No records found", 0, 1, 'C'); // Output a message if no records found and center align
}

// Display total sales
$pdf->Cell(0, 10, "Total Sales: Php" . number_format($totalSales, 2), 0, 1, 'R');

$pdf->Output();
?>
