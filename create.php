<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

require "config.php";
require "common.php";

if (isset($_POST['submit'])) {

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "type" => $_POST['type'],
      "color" => $_POST['color'],
      "size"  => $_POST['size'],
      "text"     => $_POST['text'],
      "quantity" => $_POST['quantity']

    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "tshirts",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote>Your order has been completed.</blockquote>
  <?php endif; ?>

  <h2>Add a T-shirt</h2>

  <form method="post">
    <label for="type">Type</label>
    <input type="text" name="type" id="type">
    <label for="color">Color</label>
    <input type="text" name="color" id="color">
    <label for="size">Size</label>
    <input type="text" name="size" id="size">
    <label for="text">Text</label>
    <input type="text" name="text" id="text">
    <label for="size">Quantity</label>
    <input type="text" name="quantity" id="quantity">

    <input type="submit" name="submit" value="Submit">
  </form>

  <a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
