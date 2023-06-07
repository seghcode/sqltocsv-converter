<?php
include_once('header.php');
if(!logged_in()) {
    redirect("login.php");
}
?>

<div class="jumbotron">
	<div class="alert alert-success" role="alert">
		<?php echo "Welcome " . get_name($_SESSION['email']); ?>
	</div>
</div>
<div class="container">
<div class="container d-flex align-items-center justify-content-center">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">SQL to CSV/Excel Converter</h2>
                <form method="POST" action="check.php">
                    <div class="mb-3">
                        <label for="database" class="form-label">Database:</label>
                        <input type="text" name="database" id="database" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="table" class="form-label">Table:</label>
                        <input type="text" name="table" id="table" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="format" class="form-label">Format:</label>
                        <select name="format" id="format" class="form-select" required>
                            <option value="csv">CSV</option>
                            <option value="" disabled>Excel (XLSX)</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Convert" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>


<?php
include_once "footer.php";
?>