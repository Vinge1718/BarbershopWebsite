<?php
    session_start();
	$pageTitle = 'Dashboard';

	/* FILE INCLUDES */

	include 'connect.php';
  	include 'Includes/functions/functions.php'; 
	include 'Includes/templates/header.php';

	if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
	{
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
                
                vertical_menu.getElementsByClassName('dashboard_link')[0].className += " active_link";

            </script>

        <?php

            $do = '';

            if(isset($_GET['do']) && in_array($_GET['do'], array('Cancel')))
            {
                $do = $_GET['do'];
            }

            else
                $do = 'Manage';


            if($do == "Manage")
            {

        ?>

        	<!-- TOP 4 CARDS -->

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-green ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-3">
                                    <i class="bs bs-boy fa-4x"></i>
                                </div>
                                <div class="col-sm-9 text-right">
                                    <div class="huge"><span><?php echo countItems("client_id","clients")?></span></div>
                                    <div>Total Clients</div>
                                </div>
                            </div>
                        </div>
                        <a href="clients.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-3">
                                    <i class="bs bs-scissors-1 fa-4x"></i>
                                </div>
                                <div class="col-sm-9 text-right">
                                    <div class="huge"><span>12</span></div>
                                    <div>Total Services</div>
                                </div>
                            </div>
                        </div>
                        <a href="menus.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-sm-6 col-lg-3">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-3">
                                    <i class="bs bs-man fa-4x"></i>
                                </div>
                                <div class="col-sm-9 text-right">
                                    <div class="huge"><span>121</span></div>
                                    <div>Total Employees</div>
                                </div>
                            </div>
                        </div>
                        <a href="employee.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-sm-6 col-lg-3">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-3">
                                    <i class="far fa-calendar-alt fa-4x"></i>
                                </div>
                                <div class="col-sm-9 text-right">
                                    <div class="huge"><span>1211</span></div>
                                    <div>Total Appointments</div>
                                </div>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <!-- START BOOKING TABS -->

            <div class="card">
                <div class="card-header tab" style="padding:0px;    padding: 0px;background: #9e8a78;border-bottom: 0px !important;">
                    <button class="tablinks active" onclick="openTab(event, 'Upcoming')">Upcoming Bookings</button>
                    <button class="tablinks" onclick="openTab(event, 'All')">All Bookings</button>
                    <button class="tablinks" onclick="openTab(event, 'Canceled')">Canceled Bookings</button>
                </div>
                
                <div class="card-body">
                    <div class='responsive-table'>
                        <table class="table X-table tabcontent" id="Upcoming" style="display:table">
                            <thead>
                                <tr>
                                    <th>
                                        Start Time
                                    </th>
                                    <th>
                                        Booked Services
                                    </th>
                                    <th>
                                        End Time Expected
                                    </th>
                                    <th>
                                        Client
                                    </th>
                                    <th>
                                        Employee
                                    </th>
                                    <th>
                                        Manage
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $stmt = $con->prepare("SELECT * 
                                                    FROM appointments a , clients c
                                                    where start_time >= ?
                                                    and a.client_id = c.client_id
                                                    and canceled = 0
                                                    order by start_time;
                                                    ");
                                    $stmt->execute(array(date('Y-m-d H:i:s')));
                                    $rows = $stmt->fetchAll();
                                    $count = $stmt->rowCount();
                                    
                                    

                                    if($count == 0)
                                    {

                                        echo "<tr>";
                                            echo "<td colspan='5' style='text-align:center;'>";
                                                echo "List of your upcoming bookings will be presented here";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    else
                                    {

                                        foreach($rows as $row)
                                        {
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $row['start_time'];
                                                echo "</td>";
                                                echo "<td>";
                                                    $stmtServices = $con->prepare("SELECT service_name
                                                            from services s, services_booked sb
                                                            where s.service_id = sb.service_id
                                                            and appointment_id = ?");
                                                    $stmtServices->execute(array($row['appointment_id']));
                                                    $rowsServices = $stmtServices->fetchAll();
                                                    foreach($rowsServices as $rowsService)
                                                    {
                                                        echo "- ".$rowsService['service_name'];
                                                        if (next($rowsServices)==true)  echo " <br> ";
                                                    }
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row['end_time_expected'];
                                            
                                                echo "</td>";
                                                echo "<td>";
                                                    echo "<a href = #>";
                                                        echo $row['client_id'];
                                                    echo "</a>";
                                                echo "</td>";
                                                echo "<td>";
                                                    $stmtEmployees = $con->prepare("SELECT first_name,last_name
                                                            from employees e, appointments a
                                                            where e.employee_id = a.employee_id
                                                            and a.appointment_id = ?");
                                                    $stmtEmployees->execute(array($row['appointment_id']));
                                                    $rowsEmployees = $stmtEmployees->fetchAll();
                                                    foreach($rowsEmployees as $rowsEmployee)
                                                    {
                                                        echo $rowsEmployee['first_name']." ".$rowsEmployee['last_name'];
                                                        
                                                    }
                                                echo "</td>";
                                                
                                                echo "<td>";
                                                	$cancel_data = "cancel_".$row["appointment_id"];
                                               		?>
                                               		<ul class="list-inline m-0">

                                                        <!-- CANCEL BUTTON -->

                                                        <li class="list-inline-item" data-toggle="tooltip" title="Cancel Appointment">
                                                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $cancel_data; ?>" data-placement="top">
                                                                <i class="fas fa-calendar-times"></i>
                                                            </button>

                                                            <!-- CANCEL MODAL -->
                                                            <div class="modal fade" id="<?php echo $cancel_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $cancel_data; ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Cancel Appointment</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to cancel this appointment?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                                            <button type="button" data-id = "<?php echo $row['appointment_id']; ?>" class="btn btn-danger cancel_button">Yes, Cancel</button>
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
                                    }

                                ?>

                            </tbody>
                        </table>
                        <table class="table X-table tabcontent" id="All">
                            <thead>
                                <tr>
                                    <th>
                                        Start Time
                                    </th>
                                    <th>
                                        Booked Services
                                    </th>
                                    <th>
                                        End Time Expected
                                    </th>
                                    <th>
                                        Client
                                    </th>
                                    <th>
                                        Employee
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $stmt = $con->prepare("SELECT * 
                                                    FROM appointments a , clients c
                                                    where a.client_id = c.client_id
                                                    order by start_time;
                                                    ");
                                    $stmt->execute(array());
                                    $rows = $stmt->fetchAll();
                                    $count = $stmt->rowCount();

                                    if($count == 0)
                                    {

                                        echo "<tr>";
                                            echo "<td colspan='5' style='text-align:center;'>";
                                                echo "List of your all bookings will be presented here";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    else
                                    {

                                        foreach($rows as $row)
                                        {
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $row['start_time'];
                                                echo "</td>";
                                                echo "<td>";
                                                    $stmtServices = $con->prepare("SELECT service_name
                                                            from services s, services_booked sb
                                                            where s.service_id = sb.service_id
                                                            and appointment_id = ?");
                                                    $stmtServices->execute(array($row['appointment_id']));
                                                    $rowsServices = $stmtServices->fetchAll();
                                                    foreach($rowsServices as $rowsService)
                                                    {
                                                        echo $rowsService['service_name'];
                                                        if (next($rowsServices)==true)  echo " + ";
                                                    }
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row['end_time_expected'];
                                            
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row['last_name'];
                                                echo "</td>";
                                                echo "<td>";
                                                    $stmtEmployees = $con->prepare("SELECT first_name,last_name
                                                            from employees e, appointments a
                                                            where e.employee_id = a.employee_id
                                                            and a.appointment_id = ?");
                                                    $stmtEmployees->execute(array($row['appointment_id']));
                                                    $rowsEmployees = $stmtEmployees->fetchAll();
                                                    foreach($rowsEmployees as $rowsEmployee)
                                                    {
                                                        echo $rowsEmployee['first_name']." ".$rowsEmployee['last_name'];
                                                        
                                                    }
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                    }

                                ?>

                            </tbody>
                        </table>
                        <table class="table X-table tabcontent" id="Canceled">
                            <thead>
                                <tr>
                                    <th>
                                        Start Time
                                    </th>
                                    <th>
                                        Client
                                    </th>
                                    <th>
                                        Cancellation Reason
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $stmt = $con->prepare("SELECT * 
                                                    FROM appointments a , clients c
                                                    where canceled = 1
                                                    and a.client_id = c.client_id
                                                    ");
                                    $stmt->execute(array());
                                    $rows = $stmt->fetchAll();
                                    $count = $stmt->rowCount();

                                    if($count == 0)
                                    {

                                        echo "<tr>";
                                            echo "<td colspan='5' style='text-align:center;'>";
                                                echo "List of your canceled bookings will be presented here";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    else
                                    {

                                        foreach($rows as $row)
                                        {
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $row['start_time'];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row['last_name'];
                                                echo "</td>";
                                                echo "<td>";
                                                    
                                                    echo $row['cancellation_reason'];
                                                        
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                    }

                                ?>

                            </tbody>
                        </table>
                        </div>
                </div>
            </div>

            <!-- END BOOKING TABS -->

            <!-- PHP SCRIPT WHEN CLICKING CANCEL APPOINTMENT BUTTON -->

            <?php

            }//If do = Manage 

            elseif($do == 'Cancel')
            {
            
                if(isset($_POST['is_ajax']) && $_POST['is_ajax'] == "1")
                {
                    $appointment_id = $_POST['appointment_id'];

                    $stmt = $con->prepare("update appointments set canceled = 1,cancellation_reason = ? where appointment_id = ?");
                    $stmt->execute(array("I changed my mind",$appointment_id));

                }
            }

            ?>

            <!-- FOOTER BUTTON -->
            <?php

            include 'Includes/templates/footer.php';

    }

    else
    {
    	header('Location: index.php');
        exit();
    }


?>

<script type="text/javascript">
    $('.cancel_button').click(function()
                    {

                        var appointment_id = $(this).data('id');
                        var is_ajax = "1";

                        $.ajax({
                            url: "dashboard.php?do=Cancel",
                            type: "POST",
                            data:{appointment_id:appointment_id, is_ajax:is_ajax},
                            success: function (data) 
                            {
                                $('#cancel_'+appointment_id).html(data);
                                
                            },
                            error: function(xhr, status, error) 
                            {
                                alert('CAN NOT DELETE DATA - ERROR');
                            }
                          });
                    });
</script>