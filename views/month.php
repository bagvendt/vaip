<?php

$month = "<table border='1'>
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
   $month = $month . "<td></td>";
}


while($schema->hasNext())
{
    $shift = $schema->Next();
    $date = date("d M", $shift->get_date());
    $type = $shift->get_type();

    if($point > 7)
    {
        $month = $month . "</tr> <tr>";
        $point = 1;
    }

    $day = "<td>
            <table border = '1'>
            <tbody>
            <tr>
            <td><a href=\"/Schemas/Shift/" . $shift->get_date() . "/0/\"> $date : DV</a></td>
            </tr>
            <tr>
            <td><a href=\"/Schemas/Shift/" . $shift->get_date() . "/1/\"> $date : AV</a></td>
            </tr>
            <tr>
            <td><a href=\"/Schemas/Shift/" . $shift->get_date() . "/2/\"> $date : NV</a></td>
            </tr>
            <tr>
            <td><a href=\"/Schemas/Shift/" . $shift->get_date() . "/3/\"> $date : BV</a></td>
            </tr>
            </tbody>
            </table>
            </td>";

    
    
        $point += 1;
    


    $month = $month . $day;
    if($schema->hasNext()){$schema->Next();}
    if($schema->hasNext()){$schema->Next();}
    if($schema->hasNext()){$schema->Next();}


}
$month = $month . "</tr>
                   </tbody>";

?>
