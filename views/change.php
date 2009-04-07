<?php

$change =
"<form method='post' action='/change/offer/'>
<input type='hidden' name = 'employee' value='$_POST[employee]' />
<table border='1'>
<thead>
<tr>
<th>Giv vagt væk</th>
<th>Overtag vagt fra {$this->reciever->getName()}</th>
</tr>
</thead>
<tbody>
<tr>
<td>";

$i = 0;
foreach ($this->senderShifts as $shift) {
    $type = DV;
    if($shift->get_type() == 1){$type = AV;}
    if($shift->get_type() == 2){$type = NV;}
    if($shift->get_type() == 3){$type = BV;}

    $date = date("d M", $shift->get_date());
    $change = $change . "$type $date <input type='checkbox' name='s$i' value='1' /> <br/>";
    $i++;
}


$change = $change . "</td>
                    <td>";

$i = 0;
foreach ($this->recieverShifts as $shift) {
    $type = DV;
    if($shift->get_type() == 1){$type = AV;}
    if($shift->get_type() == 2){$type = NV;}
    if($shift->get_type() == 3){$type = BV;}
    
    $date = date("d M", $shift->get_date());
    $change = $change . "$type $date <input type='checkbox' name='r$i' value='1' /> <br/>";
    $i++;
}


$change = $change ."</td>
                    </tr>
                    </tbody>
                    </table>
                    <input type='submit' name='offer' value='offer' />
                    </form>";


?>
