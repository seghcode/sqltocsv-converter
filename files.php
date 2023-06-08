<?php 
include_once('header.php');
if(!logged_in()) {
    redirect("login.php");
}


$directory = 'converted_files/';
$files = array_diff(scandir($directory), array('..', '.'));

if (empty($files)) {
    echo 'No converted files found.';
} else {
    echo '<div class="container card my-2 w-50" >';
    echo '<h4>Converted Files</h4>';
    echo '<table id="fileTable" class=" table table-hover table-striped table-responsive justify-content-center align-middle ">';
    echo '<thead><tr><th>File Name</th><th>Action</th></tr></thead>';
    echo '<tbody>';
    foreach ($files as $file) {
        echo '<tr>';
        echo '<td>' . $file . '</td>';
        echo '<td><a href="' . $directory . $file . '" download class="btn btn-primary">Download</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

?>

<script>
$(document).ready(function() {
    $('#fileTable').DataTable();
});
</script>
