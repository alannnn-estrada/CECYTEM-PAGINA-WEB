<?php
include('dbcon.php');
include('session.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Obtener respuestas del formulario
    $respuesta1 = $_POST['pregunta1'] ?? '';
    $respuesta2 = $_POST['pregunta2'] ?? '';
    $respuesta3 = $_POST['pregunta3'] ?? '';
    $respuesta4 = $_POST['pregunta4'] ?? '';
    $respuesta5 = $_POST['pregunta5'] ?? '';
    $respuesta6 = $_POST['pregunta6'] ?? '';
    $respuesta7 = $_POST['pregunta7'] ?? '';

    //Inicializar contador de respuestas correctas
    $correctas = 0;

    //Checar respuestas correctas e incrementar contador
    if ($respuesta1 === 'a') {
        $correctas++;
    }
    if ($respuesta2 === 'c') {
        $correctas++;
    }
    if($respuesta3 === 'pulmones' || $respuesta3 === 'corazon'){
        $correctas++;
    }
    if ($respuesta4 === 'si') {
        $correctas++;
    }else{
        $correctas++;
    }
    if (strpos($respuesta5, 'peligrosa') !== false) {
        $correctas++;
    }else{
        $correctas++;
    }
    if ($respuesta6 === 'c') {
        $correctas++;
    }
    if ($respuesta7 === 'a') {
        $correctas++;
    }

    //Mostrar resultados al usuario
    
    $respuestass = 7;
    $sql = "INSERT INTO formulario (id_usuario, preguntas_respondidas, preguntas_correctas) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Error en la consulta: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "iss", $idPersona, $respuestass, $correctas);
    if (!mysqli_stmt_execute($stmt)) {
        die("Error al insertar datos: " . mysqli_error($conn));
    }
    mysqli_stmt_close($stmt);
}
?>
<?php include('head-nav.php')?>
<style>form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
    border: 1px solid #ccc;
}

h2 {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

p {
    font-size: 18px;
    margin-top: 20px;
}

/* Personalización de los radio buttons */
input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  display: inline-block;
  width: 18px;
  height: 18px;
  border: 2px solid #4CAF50;
  border-radius: 50%;
  outline: none;
  margin-right: 10px;
  vertical-align: middle;
  cursor: pointer;
}

input[type="radio"]:checked {
  background-color: #4CAF50;
}

textarea {
    width: 100%;
    height: 100px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    font-size: 18px;
    background-color: green;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #4CAF50;
}
.resultados{
    display: flex;
    align-content: center;
    justify-content: center;
    text-align: center;
    flex-direction: column;
    margin: auto;
    padding-top: 10px;
    padding-bottom: 10px;
}
</style>
	<form method="POST" <?php if(isset($correctas) && $correctas != 7) { echo "disabled"; } ?>>
    <p>1. Cuáles son los riesgos de vapear?</p>
    <p>
        <input type="radio" name="pregunta1" value="a" required> a) Puede causar enfermedades pulmonares, enfermedades cardiacas y cáncer.<br>
        <input type="radio" name="pregunta1" value="b"> b) Puede causar dolor de cabeza y mareos.<br>
        <input type="radio" name="pregunta1" value="c"> c) Puede causar alergias y problemas de piel.<br>
    </p>
    <p>2. Qué es más dañino el vapor o el cigarro?</p>
    <p>
        <input type="radio" name="pregunta2" value="a" required> a) El vapor es más dañino.<br>
        <input type="radio" name="pregunta2" value="b"> b) El cigarro es más dañino.<br>
        <input type="radio" name="pregunta2" value="c"> c) El aerosol del cigarrillo electrónico contiene menos sustancias químicas tóxicas que la mezcla mortal de 7000 sustancias químicas que hay en el humo de los cigarrillos regulares.<br>
    </p>
    <p>3. Qué órganos afecta el vapeo?</p>
    <p>
        <input type="radio" name="pregunta3" value="pulmones" required> Pulmones<br>
        <input type="radio" name="pregunta3" value="cerebro"> Cerebro<br>
        <input type="radio" name="pregunta3" value="corazon"> Corazón<br>
        <input type="radio" name="pregunta3" value="colon"> Colon<br>
    </p>
    <p>4. Tiene amigos o algún conocido que use o consume el Vape?</p>
    <p>
        <input type="radio" name="pregunta4" value="si" required> Sí<br>
        <input type="radio" name="pregunta4" value="no">No<br>
    </p>
    <p>5. Después de la información leída considera el Vape una droga peligrosa o muy mala para su salud y la de los que lo consumen?</p>
    <p>
        <textarea name="pregunta5" rows="4" cols="50" required></textarea>
    </p>
    <p>6. Qué riesgos tiene el vape?</p>
    <p>
        <input type="radio" name="pregunta6" value="a" required> a) Puede causar mareos y dolor de cabeza.<br>
        <input type="radio" name="pregunta6" value="b"> b) Puede causar alergias y problemas de piel.<br>
        <input type="radio" name="pregunta6" value="c"> c) Los cigarrillos electrónicos con baterías defectuosas han provocado incendios y explosiones, algunos de los cuales han causado lesiones graves. Hay niños y adultos que se han intoxicado por tragar o inhalar el líquido de los cigarrillos electrónicos, o por absorberlo a través de la piel o los ojos.<br>
    </p>
    <p>7. Qué síntomas da el vape?</p>
    <p>
        <input type="radio" name="pregunta7" value="a" required> a) Síntomas respiratorios, como tos, dificultad para respirar, o dolor en el pecho.<br>
        <input type="radio" name="pregunta7" value="b"> b) Síntomas gastrointestinales, como náuseas, vómitos, dolor de estómago, o diarrea.<br>
        <input type="radio" name="pregunta7" value="c"> c) Síntomas generales no específicos, como fiebre, escalofríos o pérdida de peso.<br>
    </p>
    <input type="submit" value="Enviar">
</form>
<div class="resultados">
    <?php
    if(isset($correctas)){
    echo "<h1>Respuestas correctas: $correctas/7</h1>";
        if ($correctas < 7) {
            echo "<p>Preguntas incorrectas:</p>";
            if ($respuesta1 !== 'a') {
                echo "<p>1. Cuáles son los riesgos de vapear? $respuesta1</p>";
            }
            if ($respuesta2 !== 'c') {
                echo "<p>2. Qué es más dañino el vapor o el cigarro? $respuesta2</p>";
            }
            if ($respuesta3 !== 'pulmones' || $respuesta3 !== 'corazon') {
                echo "<p>3. Qué órganos afecta el vapeo? $respuesta3</p>";
            }
            if ($respuesta6 !== 'c') {
                echo "<p>6. Qué riesgos tiene el vape? $respuesta6</p>";
            }
            if ($respuesta7 !== 'a') {
                echo "<p>7. Qué síntomas da el vape? $respuesta7</p>";
            }
        }
        echo "<script>alert('Seras redirigido a la pagina principal en 7s'); setTimeout(function() {
                    window.location.href = 'index.php';
                }, 7000);</script>";
    }
    ?>
</div>
<br>
<?php include('footer.php'); ?>