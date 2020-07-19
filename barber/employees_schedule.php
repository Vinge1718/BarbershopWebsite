<style type="text/css">
    input[type=checkbox] {
    vertical-align: middle;
    width: 25px;
    height: 25px;
    -webkit-box-flex: 20px;
    -ms-flex: 20px 0 0px;
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    border: 1px solid #dcdddf;
    cursor: pointer;
}
.day-name
{
    font-size: 20px;
    color: #253246;
    text-transform: capitalize;
    width: 60px;
    font-weight: bold;
    margin-left: 10px;
}
.worktime-day
{
    margin: 10px 0px;
    border-bottom: 1px solid #eee;
    min-height: 60px;
    align-items: center;
}
</style>

<?php

    session_start();

    $pageTitle = 'Employees Schedule';

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
                
                vertical_menu.getElementsByClassName('employees_schedule_link')[0].className += " active_link";

            </script>

            <!-- EMPLOYEES SCHEDULE  -->

            <div class="card">
                <div class="card-header">
                    Employees Week Schedule
                </div>
                <div class="card-body">
                    <div class="sb-entity-selector" style="max-width:300px;">
                        <form action="employees_schedule.php" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="emloyee_schedule_select">
                                    Select employee to set up the schedule:
                                </label>
                                <div style="display:inline-block;">
                                    <?php 
                                        $stmt = $con->prepare('select * from employees');
                                        $stmt->execute();
                                        $employees = $stmt->fetchAll();
                                    
                                        echo "<select class='form-control' name='employee_selected'>";
                                            foreach ($employees as $employee) 
                                            {
                                                echo "<option value=".$employee['employee_id']." ".((isset($_POST['employee_selected']) && $_POST['employee_selected'] == $employee['employee_id'])?'selected':'').">".$employee['first_name']." ".$employee['last_name']."</option>";
                                            }
                                        echo "</select>";                                    
                                    ?>
                                </div>
                                <button type="submit" name="show_schedule_sbmt" class="btn btn-primary">Show schedule</button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="alert alert-info">
                        Configure your week settings here. Just select start time and end time to set up employees working hours.
                    </div>
                    
                    
                    <!-- SECHEDULE PART -->
                    
                    <div class="sb-content" style="min-height: 500px;">
                        <?php

                            /** WHEN SHOW SCHEDULE BUTTON CLICKED **/

                            if(isset($_POST['show_schedule_sbmt']))
                            {
                        ?>
                                <form method="POST" action="employees_schedule.php">
                                    <input type="hidden" name="employee_id" value="<?php echo $_POST['employee_selected'];?>" hidden>     
                                    <div class="worktime-days">
                                        <?php
                                            $employee_id = $_POST['employee_selected'];
                                            $stmt = $con->prepare('select * from employees e, employees_schedule es where es.employee_id = e.employee_id and e.employee_id = ?');
                                            $stmt->execute(array($employee_id));
                                            $employees = $stmt->fetchAll();
            
                                            $days = array("1"=>"Monday",
                                                "2"=>"Tuesday",
                                                "3"=>"Wednsday",
                                                "4"=>"Thursday",
                                                "5"=>"Friday",
                                                "6"=>"Saturday",
                                                "7"=>"Sunday") ;
                                        
                                            //Available days
                                            $av_days = array();
                                            foreach($employees as $employee)
                                            {
                                                $av_days[] = $employee['day_id'];
                                            }
                                        
                                            foreach($days as $key => $value)
                                            {
                                                echo "<div class='worktime-day row'>";
                                                
                                                if(in_array($key,$av_days))
                                                {
                                                    echo "<div class='form-group  col-md-4'>";
                                                        echo "<input name='".$value."' id='".$key."' class='sb-worktime-day-switch' type='checkbox' checked>";
                                                        echo "<span class='day-name'>";                
                                                            echo $value;
                                                        echo "</span>";
                                                    echo "</div>";
                                                    
                                                    foreach($employees as $employee)
                                                    {
                                                        if(in_array($key,$av_days) && $employee['day_id'] == $key)
                                                        {
                                                            echo "<div class='time_ col-md-8 row'>";
                                                            echo "<div class='form-group col-md-6'>";
                                                            echo "<input type='time' name='".$value."-from' value='".$employee['from_hour']."' class='form-control'>";
                                                            echo "</div>";
                                                            echo "<div class='form-group col-md-6'>";
                                                            echo "<input type='time' name='".$value."-to' value='".$employee['to_hour']."'  class='form-control'>";
                                                            echo "</div>";
                                                            echo "</div>";
                                                        
                                                        }
                                                    
                                                    }
                                                }
                                                else
                                                {
                                                    echo "<div class='form-group  col-md-4'>";
                                                    echo "<input name='".$value."' id='".$key."' class='sb-worktime-day-switch' type='checkbox'>";
                                                    echo "<span class='day-name'>";                
                                                    echo $value;
                                                    echo "</span>";
                                                    echo "</div>";
                                                    
                                                    echo "<div class='time_ col-md-8 row' style='display:none;'>";
                                                    echo "<div class='form-group col-md-6'>";
                                                    echo "<input type='time' name='".$value."-from' value = '09:00' class='form-control'>";
                                                    echo "</div>";
                                                    echo "<div class='form-group col-md-6'>";
                                                    echo "<input type='time' name='".$value."-to' value = '18:00' class='form-control'>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    
                                                }
                                                
                                                echo "</div>";
                                            }
                                        ?>
                                    </div>

                                    <!-- SAVE SCHEDULE BUTTON -->

                                    <div class="form-group">
                                        <button type="submit" name="save_schedule_sbmt" class="btn btn-info">Save schedule</button>
                                    </div>
                                </form>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>

        <?php

            /** WHEN SAVE SCHEDULE BUTTON CLICKED **/

            if(isset($_POST['save_schedule_sbmt']))
            {
                $days = array("1"=>"Monday",
                   "2"=>"Tuesday",
                   "3"=>"Wednsday",
                   "4"=>"Thursday",
                   "5"=>"Friday",
                   "6"=>"Saturday",
                   "7"=>"Sunday") ;
                $stmt = $con->prepare("delete from employees_schedule where employee_id = ?");
                $stmt->execute(array($_POST['employee_id']));
                
                foreach($days as $key=>$value)
                {
                    if(isset($_POST[$value]))
                    {   
                        $stmt = $con->prepare("insert into employees_schedule(employee_id,day_id,from_hour,to_hour) values(?, ?, ?,?)");
                        $stmt->execute(array($_POST['employee_id'],$key,$_POST[$value.'-from'],$_POST[$value.'-to']));
                        
                        $message = "You have successfully updated employee schedule!";
                        
                        ?>

                            <script type="text/javascript">
                                swal("Set Employee Schedule","You have successfully updated employee schedule!", "success").then((value) => {}); 
                            </script>

                        <?php
                    }
                }
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
    $(".sb-worktime-day-switch").click(function(){
        if(!$(this).prop('checked'))
        {
            $(this).closest('div.worktime-day').children(".time_").css('display','none');
            
        }
        else
            $(this).closest('div.worktime-day').children(".time_").css('display','flex');
        
  });
</script>