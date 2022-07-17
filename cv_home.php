<?php 
    require_once("header.php");
    include_once './system/config/database.php';
?>
<?php
 if(isset($_GET['action'])){
      if($_GET['action'] == "logout"){
        session_destroy();
        // header("Refresh:0; url=login_account.php");
        header("location: partner_login.php");
      }
    }
    // register success 
    if(@$_GET['sms']=='register_success'){
        $sms = '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success!</strong> register successfull. Please Login to System ...
        </div>';
    }
    // Login information 
    if(isset($_POST['btn_login'])){
      $username = trim($connect->real_escape_string(@$_POST['txt_login_username']));
      $password = trim($connect->real_escape_string(@$_POST['txt_login_password']));
      $login_type = trim($connect->real_escape_string(@$_POST['login_type']));
      // $enctypt_password = sha1(md5($pass)).sha1("0962195196");
      
      $stm = "SELECT * FROM tbl_users WHERE user_name='{$username}' AND user_password='{$password}' AND user_position = 3";

      $user = $connect->query($stm);
      mysqli_error($user);
      if(mysqli_num_rows($user)==1){
        $user_data = mysqli_fetch_object($user);
        $_SESSION['user'] = $user_data;
        $_SESSION['allowLog'] = "logAlready";

        // echo $_SESSION['user']->user_email  ** example when u want to user session
        header("location: system/partner/dashboard/partner_admin.php");
      }else{
        $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> invalid account ...
            </div>';
      }
    }
    // mysqli_close($connect);
?>
<div class="container py-5">

    <div class="card py-5 px-4">
<div class="row">
<div class="col-md-4 col-sm-12">
        <!-- Job Vacancy -->
     <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title" data-toggle="collapse" href="#collapse1" style="cursor:pointer">
                 
            <a data-toggle="collapse"><?=(@$_SESSION['lang']=='en')? 'JOB VACANCIES':'ការងារវិជ្ជាជីវៈ' ?></a>

           
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
          <ul class="list-group">
            <?php 
                        $i = 0;
                        $get_data = $connect->query("SELECT * FROM job_announment AS A ORDER BY ann_id ASC");
                        while ($row = mysqli_fetch_object($get_data)) {
                    ?>
                        <a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>" target="_blank"><li class="list-group-item" style="color:#24407C !important;"><?php echo $row->ann_title_en; ?></li></a>
                         <?php } ?>
                      </ul>
          <div class="panel-footer">&nbsp;</div>
        </div>
      </div>
    </div>
    <!-- End -->
</div>
    
 
<div class="col-md-8 col-sm-12">


       <div class="panel panel-default">
            <div class="panel-heading text-center pb-4">
                <h3 id="title_login">Login as Car's Owner</h3>
                   
            </div>
            <div class="panel-body">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" role="form">
          <?= @$sms ?>
          <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" style="text-transform: capitalize;">User Name***</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" class="form-control"
                         name="txt_login_username" placeholder="Your Username" required>
                    </div>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="pwd" style="text-transform: capitalize;">Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="password" type="password" class="form-control" 
                    name="txt_login_password" placeholder="Your Password" required>
                  </div>
                </div>  
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                 <label for="account_type">Account Type***</label>
                 <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-circle-o" style="color: #a4509f;"></i></span>
                  <select name="login_type" onchange="OnChangeSelect()" class="form-control" style="color: #a4509f;" id="account_type" required>
                    <option value="1">CAR'S OWNER</option>
                    <option value="2">RICKSHAW'S OWNER</option>
                    <option value="tour_guide">TOUR GUIDE</option>
                    <option value="driver">DRIVER</option>
                    <option value="hotel_guesthouse">HOTEL & GUESTHOUSE</option>
                    <option value="freelancer">INTRODUCER</option>
                  </select>
                 </div>
                </div>
                <script type="text/javascript">
                  function OnChangeSelect(){
                      var cut = document.getElementById("account_type");
                      var title = document.getElementById("title_login");
                      var index = cut.selectedIndex;
                      if(index == 0){
                          title.innerHTML = "Login as Car's Owner";
                      }
                      if(index == 1){
                          title.innerHTML = "Login as Rickshaw's Owner";
                      }
                      if(index == 2){
                          title.innerHTML = "Login as Tour Guide";
                      }
                      if(index == 3){
                          title.innerHTML = "Login as Driver";
                      }
                      if(index == 4){
                          title.innerHTML = "Login as Hotel & Guesthouse";
                      }
                      if(index == 5){
                          title.innerHTML = "Login as Introducer";
                      }
                  }
                </script>
             
              </div>

              <div class="col-sm-6">
                  <div class="form-group">   
                     <label for="email">Login to Dashboard</label>
                    <button class="form-control" style="background-color: #ec3323; color: white; " type="submit" name="btn_login">SIGN IN <i class="fa fa-sign-in"></i></button>
                  </div>

            
            </div>
          </div><br>
         
        </form>
            </div>              
       </div>
  </div>


</div>
</div>
</div>

<style>
.input-group i {
    position: absolute;
    z-index: +1;
    top: 16px;
    left: 10px;
}
    
   .nice-select ul li:before{display: none;} 
    
    
</style>

<?php require_once("footer.php"); ?>