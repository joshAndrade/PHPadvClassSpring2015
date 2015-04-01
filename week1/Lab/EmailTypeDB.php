<?php include '../bootstrap.php'; ?>
<?php

/**
 * Description of EmailTypeDB
 *
 * @author 001270562
 */
class EmailTypeDB {
    
    
    public function sendToDB($emailType) {
        
        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );         
    
    $pdo = new DB($dbConfig);
    $db = $pdo->getDB();
    $stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");  
                    
    $values = array(":emailtype"=>$emailType);

    if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
        echo 'Email Added';
    }       


    }
    
    public function displayEmailType($emailType) {
        
        $dbConfig = array(
        "DB_DNS" => 'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER" => 'root', 
        "DB_PASSWORD" => '');

    $pdo = new DB($dbConfig);
    $db = $pdo->getDB();

    $stmt = $db->prepare("SELECT * FROM emailtype where active = 1");

    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $value) {
            echo '<p><strong>', $value['emailtype'], '</strong></p>';
        }
    } else {
        echo '<p>No Data</p>';
    }
    
    
}
}
