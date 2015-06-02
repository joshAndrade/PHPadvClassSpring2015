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
            
             
            var_dump($state);
           
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
            
            
            $surveyModel->setFirst($first);
            $surveyModel->setLast($last);
            $surveyModel->setGender($gender);
            $surveyModel->setCity($city);
            $surveyModel->setState($state);
            $surveyModel->setFavsport($sport);
            $surveyModel->setFavmusic($music);
            
            if($surveyDAO->idExist($surveyModel->getSurveyid()))
            {
                $surveyModel->map(filter_input_array(INPUT_POST));
                
               echo'db'; var_dump($db); echo'<br />';
               echo 'util'; var_dump($util); echo'<br />';
               echo 'dao'; var_dump($surveyDAO); echo'<br />';
               echo 'model'; var_dump($surveyModel); 
                
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
                <input type="radio" name="gender" value="male" 
                       <?php
                            if($gender === 'male')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                       />Male
                <br />
                <input type="radio" name="gender" value="female" 
                       <?php
                            if($gender === 'female')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                       />Female
                <br />
                <br />
                City: <input type="text" name="city" value="<?php echo $city; ?>" />
                <br />
                <br />
                State: <select name="state"> 
        <option value="">Please Select an option</option>
	<option value="AL" <?php if($state === 'AL'){echo 'selected="selected"'; } ?>>Alabama</option>
	<option value="AK" <?php if($state === 'AK'){echo 'selected="selected"'; } ?>>Alaska</option>
	<option value="AZ" <?php if($state === 'AZ'){echo 'selected="selected"'; } ?>>Arizona</option>
	<option value="AR" <?php if($state === 'AR'){echo 'selected="selected"'; } ?>>Arkansas</option>
	<option value="CA" <?php if($state === 'CA'){echo 'selected="selected"'; } ?>>California</option>
	<option value="CO" <?php if($state === 'CO'){echo 'selected="selected"'; } ?>>Colorado</option>
	<option value="CT" <?php if($state === 'CT'){echo 'selected="selected"'; } ?>>Connecticut</option>
	<option value="DE" <?php if($state === 'DE'){echo 'selected="selected"'; } ?>>Delaware</option>
	<option value="DC" <?php if($state === 'DC'){echo 'selected="selected"'; } ?>>District Of Columbia</option>
	<option value="FL" <?php if($state === 'FL'){echo 'selected="selected"'; } ?>>Florida</option>
	<option value="GA" <?php if($state === 'GA'){echo 'selected="selected"'; } ?>>Georgia</option>
	<option value="HI" <?php if($state === 'HI'){echo 'selected="selected"'; } ?>>Hawaii</option>
	<option value="ID" <?php if($state === 'ID'){echo 'selected="selected"'; } ?>>Idaho</option>
	<option value="IL" <?php if($state === 'IL'){echo 'selected="selected"'; } ?>>Illinois</option>
	<option value="IN" <?php if($state === 'IN'){echo 'selected="selected"'; } ?>>Indiana</option>
	<option value="IA" <?php if($state === 'IA'){echo 'selected="selected"'; } ?>>Iowa</option>
	<option value="KS" <?php if($state === 'KS'){echo 'selected="selected"'; } ?>>Kansas</option>
	<option value="KY" <?php if($state === 'KY'){echo 'selected="selected"'; } ?>>Kentucky</option>
	<option value="LA" <?php if($state === 'LA'){echo 'selected="selected"'; } ?>>Louisiana</option>
	<option value="ME" <?php if($state === 'ME'){echo 'selected="selected"'; } ?>>Maine</option>
	<option value="MD" <?php if($state === 'MD'){echo 'selected="selected"'; } ?>>Maryland</option>
	<option value="MA" <?php if($state === 'MA'){echo 'selected="selected"'; } ?>>Massachusetts</option>
	<option value="MI" <?php if($state === 'MI'){echo 'selected="selected"'; } ?>>Michigan</option>
	<option value="MN" <?php if($state === 'MN'){echo 'selected="selected"'; } ?>>Minnesota</option>
	<option value="MS" <?php if($state === 'MS'){echo 'selected="selected"'; } ?>>Mississippi</option>
	<option value="MO" <?php if($state === 'MO'){echo 'selected="selected"'; } ?>>Missouri</option>
	<option value="MT" <?php if($state === 'MT'){echo 'selected="selected"'; } ?>>Montana</option>
	<option value="NE" <?php if($state === 'NE'){echo 'selected="selected"'; } ?>>Nebraska</option>
	<option value="NV" <?php if($state === 'NV'){echo 'selected="selected"'; } ?>>Nevada</option>
	<option value="NH" <?php if($state === 'NH'){echo 'selected="selected"'; } ?>>New Hampshire</option>
	<option value="NJ" <?php if($state === 'NJ'){echo 'selected="selected"'; } ?>>New Jersey</option>
	<option value="NM" <?php if($state === 'NM'){echo 'selected="selected"'; } ?>>New Mexico</option>
	<option value="NY" <?php if($state === 'NY'){echo 'selected="selected"'; } ?>>New York</option>
	<option value="NC" <?php if($state === 'NC'){echo 'selected="selected"'; } ?>>North Carolina</option>
	<option value="ND" <?php if($state === 'ND'){echo 'selected="selected"'; } ?>>North Dakota</option>
	<option value="OH" <?php if($state === 'OH'){echo 'selected="selected"'; } ?>>Ohio</option>
	<option value="OK" <?php if($state === 'OK'){echo 'selected="selected"'; } ?>>Oklahoma</option>
	<option value="OR" <?php if($state === 'OR'){echo 'selected="selected"'; } ?>>Oregon</option>
	<option value="PA" <?php if($state === 'PA'){echo 'selected="selected"'; } ?>>Pennsylvania</option>
	<option value="RI" <?php if($state === 'RI'){echo 'selected="selected"'; } ?>>Rhode Island</option>
	<option value="SC" <?php if($state === 'SC'){echo 'selected="selected"'; } ?>>South Carolina</option>
	<option value="SD" <?php if($state === 'SD'){echo 'selected="selected"'; } ?>>South Dakota</option>
	<option value="TN" <?php if($state === 'TN'){echo 'selected="selected"'; } ?>>Tennessee</option>
	<option value="TX" <?php if($state === 'TX'){echo 'selected="selected"'; } ?>>Texas</option>
	<option value="UT" <?php if($state === 'UT'){echo 'selected="selected"'; } ?>>Utah</option>
	<option value="VT" <?php if($state === 'VT'){echo 'selected="selected"'; } ?>>Vermont</option>
	<option value="VA" <?php if($state === 'VA'){echo 'selected="selected"'; } ?>>Virginia</option>
	<option value="WA" <?php if($state === 'WA'){echo 'selected="selected"'; } ?>>Washington</option>
	<option value="WV" <?php if($state === 'WV'){echo 'selected="selected"'; } ?>>West Virginia</option>
	<option value="WI" <?php if($state === 'WI'){echo 'selected="selected"'; } ?>>Wisconsin</option>
	<option value="WY" <?php if($state === 'WY'){echo 'selected="selected"'; } ?>>Wyoming</option>
</select>				
               <br />
               <br />
               Favorite Sport: <br />
               <input type="radio" name="sport" value="baseball" 
                      <?php
                            if($sport === 'baseball')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Baseball
               <input type="radio" name="sport" value="basketball" 
                      <?php
                            if($sport === 'basketball')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Basketball
               <input type="radio" name="sport" value="football" 
                      <?php
                            if($sport === 'football')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Football
               <br />
               <input type="radio" name="sport" value="hockey" 
                      <?php
                            if($sport === 'hockey')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Hockey
               <input type="radio" name="sport" value="nascar" 
                      <?php
                            if($sport === 'nascar')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />NASCAR
               <input type="radio" name="sport" value="soccer" 
                      <?php
                            if($sport === 'soccer')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Soccer
               <input type="radio" name="sport" value="other" 
                      <?php
                            if($sport === 'other')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Other
               <br />
               <br />
               Favorite Genre of Music: <br />
               <input type="radio" name="music" value="alternative" 
                       <?php
                            if($music === 'alternative')
                            {
                                echo 'checked="checked"';
                            }
                       ?>/>Alternative
               <input type="radio" name="music" value="blues" 
                      <?php
                            if($music === 'blues')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Blues
               <input type="radio" name="music" value="country" 
                      <?php
                            if($music === 'country')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Country
               <input type="radio" name="music" value="metal" 
                      <?php
                            if($music === 'metal')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Metal
               <br />               
               <input type="radio" name="music" value="pop" 
                      <?php
                            if($music === 'pop')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Pop
               <input type="radio" name="music" value="rap" 
                      <?php
                            if($music === 'rap')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Rap
               <input type="radio" name="music" value="rock" 
                      <?php
                            if($music === 'rock')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Rock
               <input type="radio" name="music" value="other" 
                      <?php
                            if($music === 'other')
                            {
                                echo 'checked="checked"';
                            }
                       ?>
                      />Other
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