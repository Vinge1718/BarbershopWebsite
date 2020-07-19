<?php

    session_start();

    $pageTitle = 'Clients';

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
                
                vertical_menu.getElementsByClassName('clients_link')[0].className += " active_link";

            </script>

        <?php

            $stmt = $con->prepare("SELECT * FROM clients");
            $stmt->execute();
            $rows_clients = $stmt->fetchAll(); 
            
        ?>
            <div class="card">
                <div class="card-header">
                    Clients Table
                </div>
                <div class="card-body">

                    <!-- ADD NEW CLIENT BUTTON -->


                    <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#add_new_client" data-placement="top">
                        <i class="fa fa-plus"></i> 
                        Add Client
                    </button>

                    <!-- Add New Client Modal -->

                    <div class="modal fade" id="add_new_client" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <!-- CLIENT NAME -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name">First name</label>
                                                <input type="text" id="first_name_input" class="form-control" placeholder="First name" onkeyup="this.value=this.value.replace(/[^a-z]/g,'');" name="first_name">
                                                <div class="alert alert-danger" id="required_first_name" style="display: none;">
                                                    <div class="messages">
                                                        <div>First name is required!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last_name">Last name</label>
                                                <input type="text" id="last_name_input" class="form-control" placeholder="Last name" onkeyup="this.value=this.value.replace(/[^a-z]/g,'');" name="last_name">
                                                <div class="alert alert-danger" id="required_last_name" style="display: none;">
                                                    <div class="messages">
                                                        <div>Last name is required!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PHONE NUMBER -->

                                    <div class="form-group">
                                        <label for="phone_number">Phone number</label>
                                        <input type="text" id="phone_number_input" class="form-control" placeholder="Phone number" name="phone_number">
                                        <div class="alert alert-danger" id="required_phone_number" style="display: none;">
                                            <div class="messages">
                                                <div>Phone number is required!</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" id="email_input" class="form-control" placeholder="E-mail" name="email">
                                        <div class="alert alert-danger" id="required_email" style="display: none;">
                                            <div class="messages">
                                                <div>Email is required!</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-info" id="add_client_bttn">Add Client</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($rows_clients as $client)
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $client['first_name'];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $client['last_name'];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $client['phone_number'];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $client['client_email'];
                                        echo "</td>";
                                        echo "<td>";
                                            $delete_data = "delete_".$client["client_id"];
                                        ?>
                                            <ul class="list-inline m-0">

                                                <!-- EDIT BUTTON -->

                                                <li class="list-inline-item" data-toggle="tooltip" title="Edit">
                                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-placement="top">
                                                        <a href="clients.php?do=Edit&client_id=<?php echo $client['client_id']; ?>" style="color: white;">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </button>
                                                </li>

                                                <!-- DELETE BUTTON -->

                                                <li class="list-inline-item" data-toggle="tooltip" title="Delete">
                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $delete_data; ?>" data-placement="top"><i class="fa fa-trash"></i></button>

                                                    <!-- Delete Modal -->

                                                    <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Client</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this Client "<?php echo $client['first_name']." ".$client['last_name']; ?>"?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" data-id = "<?php echo $client['client_id']; ?>" class="btn btn-danger delete_client_bttn">Delete</button>
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

<script type="text/javascript">

    // When add client button is clicked

    $('#add_client_bttn').click(function()
    {
        var client_first_name = $("#first_name_input").val();
        var client_last_name = $("#last_name_input").val();
        var client_email = $("#email_input").val();
        var client_phone_number = $("#phone_number_input").val();

        var do_ = "Add";

        if($.trim(client_first_name) == "")
        {
            $('#required_first_name').css('display','block');
        }
        else
        {
            if(client_first_name.length < 5)
            {
                $('#required_first_name').text("Enter at least 5 letters!");
                $('#required_first_name').css('display','block');
            }
            else
            {
                $('#required_first_name').css('display','none');
            }
        }
        if($.trim(client_last_name) == "")
        {
            $('#required_last_name').css('display','block');
        }
        if($.trim(client_email) == "")
        {
            $('#required_email').text("Email is required!");
            $('#required_email').css('display','block');
        }
        else
        {
            if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(client_email) != true)
            {
                $('#required_email').text("Invalid Email format");
                $('#required_email').css('display','block');
            }
        }
        if($.trim(client_phone_number) == "")
        {
            $('#required_phone_number').css('display','block');
        }
        else
        {
            if( /^\d*$/.test(value) != true)
            {

            }
        }
        
    });

</script>