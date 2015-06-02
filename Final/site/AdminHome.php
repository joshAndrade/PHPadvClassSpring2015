<?php 
namespace finalProject\JAndrade;
include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/Style.css">
        <title>Home</title>
    </head>
    <body>
        <div id="header">
            
            <h1>Welcome Admin</h1>
            <div id="user">
             <?php 
                $pdo = new DB($dbConfig);
                $db = $pdo->getDB();
                $validator = new Validator();
                $util = new Util();
                
                
                
            if ( !$util->isLoggedin() ) {
                $util->redirect("index.php");
            } else {
                echo' <a href="?logout">Logout</a>';
            }
            
            
            
        ?>
            </div>
            
            <div id="nav">
               
                
            
            </div><!-- end nav-->
            
            
        </div><!-- end header-->
        
        
        <div id="survey">
            
            <p>Below are the results of the Survey.</p>
            <br />
            <br />
            <br />
            
            <table border="1" cellpadding="5"><tr><th>Name</th><th>Gender</th><th>City</th><th>State</th><th>Favorite Sport</th><th>Favorite Music Genre</th></tr>
            
                
                <?php  
                
                
                $surveyDAO = new SurveyDAO($db);
                $surveyModel = new SurveyModel();
                
                $surveyService = new SurveyService($db, $util, $validator, $surveyDAO, $surveyModel);
                $surveyService->adminDisplayResults();
                ?>
                
            </table>
            
        </div><!-- end main-->
        
        <div id="surveySidebar">
            <br />
            <p>SideBar</p>
              
        </div>
        
        <div id="footer">
            
            Footer
            
        </div> 
        
        
    </body>
</html>
