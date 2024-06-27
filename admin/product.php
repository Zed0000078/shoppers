<?php 
include "config/conn.php";

include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/navbar.php';


// session_start();
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
        </div><!-- /.col -->
        
    </div><!-- /.row -->
   
    <div><h1>Product List</h1></div>
    <div class="card">
              <div class="card-header" style="display:flex; justify-content:end">
                <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left:500px;">
  Add
</button>
              </div>

              <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span id="editing">Add a new product</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                          <div class="row">

                          
                         <div class="col-lg-12 form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Product name">

                         </div>
                         <div class="col-lg-12 form-group">
                          <label for="">Comment</label>
                          <input type="text" name="comment" id="comment" class="form-control" placeholder="Comment">

                         </div>

                         <div class="col-lg-12 form-group">
                          <label for="">Price</label>
                          <input type="text" name="price" id="price" class="form-control" placeholder="Price">

                         </div>

                         <div class="col-lg-12 form-group">
                          <label for="">Description</label>
                          <textarea type="text" name="description" id="description" class="form-control" placeholder="Description"></textarea>

                         </div>

                         <div class="col-lg-12 form-group">
                          <label for="">Upload Image</label>
                          <input type="file" name="image" accept="image/*" class="form-control" id="image">

                         </div>
                         </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="hidden" value="" name="editId" id="id" >
                          <input type="hidden" value="" name="oldImage" id="img">
                          <button  type="submit" class="btn btn-primary" name="addproduct"><span id="done">Add</span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal End -->
                 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Comment</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $sql1 = "SELECT * from featuredproducts";
                  
                  
                  $sql_result = mysqli_query($conn, $sql1);
                  while($row1 = mysqli_fetch_assoc($sql_result)){
                    ?>
                    <tr>
                    <td><?php echo $row1['id'];?></td>
                    <td><?php echo $row1['name'];?></td>
                    <td><?php echo $row1['comment'];?></td>
                    <td><?php echo $row1['price'];?></td>
                    
                    <td><img src="<?php echo "upload/".$row1['image'];?>" alt="image" style="width:80px"></td>
                    <!-- <img src="./upload/<php echo $row1['image'];?>" alt=""> -->
                      <!-- <td>X</td> -->
                      <td><?php echo $row1['description'];?></td>
                      <td>
                        <a href="" onclick="showuserdata('<?php echo $row1['id']; ?>', '<?php echo $row1['name']; ?>', '<?php echo $row1['comment']; ?>', '<?php echo $row1['price']; ?>', '<?php echo $row1['image']; ?>', '<?php echo $row1['description']; ?>');" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-sm">Edit</a>
                      </td>
                      <td>
                        <a href="action.php?deleteId=<?php echo $row1['id'];?>" onclick="confirmDelete(event)" class="btn btn-danger btn-sm" >Delete</a>
                        
                      </td>
                   
                  </tr>
                 
                    <?php }?>
                  <?php
                  
                    $sql2 = "SELECT * from featuredproducts ";
                 
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    ?>
                    
                    
                    <script>
        function showuserdata(id, name, comment, price, image,description) {   
          document.getElementById('id').value = id;
          document.getElementById('name').value = name;
          document.getElementById('comment').value = comment;
          document.getElementById('price').value = price;
          document.getElementById('img').value = image;
          document.getElementById('description').value = description;
          // document.getElementById('editing').value = "edit";
          $('#editing').text('Edit the existing product');
          $('#done').text('Done');


        }


        function confirmDelete(event){
            var confirmation = confirm("Are you sure you want to delete?");
            
            // If the user cancels, prevent the default anchor behavior
            if (!confirmation) {
                event.preventDefault();
          }
        }
      </script>
                    <!-- Modal of editing -->
                
                <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit the product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                          <div class="row">

                          
                         <div class="col-lg-12 form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" id="namessss" value="" class="form-control">

                         </div>
                         <div class="col-lg-12 form-group">
                          <label for="">Comment</label>
                          <input type="text" name="comment" id="comments" value="gfgf" class="form-control" placeholder="Comment">

                         </div>

                         <div class="col-lg-12 form-group">
                          <label for="">Price</label>
                          <input type="text" name="price" id="price" class="form-control" placeholder="Price">

                         </div>

                         <div class="col-lg-12 form-group">
                          <label for="">Upload Image</label>
                          <input type="file" name="image" accept="image/*" class="form-control">

                         </div>
                         </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button  type="submit" class="btn btn-primary" name="addproduct">Add</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> -->
                <!-- Modal End -->
                  
                  
                  </tbody>
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>


    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



  </div>
  <!-- /.content-wrapper -->
    

    <?php include 'includes/footer.php';?>