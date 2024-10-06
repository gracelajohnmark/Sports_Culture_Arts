<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>SKC Bulan Campus</title>
  </head>
  <body>
    <div class="bodyloginpage">
      <div class="maincontainer">
      <div class="bgcontainer">
          <div class="insidebgcontainer">
            <img class="skclogo" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/73595a0e37c0edf4d6125286074ff7ef948518f5/img/SKC%20LOGO.png?raw=true" alt="logo of skc"/>
            <p class="welcome-to-sports">Welcome to Sports Culture and Arts Portal<br/>SorSU Bulan Campus</p>
            <button type="submit" class="return-to-homepage" name="returnhomepage" id="returnhomepage">Return to Page</button>
          </div>
            <form method="post" id="LoginForm">
            <h1>Sign in</h1>
            <div class="formcontainer">
                <div class="input-groupStudent_id">
                    <label for="username" class="user-name">Username</label>
                    <img class="Studentlogo" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/73595a0e37c0edf4d6125286074ff7ef948518f5/img/UserName.png?raw=true" alt="student icon"/>
                    <input type="text" name="username" class="input-student-id" placeholder="Student ID"></input>
                </div>
            </div>
            <div class="input-groupPassword">
                  <label for="password" class="pass-word">Password</label>
                  <img class="lockicon" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/73595a0e37c0edf4d6125286074ff7ef948518f5/img/IconLockPass.png?raw=true" alt="password icon"/>
                <input type="password" name="password" class="input-password" id="password" placeholder="Password"></input>
            </div>
                <button type="submit" class="continue" value="Continue" name="Continue">Continue</button>
                <a href="#" class="forgotpass">Forget Password</a>
                <a href="https://www.facebook.com/profile.php?id=100064099749286"><img class="fb-logo" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/445c8a15a86abbc49aeffc2bb7655b2d593f07fa/img/facebook.png?raw=true" alt="fb of skc page"/></a>
                </form>
            </div>
        </div>
    <?php
        include 'dbase.php';
        if(isset($_POST['Continue'])) {
            if(isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM tblaccount WHERE Student_id = '$username' AND Pass = '$password'";
                $res = $CON->query($sql);

                $flag = 0;

                while($row = $res->fetch_assoc()) {    
                    $fname = $row['Fullname'];
                    $flag = 1;
                }

                if ($flag == 1){
                    echo "<script>window.location.href = 'homepage.php';</script>";
                } else {
                    echo "<script>alert('We didnt recognized your account please try again')</script>";
                }
            } else {
                echo "<script>alert('Username and Password are required')</script>";
                        }
                    }
            include 'dbase.php';

                    if(isset($_POST['username'])){
                       if(isset($_POST['username']));
                    }
                ?>
    </body>
</html>