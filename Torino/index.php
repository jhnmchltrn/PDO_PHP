<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL</title>
</head>

<body>
  <?php
  // SHOW CODE DEMONSTRATING FETCH_ALL(). USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN. 
  echo ("<pre>");
  $stmt = $pdo->prepare("SELECT * FROM Resources");
  if ($stmt->execute()) {
    print_r($stmt->fetchAll());
  }
  echo ("</pre>");



  // SHOW CODE DEMONSTRATING HOW FETCH() IS USED. USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN. 
  echo ("<pre>");
  $stmt = $pdo->prepare("SELECT * FROM Resources where resource_id = 5");
  if ($stmt->execute()) {
    print_r($stmt->fetchAll());
  }
  echo ("</pre>");

  // SHOW CODE DEMONSTRATING INSERTION OF RECORD TO YOUR DATABASE
  $query = "INSERT INTO Resources (resource_id, title, description, resource_type, publication_date, category_id, author_id, file_url, availability_status)
VALUES (?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute([1, 'Resource 1', 'This is resource 1', 'Book', '2020-01-01', 1, 1, 'https://example.com/resource1', TRUE]);
  if ($executeQuery) {
    echo "Data inserted successfully!";
  } else {
    echo "Error inserting data!";
  }

  // SHOW CODE DEMONSTRATING UPDATING OF RECORD FROM YOUR DATABASE
$query = "UPDATE Resources SET title = ?, description = ?, resource_type = ?, publication_date = ?, category_id = ?, author_id = ?, file_url = ?, availability_status = ?, WHERE resource_id = ?";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute(['Resource 1', 'This is resource 1', 'Book', '2020-01-01', 1, 1, 'https://example.com/resource1', TRUE, 1]);
  if ($executeQuery) {
    echo "Data updated successfully!";
  } else {
    echo "Error updating data!";
  }

  // SHOW CODE DEMONSTRATING DELETION OF RECORD TO YOUR DATABASE
  $query = "DELETE FROM Resources where resource_id = 5";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute();
  if ($executeQuery) {
    echo "Data deleted successfully!";
  } else {
    echo "Error deleting data!";
  }

  // SHOW CODE DEMONSTRATING AN SQL QUERY’S RESULT SET IS RENDERED ON AN HTML TABLE
  $stmt = $pdo->prepare("SELECT * FROM Resources");
  if ($stmt->execute()) {
    $results = $stmt->fetchAll(); // Fetch all results
    echo "<table border='2'>";
    echo "<tr>";
    echo "<th>resource id</th>";
    echo "<th>title</th>";
    echo "<th>description</th>";
    echo "<th>resource type</th>";
    echo "<th>publication date</th>";
    echo "<th>category id</th>";
    echo "<th>author id</th>";
    echo "<th>file url</th>";
    cho "<th>availability status</th>";
    echo "</tr>";
    foreach ($results as $result) {
      echo "<tr>";
      echo "<th>" . $result ['resource_id']. "</td>";
      echo "<th>" . $result ['title']. "</td>";
      echo "<th>" . $result ['description']. "</td>";
      echo "<th>" . $result ['resource_type']. "</td>";
      echo "<th>" . $result ['publication_date']. "</td>";
      echo "<th>" . $result ['category_id']. "</td>";
      echo "<th>" . $result ['author_id']. "</td>";
      echo "<th>" . $result ['file_url']. "</td>";
      echo "<th>" . $result ['availability_status']. "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  ?>
</body>

</html>