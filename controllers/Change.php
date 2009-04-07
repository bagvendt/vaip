<?php

class Change extends Controllers {
    
    function index() {
        if($user = $this->models->getUser())
        {
            $emplist = EmployeeFactory::employeeList();
            $change = "<form method='post' action='/change/begin/'>
            <select name='employee'>";

            foreach ($emplist as $emp) {
                if($emp != $this->user->getEmployee()){
                    $change = $change . "<option value=\"{$emp->getID()}\"> {$emp->getName()}  </option>";
                }
            }

            $change = $change . "<input type='submit' value='Begynd' />
                                 </select>
                                 </form>";

            echo $change;
            $this->views->flush('body');


        } else {
            header('location: /Users/Login/');
        }
    }

    function begin()
    {
        if($user = $this->models->getUser())
        {
            $reciever = EmployeeFactory::createEmployee($_POST[employee]);
            $senderShifts = ShiftFactory::createEmpShift($user->getEmployeeId());
            $recieverShifts = ShiftFactory::createEmpShift($_POST[employee]);


            $this->views->populate('recieverShifts', $recieverShifts);
            $this->views->populate('senderShifts', $senderShifts);
            $this->views->populate('reciever', $reciever);
            $this->views->flush('body','change');
        }
        else {
            header('location: /Users/Login/');
        }
    }

    function offer()
    {
        if($user = $this->models->getUser())
        {
            $empid = $_POST[employee];
            $myid = $user->getEmployeeId();
            $senderShifts = ShiftFactory::createEmpShift($myid);
            $recieverShifts = ShiftFactory::createEmpShift($empid);

            $senderList = array();
            $i = 0;

            foreach ($senderShifts as $shift) {
                if($_POST["s$i"] == 1)
                {
                    $senderList[$i] = $shift;
                }
                $i++;
            }
            $receiverList = array();
            $i = 0;
            foreach ($recieverShifts as $shift) {
                if($_POST["r$i"] == 1)
                {
                    $receiverList[$i] = $shift;
                }
                $i++;
            }

            ShiftFactory::insertChangeOffer($myid, $empid, $senderList, $receiverList);

            $this->views->flush('body');
            
            
            
        }
        else {
            header('location: /Users/Login/');
        }
    }

    function active()
    {
        if($user = $this->models->getUser())
        {
            $list = ShiftFactory::viewOffers($user->getEmployeeId());
            $output = "";

            foreach($list as $switch)
            {
                $id = $switch['id'];
                $output = $output . "<form method='post' action='/Change/accept/'>
                                    <table border='1'>
                                    <thead>
                                    <tr>
                                    <th>Overtag vagter:</th>
                                    <th>Giv vagter:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <td>";
                foreach($switch as $shift)
                {
                    if($shift['emp'] == $user->getEmployeeId() && $shift['day'] > 0)
                    {
                        $type = DV;
                        if($shift['type'] == 1){$type = AV;}
                        if($shift['type'] == 2){$type = NV;}
                        if($shift['type'] == 3){$type = BV;}
                        $day = date("d. M", $shift['day']);
                        $output = $output . "$type d.  $day<br/>";
                    }   
                    
                }

                $output = $output . "</td>
                                    <td>";

                foreach($switch as $shift)
                {
                    if($shift['emp'] != $user->getEmployeeId() && $shift['day'] > 0)
                    {
                        $type = DV;
                        if($shift['type'] == 1){$type = AV;}
                        if($shift['type'] == 2){$type = NV;}
                        if($shift['type'] == 3){$type = BV;}
                        $day = date("d. M", $shift['day']);
                        $output = $output . "$type d.  $day<br/>";
                    }

                }

                $output = $output . "</td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    <input type='hidden' name = 'shift_id' value='$id' />
                                    <input type='submit' name='accept' value='accept' />
                                    <input type='submit' name='reject' value='reject' />
                                    </form>";

            }



            echo $output;
            $this->views->flush('body');

        }
        else {
            header('location: /Users/Login/');
        }
    }

    function accept()
    {
       
        if(isset ($_POST['accept']))
        {
            ShiftFactory::acceptChangeOffer($_POST['shift_id']);
        }
        if(isset ($_POST['reject']))
        {
             ShiftFactory::rejectChangeOffer($_POST['shift_id']);
        }
        header('location: /Schemas/');

    }

}
?>
