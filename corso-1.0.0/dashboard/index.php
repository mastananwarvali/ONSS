<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    /* CSS Styles */
    .container-fluid {
      padding: 20px;
    }

    .small-box {
      border-radius: 10px;
      overflow: hidden;
      position: relative;
      display: block;
      margin-bottom: 20px;
      box-shadow: 0 0 1px rgba(0, 0, 0, 0.125);
    }

    .small-box .inner {
      padding: 10px;
    }

    .small-box h3, .small-box p {
      margin: 0;
      color: #fff;
    }

    .small-box.bg-warning {
      background-color: violet;
      /* background-color: #333; */
    }

    .small-box.bg-danger {
      /* background-color: #dc3545; */
      background-color: #333;
    }

    .small-box .icon {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 50px;
      color: rgba(0, 0, 0, 0.15);
    }
    

    .small-box-footer {
      color: #fff;
      display: block;
      padding: 0px 0;
      text-align: center;
      background-color: rgba(0, 0, 0, 0.1);
      text-decoration: none;
    }

    .small-box-footer:hover {
      background: rgba(0, 0, 0, 0.15);
      text-decoration: none;
    }
  </style>
</head>
<body>
  

  <?php 
  include ('includes/connection.php');
  include('includes/adminheader.php');
  ?>

  <div id="wrapper">
    <?php include 'includes/adminnav.php';?>
    <div id="page-wrapper">
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              Welcome 
              <small><?php echo $_SESSION['name']; ?></small>
            </h1>
            <?php if($_SESSION['role'] == 'admin') { ?>
              <h3 class="page-header">
                <center> <marquee width = 70% ><font color="green" > Notes uploaded by various users</font></marquee></center>
              </h3>
              <div class="row">
                <div class="col-lg-12">
                  <div class="table-responsive">
                    <form action="" method="post">
                      <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type </th>
                            <th>Uploaded on</th>
                            <th>Uploaded by </th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Approve</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = "SELECT * FROM uploads ORDER BY file_uploaded_on DESC";
                          $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                          if (mysqli_num_rows($run_query) > 0) {
                            while ($row = mysqli_fetch_array($run_query)) {
                              $file_id = $row['file_id'];
                              $file_name = $row['file_name'];
                              $file_description = $row['file_description'];
                              $file_type = $row['file_type'];
                              $file_date = $row['file_uploaded_on'];
                              $file_uploader = $row['file_uploader'];
                              $file_status = $row['status'];
                              $file = $row['file'];

                              echo "<tr>";
                              echo "<td>$file_name</td>";
                              echo "<td>$file_description</td>";
                              echo "<td>$file_type</td>";
                              echo "<td>$file_date</td>";
                              echo "<td><a href='viewprofile.php?name=$file_uploader' target='_blank'> $file_uploader </a></td>";
                              echo "<td>$file_status</td>";
                              echo "<td><a href='allfiles/$file' target='_blank' style='color:green'>View </a></td>";
                              echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to approve this note?')\"href='?approve=$file_id'><i class='fa fa-times' style='color: red;'></i>Approve</a></td>";
                              echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='?del=$file_id'><i class='fa fa-times' style='color: red;'></i>delete</a></td>";
                              echo "</tr>";
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
              <?php
              if (isset($_GET['del'])) {
                $note_del = mysqli_real_escape_string($conn, $_GET['del']);
                $file_uploader = $_SESSION['username'];
                $del_query = "DELETE FROM uploads WHERE file_id='$note_del'";
                $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
                if (mysqli_affected_rows($conn) > 0) {
                  echo "<script>alert('note deleted successfully'); window.location.href='index.php';</script>";
                } else {
                  echo "<script>alert('error occured.try again!');</script>";
                }
              }

              if (isset($_GET['approve'])) {
                $note_approve = mysqli_real_escape_string($conn,$_GET['approve']);
                $approve_query = "UPDATE uploads SET status='approved' WHERE file_id='$note_approve'";
                $run_approve_query = mysqli_query($conn, $approve_query) or die (mysqli_error($conn));
                if (mysqli_affected_rows($conn) > 0) {
                  echo "<script>alert('Your notes approved successfully !'); window.location.href='index.php';</script>";
                } else {
                  echo "<script>alert('Warning !! Error occured. Try again!');</script>";
                }
              }
            } else {
            ?>
              <h3 class="page-header">
                <center> <marquee width = 70% ><font color="green" ><?php echo $_SESSION['course']; ?> Engineering </font><font color="brown"> notes uploaded by various users</font></marquee></center>
              </h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <form action="" method="post">
                <table class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Type </th>
                      <th>Uploaded by</th>
                      <th>Uploaded on</th>
                      <th>Download</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $currentusercourse = $_SESSION['course'];
                    $query = "SELECT * FROM uploads WHERE file_uploaded_to = '$currentusercourse' AND status = 'approved' ORDER BY file_uploaded_on DESC";
                    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($run_query) > 0) {
                      while ($row = mysqli_fetch_array($run_query)) {
                        $file_id = $row['file_id'];
                        $file_name = $row['file_name'];
                        $file_description = $row['file_description'];
                        $file_type = $row['file_type'];
                        $file_date = $row['file_uploaded_on'];
                        $file = $row['file'];
                        $file_uploader = $row['file_uploader'];

                        echo "<tr>";
                        echo "<td>$file_name</td>";
                        echo "<td>$file_description</td>";
                        echo "<td>$file_type</td>";
                        echo "<td><a href='viewprofile.php?name=$file_uploader' target='_blank'> $file_uploader </a></td>";
                        echo "<td>$file_date</td>";
                        echo "<td><a href='allfiles/$file' target='_blank' style='color:green'>Download </a></td>";
                        echo "</tr>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <a href="ask_question.php" class="small-box-footer">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Post Questions</h3>
              <p>Add</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <a href="view_questions.php" class="small-box-footer">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>View Questions</h3>
              <p>View</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <a href="uploadnote.php" class="small-box-footer">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Upload Note</h3>
              <p>Add</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <a href="notes.php" class="small-box-footer">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>View All Notes</h3>
              <p>View</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </a>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>