<?php
    require "db.php";

    $gender = $_POST['gender'];

    $getallData = "SELECT * FROM users WHERE gender='$gender'";
    $list = $con->query($getallData);
    $fetch = $list->fetch_assoc();
?>
<div>
    <!-- jquery -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <!-- datatable -->
    <!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->

    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

    <table id='table' class='display'>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>number</th>
                <th>gender</th>
            </tr>
        </thead>
        <tbody>
            <?php do{ ?>
            <tr>
                <td><?php echo $fetch['id'] ?></td>
                <td><?php echo $fetch['name'] ?></td>
                <td><?php echo $fetch['number'] ?></td>
                <td><?php echo $fetch['gender'] ?></td>
            </tr>
            <?php }while($fetch = $list->fetch_assoc()) ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function(){
            $("#table").DataTable()
        })
    </script>
</div>