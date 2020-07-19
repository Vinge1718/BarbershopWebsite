<?php
    ob_start();
    session_start();

    $pageTitle = 'Service Categories';

    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
        include 'connect.php';
        include 'Includes/functions/functions.php'; 
        include 'Includes/templates/header.php';
        include 'Includes/templates/navbar.php';

        ?>
            <!-- THIS CODE IS FOR ADDING ACTIVE STYLE TO CURRENT LINK ITEM IN NAVBAR -->

            <script type="text/javascript">

                var vertical_menu = document.getElementById("vertical-menu");


                var current = vertical_menu.getElementsByClassName("active_link");

                if(current.length > 0)
                {
                    current[0].classList.remove("active_link");   
                }
                
                vertical_menu.getElementsByClassName('service_categories_link')[0].className += " active_link";

            </script>
        <?php

            $stmt = $con->prepare("SELECT * FROM service_categories");
            $stmt->execute();
            $rows_categories = $stmt->fetchAll(); 
            
            ?>
            <div class="card">
                <div class="card-header">
                    Categories Table
                </div>
                <div class="card-body">

                    <!-- ADD NEW CATEGORY BUTTON -->

                    <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#add_new_category" data-placement="top">
                        <i class="fa fa-plus"></i> 
                        Add Category
                    </button>

                    <!-- Add New Category Modal -->

                    <div class="modal fade" id="add_new_category" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="category_name">Category name</label>
                                        <input type="text" id="category_name_input" class="form-control" placeholder="Category Name" name="category_name">
                                        <div class="alert alert-danger" id="required_category_name" style="display: none;">
                                            <div class="messages">
                                                <div>Category name is required!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-info" id="add_category_bttn">Add Category</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CATEGORIES TABLE -->

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Category ID</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($rows_categories as $category)
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $category['category_id'];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $category['category_name'];
                                        echo "</td>";
                                        echo "<td>";
                                        $delete_data = "delete_".$category["category_id"];
                                            ?>
                                            <!-- DELETE BUTTON -->
                                            <ul>
                                                <li class="list-inline-item" data-toggle="tooltip" title="Delete">
                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $delete_data; ?>" data-placement="top"><i class="fa fa-trash"></i></button>

                                                    <!-- Delete Modal -->

                                                    <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this Category "<?php echo $category['category_name']; ?>"?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" data-id = "<?php echo $category['category_id']; ?>" class="btn btn-danger delete_category_bttn">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <?php
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php

        /* FOOTER BOTTOM */

        include 'Includes/templates/footer.php'; 
    }

    else
    {
        header('Location: index.php');
        exit();
    }

?>




<!-- JAVASCRIPT AND JQUERY SCRIPTS -->

<script type="text/javascript">

    // When add category button is clicked

    $('#add_category_bttn').click(function()
    {
        var category_name = $("#category_name_input").val();
        var do_ = "Add";

        if($.trim(category_name) == "")
        {
            $('#required_category_name').css('display','block');
        }
        else
        {
            $.ajax(
            {
                url:"ajax_files/service_categories_ajax.php",
                method:"POST",
                data:{category_name:category_name,do:do_},
                dataType:"JSON",
                success: function (data) 
                {
                    if(data['alert'] == "Warning")
                    {
                        swal("Warning",data['message'], "warning").then((value) => {});
                    }
                    if(data['alert'] == "Success")
                    {
                        swal("New Category",data['message'], "success").then((value) => {
                            window.location.replace("service_categories.php");
                        });
                    }
                    
                },
                error: function(xhr, status, error) 
                {
                    alert('AN ERROR HAS BEEN ENCOUNTERED WHILE TRYING TO EXECUTE YOUR REQUEST');
                }
            });
        }
    });

    // When delete category button is clicked

    $('.delete_category_bttn').click(function()
    {
        var category_id = $(this).data('id');
        var do_ = "Delete";

        $.ajax(
        {
            url:"ajax_files/service_categories_ajax.php",
            method:"POST",
            data:{category_id:category_id,do:do_},
            success: function (data) 
            {
                swal("Delete Category","The category has been delete successfully!", "success").then((value) => {
                    window.location.replace("service_categories.php");
                });     
            },
            error: function(xhr, status, error) 
            {
                alert('AN ERROR HAS BEEN ENCOUNTERED WHILE TRYING TO EXECUTE YOUR REQUEST');
            }
          });
    });

</script>
