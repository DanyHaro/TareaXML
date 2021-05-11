<?php
include('config.php');
$empleados      = ("SELECT * FROM empleados ORDER BY id DESC ");
// $respuestaxml = ("SELECT * FROM empleados");
$resulEmpleado  = mysqli_query($con, $empleados);
?>


<table class="table table-hover table-striped">
    <thead class="thead-dark">
        <th>Empleado</th>
        <th>Fecha Inicio</th>
    </thead>
    <tbody>
        <?php
        while ($filaEmpleado = mysqli_fetch_array($resulEmpleado)) { ?>
            <tr>
                <td><?php echo $filaEmpleado['nombre']; ?></td>
                <td><?php echo $filaEmpleado['fechaInicio']; ?></td>
            </tr>

        <?php }
        require "config.php";

        $resp = mysqli_query($con,"SELECT * FROM empleados");
        if ($resp) {
            $xml = new DOMDocument("1.0");
            $xml->formatOutput = true;
            $fitness = $xml->createElement("VENTA");
            $xml->appendChild($fitness);
            while ($row = mysqli_fetch_array($resp)) {
                $empleados = $xml->createElement("VENTAS");
                $fitness->appendChild($empleados);

                $idalumno = $xml->createElement("EMPLEADO", $row['nombre']);
                $empleados->appendChild($idalumno);
            }
            echo "<xmp>" . $xml->saveXML() . "</xmp>";
            $xml->save("report.xml");
        } else {
            echo "Error...!";
        }
        ?>
        
    </tbody>
</table>



<?php

?>