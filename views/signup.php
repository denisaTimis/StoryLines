<!doctype html>
<html>
  <head>
    <title>Login</title>
    <link rel="icon" href="../graphics/icons/globe.png"/>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/account.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
       <div class="row login-div">
         <h1>Sign Up</h1>
       </div>
      <form method="post" action="profile.php">
        <div class="row login-div">
          <input name="firstName" type="text" class="form-control login-input" placeholder="First Name"/>
          <input name="lastName" type="text" class="form-control login-input" placeholder="Last Name"/>
          <input name="email" type="text" class="form-control login-input" placeholder="Email"/>
          <input name="age" type="text" class="form-control login-input" placeholder="Age"/>

          <div class="optiuniRadio">
            <input type="radio" name="radioGender"  value="Female" id="female">
            <label for="female">Female</label>
            <input type="radio" name="radioGender"  value="Male" id="male">
            <label for="male">Male</label>
          </div>
          
          <input type="password" class="form-control login-input" placeholder="Password"/>      
        </div>
        <div class="row login-div">
          <input name="submit" class="btn btn-light login-button" type="submit" value="Join Now"/>
        </div>
      </form>
      <div class="row back-to-login">
        <label>Already have an account?</label>
        <a type="text"href="./login">Sign In</a>
      </div>
     </div>
  </body>
</html>