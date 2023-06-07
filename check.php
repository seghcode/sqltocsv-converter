<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = $_POST['database'];
    $table = $_POST['table'];
    $format = $_POST['format'];

    // Validations (Add more if needed)
    if (empty($database) || empty($table) || empty($format)) {
        die("Please fill in all the required fields.");
    }

    // Load the required SQL table data
    $dsn = "mysql:host=localhost;dbname=$database";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch the SQL table data
        $statement = $pdo->prepare("SELECT * FROM $table");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($data) === 0) {
            die("No records found in the specified table.");
        }

        // Convert SQL table data to the requested format
        require_once 'converter.php';
        $formats = explode(',', $format);
        convertToFormat($data, $formats, $table);

        // Provide download link to the converted file
        $filename = "$table.$format";
        $filepath = "converted_files/$filename";
        if (file_exists($filepath)) {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            readfile($filepath);
            exit;
        } else {
            die("An error occurred while generating the file.");
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>