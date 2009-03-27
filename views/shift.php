<?php

$shift = <<<SHIFT

<h1>Shift</h1>

<table border="1">
<tbody>
<tr>
<td>Day</td>
<td>{$this->shift->get_date()}</td>
</tr>
<tr>
<td>Type</td>
<td>{$this->shift->get_type()}</td>
</tr>
<tr>
<td>Employee</td>
<td>{$this->shift->get_employee()->getName()}</td>
</tr>
<tr>
<td>Message</td>
<td>{$this->shift->get_message()}</td>
</tr>
</tbody>
</table>


SHIFT;

?>
