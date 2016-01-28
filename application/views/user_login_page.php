<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <title>Login/Registeration</title>
    <style type="text/css">
      #container {
        width: 900px;
        min-height: 700px;
        margin: 0px auto;
      }
      #login, #register {
        width: 400px;
        display: inline-block;
        border: 2px solid black;
        margin: 10px;
        padding: 10px 20px;
        vertical-align: top;
      }
      h3 {
        color: purple;
      }
      form label {
        width: 170px !important;
      }
      .col-sm-10 {
        display: inline !important;
        width: 200px;
      }
      p {
        font-size: 11px;
        float: right;
      }
      #dateRangeForm .form-control-feedback {
        top: 0;
        right: -15px;
      }
      button {
        margin: 10px;
        float: right;
        box-shadow: 2px 2px purple;
      }
    </style>
    <script>
      $(document).ready(function() {
          $('#dateRangePicker')
              .datepicker({
                  format: 'yyyy/mm/dd',
                  startDate: '2010/01/01',
                  endDate: '2020/12/30'
              })
      });
    </script>
  </head>
  <body>
  <?php 
    if($this->session->flashdata("login_error")) 
    {
      echo $this->session->flashdata("login_error");
    }
  ?>
    <div id="container">
      <h2>Welcome!</h2>
      <div id="login">
        <h3>Log In</h4>
        <form class="form-horizontal" role="form" action="/main/login" method="post">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">          
              <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
            </div>
          </div>
          <input type="hidden" name="action" value="login" />
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Login</button>
            </div>
          </div>
        </form>
      </div>
      <div id="register">
        <h3>Register</h4>
        <form class="form-horizontal" role="form" action="/main/register" method="post">
          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">          
              <input type="text" class="form-control" id="name" name="name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="alias">Alias:</label>
            <div class="col-sm-10">          
              <input type="text" class="form-control" id="alias" name="alias">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">          
              <input type="password" class="form-control" id="pwd" name="password">
            </div>
            <p>*Password should be at least 8 characters*</p>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
            <div class="col-sm-10">          
              <input type="password" class="form-control" id="pwd" name="confirm_password">
            </div>
          </div>
          <div class="form-group">
	        <label class="col-xs-3 control-label">Date of Birth:</label>
	        <div class="col-xs-5 date">
	            <div class="input-group input-append date" id="dateRangePicker">
	                <input type="date" class="form-control" name="dob" />
	            </div>
	        </div>
          <input type="hidden" name="action" value="register" />
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Register</button>
            </div>
          </div>
        </form>
    </div>
  </body>
</html>
