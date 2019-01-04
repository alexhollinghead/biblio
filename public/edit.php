<?php include "templates/header.php";

try {
    require "../config.php";
    require "../common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM authors";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<table>
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
    <tr>
        <td><?php echo escape($row["authorfirstname"]); ?></td>
        <td><?php echo escape($row["authorlastname"]); ?></td>
        <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>

<a href="index.php">Back to home</a>