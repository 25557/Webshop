<?php

/**
* List all users with a link to edit
*/

try {
  require "config.php";
  require "common.php";

  $connection = new PDO($dsn, $username, $password, $options);

$sql = "SELECT * FROM tshirts";

$statement = $connection->prepare($sql);
$statement->execute();

$result = $statement->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<h2>Update users</h2>

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
      <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
