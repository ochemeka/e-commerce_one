<?php
require_once ("../includes/connection.php");
//$db_handle = new DBController();
if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM submodel WHERE model = '" . $_POST["state_id"] . "' order by submodel asc";
     $results = mysqli_query($connection,$query);
    ?>
<option value disabled selected>*Select Sub Child Category*</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["s_id"]; ?>"><?php echo $city["submodel"]; ?></option>
<?php
    }
}
?>