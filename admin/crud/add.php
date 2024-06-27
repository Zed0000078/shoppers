<?php include 'C:\xampp\htdocs\shoppers_adminpanel\admin\includes\header.php'; ?>




<!-- <div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class">
                <option value="" selected disabled>Select Class</option>
-->
                <?php                 
                    $conn = mysqli_connect("localhost", "root", "", "shoppers") or die("connection failed");
                    
                    $sql1 = "SELECT * FROM featuredproducts ";
                    $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful");

                    while($row1 = mysqli_fetch_assoc($result1)){
                        ?>
                        <option value="<?php echo $row1['name']; ?>"><?php echo $row1['price']; ?></option>
                <?php } ?>
   
   <!--
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save"/>
    </form>
</div>
</div>
</body>
</html> -->