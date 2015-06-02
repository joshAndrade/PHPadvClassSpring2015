<?php 
namespace finalProject\JAndrade;
include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/Style.css">
        <title>Edit Survey</title>
    </head>
    <body>
        <div id="errors">
        <?php
            $util = new Util();
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
            
            
            $validator = new Validator();
            $surveyDAO = new SurveyDAO($db);
            $surveyModel = new SurveyModel();
            
            if($util->isPostRequest())
            {
                $surveyModel->map(filter_input_array(INPUT_POST));
                
            }
               else
               {
                   
                   $surveyid = filter_input(INPUT_GET, 'surveyid');
                   $surveyModel = $surveyDAO->getById($surveyid);
                   
                   
               }
            
            //$surveyid = $surveyModel->getSurveyid();
            $first = $surveyModel->getFirst();
            $last = $surveyModel->getLast();
            $gender = $surveyModel->getGender();
            $city = $surveyModel->getCity();
            $state = $surveyModel->getState();
            $sport = $surveyModel->getFavsport();
            $music = $surveyModel->getFavmusic();
            
            
           
            if ($util->isPostRequest())
        {
            $surveyid = filter_input(INPUT_GET, 'surveyid');
            $surveyModel = $surveyDAO->getById($surveyid);
              
            $first = filter_input(INPUT_POST, 'first');
            $last = filter_input(INPUT_POST, 'last');
            $gender = filter_input(INPUT_POST, 'gender');
            $city = filter_input(INPUT_POST, 'city');
            $state = filter_input(INPUT_POST, 'state');
            $sport = filter_input(INPUT_POST, 'sport');
            $music = filter_input(INPUT_POST, 'music');
            
            if($surveyDAO->idExist($surveyModel->getSurveyid()))
            {
                $surveyModel->map(filter_input_array(INPUT_POST));
                
                $surveyService = new SurveyService($db, $util, $validator, $surveyDAO, $surveyModel);
                $surveyService->saveForm();
            }
            
        }
            ?>
                </div><!--end errors-->
       
        <div id="header">
            
            <h1>Edit Survey</h1>
            <div id="user">
                
            <?php 
            
            if ( !$util->isLoggedin() ) {
                $util->redirect("index.php");
            } else {
                echo' <a href="?logout">Logout</a>';
            }
            ?>
                    
            </div> <!-- end user-->
            
            <div id="nav">
               
                <a href="AdminHome.php">Home</a> 
            
            </div><!-- end nav-->
            
            
        </div><!-- end header-->
        
        
        <div id="main">
            <br />
            <form action="#" method="POST">
                
                First Name: <input type="text" name="first" value="<?php echo $first; ?>" />
                <br />
                <br />
                Last Name: <input type="text" name="last" value="<?php echo $last; ?>" />
                <br />
                <br />
                Gender: <br />
                <input type="radio" name="gender" value="male" />Male
                <br />
                <input type="radio" name="gender" value="female" />Female
                <br />
                <br />
                City: <input type="text" name="city" value="<?php echo $city; ?>" />
                <br />
                <br />
                State: <select name="state"> 
        <option value="">Please Select an option</option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>				
               <br />
               <br />
               Favorite Sport: <br />
               <input type="radio" name="sport" value="baseball" />Baseball
               <input type="radio" name="sport" value="basketball" />Basketball
               <input type="radio" name="sport" value="football" />Football
               <br />
               <input type="radio" name="sport" value="hockey" />Hockey
               <input type="radio" name="sport" value="nascar" />NASCAR
               <input type="radio" name="sport" value="soccer" />Soccer
               <input type="radio" name="sport" value="other" />Other
               <br />
               <br />
               Favorite Genre of Music: <br />
               <input type="radio" name="music" value="alternative" />Alternative
               <input type="radio" name="music" value="blues" />Blues
               <input type="radio" name="music" value="country" />Country
               <input type="radio" name="music" value="metal" />Metal
               <br />               
               <input type="radio" name="music" value="pop" />Pop
               <input type="radio" name="music" value="rap" />Rap
               <input type="radio" name="music" value="rock" />Rock
               <input type="radio" name="music" value="other" />Other
               <br />
               <br />
               <input type="submit" value="Submit" />
            </form>
    
        </div><!-- end main-->
        
        <div id="sidebar">
            <br />
            <p>SideBar</p>
              
        </div>
        
        <div id="footer">
            
            <p>Footer</p>
            
        </div> 
        
        
    </body>
</html>