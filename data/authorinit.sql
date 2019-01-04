use biblio;

CREATE TABLE authors (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  authorfirstname VARCHAR(30) NOT NULL,
  authorlastname VARCHAR(30) NOT NULL,
  date TIMESTAMP
)