 <!-- /.content-wrapper -->
 
  <?php
    $query="SELECT * FROM tbl_website_info WHERE id='5'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $section_name = $row["section_name"];
            $section_data = $row["section_data"];
            
        }
    }
    ?>

  <footer class="main-footer">
   <?php echo $section_data; ?>
    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer>

  