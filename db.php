<?php
$i=1;
//configuracion necesaria para acceder a la base de datos 
function conn(){
    $hostname = "localhost";
    $usuariodb = "admin_proyect";
    $passworddb = "admin2022";
    $dbname = "proyect_trivia";

    //generando la conexion con el servidor 
    $conectar=mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
    return $conectar; 
}
        function data(){
            $conectar=conn();
            $sql="SELECT * from preguntas";
            $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

            $mostrar=mysqli_fetch_array($resul);
            return $mostrar;
        }

        function registro($nombre, $email, $fecha_de_nacimiento, $contraseña){
          $conectar=conn();
          $sql="INSERT INTO usuario (nombre, email, fecha_de_nacimiento, contraseña) VALUES 
          ('$nombre', '$email', '$fecha_de_nacimiento', '$contraseña');";
          $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

          $mostrar=mysqli_fetch_array($resul);
          return $mostrar;
      }

        //buscando pregunta
        function question($num){
            $conectar=conn();
            $sql="SELECT pregunta FROM preguntas WHERE idpreguntas=$num";
            $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

            $mostrar=mysqli_fetch_array($resul);
            return $mostrar;
        }

        //buscando respuesta
        function R_($num){
          $conectar=conn();
          $sql="SELECT respuesta FROM preguntas WHERE idpreguntas=$num";
          $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

          $mostrar=mysqli_fetch_array($resul);
          return $mostrar;
      }

      /*$conectar=conn();
      $sql="SELECT * from preguntas";
      $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

      while($mostrar=mysqli_fetch_array($resul)){
      ?>
      <tr>
        <td><?php echo $mostrar['idpreguntas']; ?></td>
        <td><?php echo $mostrar['pregunta']; ?></td>
        <td><?php echo $mostrar['respuesta']; ?></td>
      </tr>
      <?php
    }*/
      ?>