<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
}
include 'config.php';

  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Buy Transactions</title>

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style3.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
</head>
<body>

<!--navbar-->

<!--about section-->
<section class="section about" id="about">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title"><span class="subtitle">View Buy Transactions</span></h2>
        </div>
        <!--end of title-->
    </section>
    <!--end of about section-->

<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th >Client ID</th>
            <th >Transaction ID</th>
            <th >Amount</th>
            <th >Email</th>
            <th >csku</th>
            <th >National ID</th>
            <th >Date Approved</th>
            <th >Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $sql= "SELECT * FROM buy_transactions";
                $query= mysqli_query($conn,$sql);
                
                
                while($result= mysqli_fetch_assoc($query)){

                
            ?>
                        <tr>
                        <td><?php echo $result['client_id']; ?></td>
                            <td><?php echo $result['transaction_id']; ?></td>
                            <td><?php echo $result['amount']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['csku']; ?></td>
                            <td><?php echo $result['nationalid']; ?></td>
                            <td><?php echo $result['regdate']; ?></td>
                            <td>
                            
                            <a href="deletebuytransaction.php?transaction_id=<?php echo $result['transaction_id']; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php
                }
                ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>