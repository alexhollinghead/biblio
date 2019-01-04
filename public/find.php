<?php require "templates/header.php";

if (isset($_POST['submit'])) {
	try {
		require "../config.php";
		require "../common.php";

		$connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT *
                FROM authors
                WHERE authorlastname = :authorlastname";

        $authorlastname = $_POST['authorlastname'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':authorlastname', $authorlastname, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}

    if ($result && $statement->rowCount() > 0){ ?>
        <h2>Results</h2>
        <table>
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo escape($row["authorfirstname"]); ?></td>
                    <td><?php echo escape($row["authorlastname"]); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['authorlastname']); ?>.</blockquote>
    <?php }
} ?>

<h2>Find Author</h2>

<form method="post">

    <label for="authorlastname">Author</label>
    <input type="text" id="authorlastname" name="authorlastname">
    <input type="submit" name="submit" value="View Results">

</form>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
