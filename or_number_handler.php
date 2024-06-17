<?php
// Initialize OR number if it's not already set
$or_number_file = 'or_number.txt';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Increment OR number only on form submission
    if (!file_exists($or_number_file)) {
        file_put_contents($or_number_file, '1'); // Start from OR number 1
    } else {
        $current_or_number = intval(file_get_contents($or_number_file));
        $new_or_number = $current_or_number + 1;
        file_put_contents($or_number_file, $new_or_number); // Update OR number file
    }
}
?>
