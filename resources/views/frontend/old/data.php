<?php
$conn = new mysqli('localhost', 'root', '', 'phppot_examples');
if (! empty($_POST["keyword"])) {
    $sql = $conn->prepare("SELECT * FROM product WHERE name_product LIKE  ? ORDER BY name_product LIMIT 0,6");
    $search = "{$_POST['keyword']}%";
    $sql->bind_param("s", $search);
    $sql->execute();
    $result = $sql->get_result();
    if (! empty($result)) {
        ?>
<div id="product-list">
<?php
        foreach ($result as $product) {
            ?>
   <a href="<?php echo $product["url_product"]; ?>">
      <?php echo $product["name_product"]; ?>
    </a>
<?php
        } // end for
        ?>
</div>
<?php
    } // end if not empty
}
?>