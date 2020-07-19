<?php

    session_start();
    ob_start();

    $pageTitle = 'Employees';

    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
        include 'connect.php';
        include 'Includes/functions/functions.php'; 
        include 'Includes/templates/header.php';
        include 'Includes/templates/navbar.php';

        ?>

            <!-- THIS CODE IS FOR ADDING ACTIVE STYLE TO CURRENT LINK ITEM IN NAVBAR -->

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script type="text/javascript">

                var vertical_menu = document.getElementById("vertical-menu");


                var current = vertical_menu.getElementsByClassName("active_link");

                if(current.length > 0)
                {
                    current[0].classList.remove("active_link");   
                }
                
                vertical_menu.getElementsByClassName('employees_link')[0].className += " active_link";

            </script>

        <?php

            $do = '';

            if(isset($_GET['do']) && in_array($_GET['do'], array('Add','Edit')))
            {
                $do = htmlspecialchars($_GET['do']);
            }
            else
            {
                $do = 'Manage';
            }


            if($do == 'Manage')
            {
                $stmt = $con->prepare("SELECT * FROM employees");
                $stmt->execute();
                $employees = $stmt->fetchAll();

                ?>

                    <div class="card">
                        <div class="card-header">
                            Employees Table
                        </div>
                        <div class="card-body">

                            <!-- ADD NEW EMPLOYEE BUTTON -->

                            <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#add_new_employee" data-placement="top" style="margin-bottom: 10px;">
                                <i class="fa fa-plus"></i>
                                Add Employee
                            </button>

                            <!-- ADD NEW EMPLOYEE Modal -->

                            <div class="modal fade" id="add_new_employee" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Add new employee
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-info add_employee_bttn">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- EMPLOYEES TABLE -->

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">First name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($employees as $employee)
                                        {
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $employee['first_name'];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $employee['last_name'];
                                                echo "</td>";
                                                echo "<td>";
                                                    $delete_data = "delete_".$employee["employee_id"];
                                                    $edit_data = "edit_".$employee["employee_id"];
                                                    ?>
                                                        <ul class="list-inline m-0">

                                                            <!-- EDIT BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Edit">
                                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $edit_data; ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>

                                                                <!-- EDIT Modal -->

                                                                <div class="modal fade" id="<?php echo $edit_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $edit_data; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <button type="button" data-id = "<?php echo $employee['employee_id']; ?>" class="btn btn-danger edit_employee_bttn">Save</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <!-- DELETE BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Delete">
                                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $delete_data; ?>" data-placement="top"><i class="fa fa-trash"></i></button>

                                                                <!-- Delete Modal -->

                                                                <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Are you sure you want to delete this employee?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <button type="button" data-id = "<?php echo $employee['employee_id']; ?>" class="btn btn-danger delete_employee_bttn">Delete</button>
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
            }

        /* FOOTER BOTTOM */

        include 'Includes/templates/footer.php';
    }
    else
    {
        header('Location: index.php');
        exit();
    }

?>

<script type="text/javascript">
    $('.delete_employee_bttn').click(function()
    {
        var employee_id = $(this).data('id');
        var do_ = "Delete";

        $.ajax(
        {
            url:"ajax_files/employees_ajax.php",
            method:"POST",
            data:{employee_id:employee_id,do:do_},
            success: function (data) 
            {
                swal("Delete Employee","The employee has been deleted successfully!", "success").then((value) => {
                    window.location.replace("employees.php");
                });     
            },
            error: function(xhr, status, error) 
            {
                alert('AN ERROR HAS BEEN ENCOUNTERED WHILE TRYING TO EXECUTE YOUR REQUEST');
            }
          });
    });

</script>