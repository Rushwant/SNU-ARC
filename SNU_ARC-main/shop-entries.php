<?php 
    include_once('shop-header.php');
    include_once('config.php');
    // session_start();

    $id = $_SESSION["id"];

    $query = "SELECT * FROM gatepass WHERE approval_status = 'approved'";
    $result = mysqli_query($conn, $query);


    // $result = mysqli_fetch_assoc($result);
?>

<body>
    <div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Check Previous</p>
						<h1>Gate-Entries</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <br>
    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
    
    <div class="card-body box">

        <p><span class="orange-text font-weight-bold">Visitor:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['name'] ?></span></p>
        <p><span class="orange-text font-weight-bold">Phone Number:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['ph_number'] ?></span></p>
        <p><span class="orange-text font-weight-bold">Purpose:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['purpose'] ?></span></p>
        <p><span class="orange-text font-weight-bold">Approved By:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['shop_id'] ?></span></p>
        <p class="approval-status mr-3 mb-2"><span class="orange-text font-weight-bold">Status:</span>
        <?php if($row['approval_status'] == 'unapproved'){
            echo '<span class="font-weight-bold" style="color: red">'.$row['approval_status'].'</span>';
        }
        else{
            echo '<span class="font-weight-bold" style="color: green">'.$row['approval_status'].'</span>';
        }
        ?>
        </p>
        
    </div>
    <br>


    <?php } ?>

    

</body>
	<!-- end hero area -->
<?php include_once("footer.php"); ?>