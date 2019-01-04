<?php

    if (isset($_POST['submit'])) {
        require "../config.php";
        require "../common.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_author = array(
            "authorfirstname" => $_POST['authorfirstname'],
            "authorlastname" => $_POST['authorlastname'],
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "authors",
            implode(",", array_keys($new_author)),
            ":" . implode(", :", array_keys($new_author))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_author);

    }
    catch(PDOException $error){
        echo $sql . "<br>" . $error->getMessage();
    }
}


?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
	<blockquote><?php echo $_POST['authorfirstname'] . " " . $_POST['authorlastname']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add an Entry</h2>

<form method="post">
	<label for="title">Title</label>
	<input type="text" name="title" id="title">
	<label for="authorlastname">Author Last Name</label>
	<input type="text" name="authorlastname" id="authorlastname">
    <label for="authorfirstname">Author First Name</label>
	<input type="text" name="authorfirstname" id="authorfirstname">
	<label for="editor">Editor</label>
	<input type="text" name="editor" id="editor">
	<label for="translator">Translator</label>
	<input type="text" name="translator" id="translator">
	<label for="edition">Edition</label>
	<input type="text" name="edition" id="edition">
    <label for="publisher">Publisher</label>
	<input type="text" name="publisher" id="publisher">
	<label for="city">Location</label>
	<input type="text" name="city" id="city">
    <label for="year">Year</label>
	<input type="text" name="year" id="year">
    <label for="notes">Notes</label>
    <input type="text" name="notes" id="notes">

	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>


<?php include "templates/footer.php"; ?>
