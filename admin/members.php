<?php

session_start();

 $pageTitle='Members';
if(isset($_SESSION['UserName']))
{
  include 'init.php';

  $action=isset($_GET['action']) ? $_GET['action'] : 'Manage';

  if($action  ==  'Manage')
  {
    //Manage Page
  }

  elseif ($action == 'Add'){?>// Start Add Page

    <h1 class="text-center"> Add New Member </h1>

    <div class="container">
        <form class="form-horizontal" action="?action=Insert" method="POST">

          <!-- Start UserName Field -->
          <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">User Name</label>
              <div class="col-sm-10 col-md-6">
                <input type="text" name="username"  required="required" class="form-control" autocomplete="off" placeholder="UserName To Login Shop"/>
              </div>
          </div>
          <!-- End UserName Field -->

          <!-- Start password Field -->
          <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">Password</label>
              <div class="col-sm-10 col-md-6">
            <input type="password" name="password" class="pass form-control" required="required" autocomplete="new-password" placeholder="Password Should be hard"/>
            <i class="show-pass fa fa-eye fa-2x"></i>
              </div>
          </div>
          <!-- End password Field -->

          <!-- Start Email Field -->
          <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-10 col-md-6">
                <input type="email" name="Email"  required="required" class="form-control" placeholder="Email must be Valid"/>
              </div>
          </div>
          <!-- End Email Field -->

          <!-- Start Full Name Field -->
          <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">Full Name</label>
              <div class="col-sm-10 col-md-6">
                <input type="text" name="fullname"  required="required" class="form-control" placeholder="FullName appear in Your Profile"/>
              </div>
          </div>
          <!-- End Full Name Field -->

          <!-- Start Button Field -->
          <div class="form-group form-group-lg">

              <div class="col-sm-offset-3 col-sm-10">
                <input type="submit" value="Add Member" class="btn btn-primary" />
              </div>
          </div>
          <!-- End button Field -->

        </form>
    </div>




  <?php

      }// End Add Page
          elseif($action   ==  'Insert')
          {
            if($_SERVER['REQUEST_METHOD'] =='POST')
            {
               echo "<h1 class='text-center'> Update Member </h1>";


                    $name     = $_POST['username'];
                    $Password = $_POST['password'];
                    $email    = $_POST['Email'];
                    $fullname = $_POST['fullname'];


                    $hashPass=sha1($_POST['password']);

                    //validate

                    $FormErrors = array();

                    if(strlen($name) < 4 || strlen($name) > 20)
                    {
                      $FormErrors[]="UserName Should be btween 4 to 20 <strong> character</strong> :)<br>";
                    }

                    if(empty($name))
                    {
                      $FormErrors[]="UserName Cannot be <strong> Empty</strong><br>";
                    }
                    if(empty($Password))
                    {
                      $FormErrors[]="Password Cannot be <strong> Empty</strong><br>";
                    }
                    if(empty($email))
                    {
                      $FormErrors[]="Email Cannot be <strong> Empty</strong><br>";
                    }
                    if(empty($fullname))
                    {
                      $FormErrors[]="FullName Cannot be<strong> Empty</strong><br>";
                    }

                    foreach ($FormErrors as $errors ) {
                       echo '<div class="alert alert-danger">'.$errors.'</div>';
                    }



            }else {
                echo "<br>Sorry U cannot brawse the Page directly<br>";
                  }


          }

          elseif ($action == 'Edit') {// Start Edit Page

            $userid=isset($_GET['id'] ) && is_numeric($_GET['id'])  ?intval($_GET['id']):0;

            $stmt=$con->prepare("SELECT * FROM users WHERE UserId=? LIMIT 1");
            $stmt->execute(array($userid));
            $row=$stmt->fetch();
            $count=$stmt->rowCount();

              if($count > 0){?>



                      <h1 class="text-center"> Edit Member </h1>

                      <div class="container">
                          <form class="form-horizontal" action="?action=Update" method="POST">

                            <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
                            <!-- Start UserName Field -->
                            <div class="form-group form-group-lg">
                              <label class="col-sm-3 control-label">User Name</label>
                                <div class="col-sm-10 col-md-6">
                                  <input type="text" name="username" value="<?php echo $row['UserName'];?>" required="required" class="form-control" autocomplete="off"/>
                                </div>
                            </div>
                            <!-- End UserName Field -->

                            <!-- Start password Field -->
                            <div class="form-group form-group-lg">
                              <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-10 col-md-6">
                              <input type="hidden" name="OldPassword" value="<?php echo $row['Password'] ; ?>"/>
                              <input type="password" name="NewPassword" class="form-control" autocomplete="new-password"/>
                                </div>
                            </div>
                            <!-- End password Field -->

                            <!-- Start Email Field -->
                            <div class="form-group form-group-lg">
                              <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-10 col-md-6">
                                  <input type="email" name="Email" value="<?php echo $row['Email'];?>" required="required" class="form-control" />
                                </div>
                            </div>
                            <!-- End Email Field -->

                            <!-- Start Full Name Field -->
                            <div class="form-group form-group-lg">
                              <label class="col-sm-3 control-label">Full Name</label>
                                <div class="col-sm-10 col-md-6">
                                  <input type="text" name="fullname" value="<?php echo $row['FullName'];?>" required="required" class="form-control" />
                                </div>
                            </div>
                            <!-- End Full Name Field -->

                            <!-- Start Button Field -->
                            <div class="form-group form-group-lg">

                                <div class="col-sm-offset-3 col-sm-10">
                                  <input type="submit" value="Save" class="btn btn-primary" />
                                </div>
                            </div>
                            <!-- End button Field -->

                          </form>
                      </div>




            <?php }else{

                  echo "Sorry, No Shuch between This User ";
                }

         }// End Edit Page
          elseif ($action ==  'Update') {     //start Update Page



              if($_SERVER['REQUEST_METHOD'] =='POST')
              {
                 echo "<h1 class='text-center'> Update Member </h1>";

                      $id       = $_POST['userid'];
                      $name     = $_POST['username'];
                      $email    = $_POST['Email'];
                      $fullname = $_POST['fullname'];

                      //PAssword Trick

                      $pass=empty($_POST['NewPassword']) ? $_POST['OldPassword'] : $pass= sha1($_POST['NewPassword']);

                      $FormErrors = array();

                      if(strlen($name) < 4 || strlen($name) > 20)
                      {
                        $FormErrors[]="UserName Should be btween 4 to 20 :)<br>";
                      }

                      if(empty($name))
                      {
                        $FormErrors[]="UserName Cannot be Empty<br>";
                      }
                      if(empty($email))
                      {
                        $FormErrors[]="Email Cannot be Empty<br>";
                      }
                      if(empty($fullname))
                      {
                        $FormErrors[]="FullName Cannot be Empty<br>";
                      }

                      foreach ($FormErrors as $errors ) {
                         echo '<div class="alert alert-danger">'.$errors.'</div>';
                      }

                      $stmt=$con->prepare('UPDATE users SET UserName=?, Email=?,FullName=?,Password=? WHERE UserId=? ');

                      $stmt->execute(array($name ,$email, $fullname,$pass,$id));

                      echo $stmt->rowCount().'Record';

              }else {
                  echo "<br>Sorry U cannot brawse the Page directly<br>";
                    }

         }          //End Update Page

  include $tpl.'footer.php';
}
else {
  header('Location:index.php');
  exit();
}
