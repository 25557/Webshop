<?php

require "config.php";
require "common.php";

if (isset($_POST['submit'])) {

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
            FROM tshirts
            WHERE type = :type";

    $type = $_POST['type'];
    $statement = $connection->prepare($sql);
    $statement->bindParam('type', $type, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>

<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Type</th>
          <th>Color</th>
          <th>Size</th>
          <th>Text</th>
          <th>Quantity</th>
          <th>Date of order</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($result as $row) : ?>
        <tr>
          <td><?php echo escape($row["id"]); ?></td>
          <td><?php echo escape($row["type"]); ?></td>
          <td><?php echo escape($row["color"]); ?></td>
          <td><?php echo escape($row["size"]); ?></td>
          <td><?php echo escape($row["text"]); ?></td>
          <td><?php echo escape($row["quantity"]); ?></td>
          <td><?php echo escape($row["date"]); ?> </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php } else { ?>
      <blockquote>No results found for <?php echo escape($_POST['type']); ?>.</blockquote>
    <?php }
} ?>

<h2>Find order based on type t-shirt</h2>

<form method="post">
  <label for="type">type</label>
  <input type="text" id="type" name="type">
  <input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
