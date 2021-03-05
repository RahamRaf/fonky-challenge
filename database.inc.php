<?php

/**
 * Database related class
 */

class FonkyDB {

  private $host = "localhost";
  private $username = "fonky";
  private $password = "password";
  private $database = "fonky";

  private $conn;

  function __construct() {

    // Database connection
    $this->conn = new mysqli( $this->host , $this->username , $this->password , $this->database);

    //Initiate data table if not exists
    $query = "CREATE TABLE IF NOT EXISTS fonky_sales_data(
      id INT,
      koper VARCHAR(50),
      datum DateTime,
      product VARCHAR(10),
      vestiging VARCHAR(20),
      verkoper VARCHAR(50)
    ) ENGINE = INNODB;";
    $result = $this->conn->query( $query );

    // Initiate status table if not exists
    $query = "CREATE TABLE IF NOT EXISTS fonky_sales_data_status(
      status TINYINT(1),
      datum DateTime
    ) ENGINE = INNODB;";
    $result = $this->conn->query( $query );

    //mysqli_free_result($result);
  }

  /**
   * Insert data into db
   * @param string table name
   * @param array $fileds that data hould be insert into
   * @param array $values that should be inserted
   */
  function insert( $table, $fields, $values ) {

    $query = "INSERT INTO $table ( ". implode( ", ", $fields ) ." ) VALUES ( ". implode( ",", $values) ." );";
    echo $query . "<br>";
    $result = $this->conn->query( $query );
    echo $this->conn->error;
    return $result;

  }

  /**
   * selects data from db
   * @param string table name
   * @param array $fileds that data hould be insert into
   * @param array $options that should be inserted
   */
  function select( $table, $fields = array("*"), $options = "" ) {

    $query = "SELECT ". implode( ", ", $fields ) ." FROM $table $options;";
    $result = $this->conn->query( $query );

    return array( $result->num_rows , $result->fetch_array() );

  }

  function __deconstruct() {
    $this->conn->close();
  }

}

?>
