<?php
require_once ("../includes/connection.php");
//$db_handle = new DBController();
if (! empty($_POST["country_id"])) {
    $query = "SELECT * FROM models WHERE category = '" . $_POST["country_id"] . "'";
    $results = mysqli_query($connection,$query);
    ?>
<option value disabled selected>*Select Sub Category*</option>
<?php
    foreach ($results as $subcat) {
        ?>
<option value="<?php echo $subcat["id"]; ?>"><?php echo $subcat["model"]; ?></option>
<?php
    }
}
?>