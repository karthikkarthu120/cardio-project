<?php
    session_start();

    include 'config.php';
    if(!isset($_SESSION['login']))
    {
        header("Location: login.php");
    }

    if(isset($_GET['del']))
    {
        if(mysqli_query($conn,"delete from user where id = '".$_GET['id']."'"))
        {
            echo "<script>alert('Doctor deleted successfully..!')</script>";
        }
        else
        {
            echo "<script>alert('Unable to delete Doctor..!')</script>";
        }
    }

    include 'link.php';
    include 'sidebar.php';
?>

<!-- Page Content Holder -->
<div id="content">
<?php
    include 'header.php';
?>

<div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>Full Name</th>
										<th>User Name</th>
										<th>Email</th>
										<th>Contact no</th>
										<th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select * from user where type = 'User' order by id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['full_name']);?></td>
                                            <td><?php echo htmlentities($row['username']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td> <?php echo htmlentities($row['contact']);?></td>
                                            <td> <?php if($row['status']){echo 'Active';}else{echo 'In-Active';}?></td>
                                            <td>
                                                <a href="view-doctor.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; 
                                    } ?>
                                </tbody>			
                            </table>
            </div>
          </div>
        </div>

<?php
    include 'footer.php';
?>
        