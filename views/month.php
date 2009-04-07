<?php

$month = "<table border='1' class='schema'>
            <thead>
            <tr>
            <th>Mandag</th>
            <th>Tirsdag</th>
            <th>Onsdag</th>
            <th>Torsdag</th>
            <th>Fredag</th>
            <th>Lørdag</th>
            <th>Søndag</th>
            </tr>
            </thead>
            <tbody>
            <tr>";
$schema = new Schema(1230768000, 1233273600);
$point = date("N", $schema->next()->get_date());
$schema->reset();

for ($i = 1 ; $i < $point ; $i++)
{
   $month = $month . "<td class='day'>&nbsp</td>";
}

$day = "";
while($schema->hasNext())
{
    $shift = $schema->Next();
    $date = date("d M", $shift->get_date());
    $type = $shift->get_type();
    $myshift = "";
    if($shift->get_employee() == $this->employee){
        $myshift = "myshift";
    }

    $typename = DV;
    if($type == 1){$typename = AV;}
    if($type == 2){$typename = NV;}
    if($type == 3){$typename = BV;}

    if($point > 7)
    {
        $month = $month . "</tr> <tr>";
        $point = 1;
    }
    
    if($type == 0){
        $day = "";
    }
    
    if($type != 3){
        $day = $day .   "<div class=\"$myshift daybody\">
                    <a href=\"/Schemas/Shift/{$shift->get_date()}/$type/\"> $typename: {$shift->get_employee()->getName()}</a>
                    </div>";
    } else{
            $month = $month . "<td class='day'>
             <div>
             <table class='dayhead'><tr><td class='head'>$date</td><td class=\"$myshift back\"><a href=\"/Schemas/Shift/{$shift->get_date()}/$type/\"> $typename</a></td></tr></table>
             </div>$day</td>";
             $point += 1;
    }

    


}

while($point < 8){
     $month = $month . "<td class='day'>&nbsp</td>";
     $point++;
}
$month = $month . "</tr>
                   </tbody>";

?>
