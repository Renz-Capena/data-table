<?php
    require "db.php";

    $getallData = "SELECT * FROM users";
    $list = $con->query($getallData);
    $fetch = $list->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class='container mt-5'>
        <h1 class='text-center'>Data Table Practice</h1>

        <div class="input-group my-5 w-25">
            <span class="input-group-text" id="basic-addon1">Gender</span>
            <select id='genderFilter' class="form-select" aria-label="Default select example">
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div id='tableContainer'>
            <table id='table' class='display text-center'>
                <thead>
                    <tr>
                        <th class='text-center'>id</th>
                        <th class='text-center'>name</th>
                        <th class='text-center'>number</th>
                        <th class='text-center'>gender</th>
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
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#table").DataTable()

            $("#genderFilter").change(function(){
                const value = $(this).val()

                $.ajax({
                    url:'newTable.php',
                    method:'post',
                    data:{
                        gender : value
                    },
                    success(e){
                        // alert()
                        $("#tableContainer").html(e)
                    }
                })
            })
        })
    </script>
</body>
</html>