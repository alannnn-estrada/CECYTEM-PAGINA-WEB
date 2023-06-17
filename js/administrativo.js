const USER_SELECT = document.getElementById('user-select');
const SELECT = document.getElementById('SELECT');

document.addEventListener('DOMContentLoaded', function() {
  const footer = document.querySelector('footer');
  footer.classList.add('fixed-bottom');
});

document.getElementById('user-select').addEventListener('change', function() {
  const footer = document.querySelector('footer');
  const USER_SELECT = this.value;

  if (USER_SELECT === '' || USER_SELECT === 'none') {
    footer.classList.add('fixed-bottom');
  } else {
    footer.classList.remove('fixed-bottom');
  }
});


USER_SELECT.addEventListener("change", (event) => {
  const OPTION_SELECT = event.target.value;
  if (OPTION_SELECT === 'Becas') {
    SELECT.innerHTML = `
      <div class="SS">
        <h5>Actualmente los alumnos pueden tramitar las siguientes becas según lo requieran</h5>
        <h3><b>La Beca Universal para el Bienestar Benito Juárez de Educación Media Superior</b></h3>
        <p>Es un programa del Gobierno de México dirigido a las y los alumnos de educación media superior inscritas o inscritos en escuelas públicas en modalidad escolarizada o mixta para que continúen y concluyan sus estudios.</p>
        <h5><b>¿Cuál es el monto?</b></h5>
        <p>La beca consta de 875 pesos mensuales que se otorga por los 10 meses que dura el ciclo escolar, hasta por un máximo de 30 meses siempre y cuando continúes inscrita o inscrito.</p>
        <h5><b>¿Cómo me puedo incorporar al programa?</b></h5>
        <p>Al comenzar el semestre o periodo escolar, debes ponerte en contacto con tu escuela para corroborar que estés inscrita o inscrito, ya que los planteles son los responsables de reportarnos tu información escolar.</p>
        <p>Si lo prefieres, podrás llenar una Cédula de Solicitud de Incorporación en Línea y una Cédula Única para solicitar la beca.</p>
        <p>Las Cédulas estarán disponibles en los tiempos determinados por la Coordinación Nacional, por lo que deberás mantenerte muy atenta o atento a la información oficial que emitamos en nuestra página web y redes sociales verificadas.</p>
        <p>El llenado de las Cédulas no significa que recibirás la beca, ya que tu incorporación depende de que se confirme que cumples con los requisitos establecidos en las Reglas de Operación vigentes, del presupuesto asignado y de los espacios disponibles en el padrón de personas beneficiarias.</p>
        <h3><b>Beca servicio social:</b></h3>
        <p>Esta beca consiste en un apoyo mensual de 2 mil pesos durante medio año y aplica para estudiantes de nivel bachillerato de escuelas seleccionadas. Estos deben comenzar su servicio social en alguna institución reconocida por el plantel al que pertenezcan entre el 1 de febrero y el 25 de marzo de 2022.</p>
        <p>La SEP señaló que este beneficio "tiene el objetivo de contribuir a que los alumnos inscritos en los subsistemas escolares realicen y obtengan su servicio social con el estímulo de una beca. Por lo tanto, esta beca no se considera un apoyo de manutención".</p>
        <h5><b>Becas de Escolaridad</b></h5>
        <p>La beca de escolaridad es el estímulo económico que otorga el Colegio a todos aquellos alumnos que, por su rendimiento académico, logran obtener un promedio igual o superior a 8.5 puntos. El beneficio consiste en la exención total o parcial de la cuota de reinscripción al semestre inmediato superior.</p>
        <h5><b>Objetivos</b></h5>
        <ul>
          <li>● Estimular el rendimiento académico del alumno</li>
          <li>● Fomentar la permanencia de los alumnos de alto rendimiento y que se encuentran en una condición económica desfavorable</li>
          <li>● Mejorar la eficiencia terminal</li>
        </ul>
        <h5><b>Requisitos</b></h5>
        <ul>
          <li>● No contar con otra beca del tipo de rendimiento escolar</li>
          <li>● Ser alumno vigente del CECyTEM</li>
          <li>● Haber obtenido un promedio igual o superior a 8.5 puntos en el semestre inmediato inferior</li>
          <li>● No haber reprobado en fase ordinaria ninguna asignatura</li>
        </ul>
        <h5><b>Documentos</b></h5>
        <ul>
          <li>● Solicitud de beca. Debidamente contestada</li>
          <li>● Comprobación de residencia en el Estado de México de, mínimo, 2 años (credencial de elector del Padre, Madre o Tutor, recibo de luz, agua o predial, teléfono). (PDF)</li>
        </ul>
        <br>
        <h4><b>Para cualquier pregunta o comentario, favor de comunicarse al Departamento de Servicio Social y Becas del CECyTEM a los Tels. 722-2-75-80-40, extensión 4108 o 4105, en un horario de 9:00 a 18:00 hrs</b></h4>
        <br>
        <h4><b>Para fechas de convocatoria y otros avisos en la página de comunidad te puedes enterar!</b></h4>
      </div>
    `;
    footer.classList.remove('fixed-bottom');
  } else if (OPTION_SELECT === 'ServicioS') {
    SELECT.innerHTML = `
      <div class="SS">
        <h2>Servicio Social</h2>
        <p id="IM">El Servicio Social es una práctica que permite consolidar la formación profesional proporcionando al estudiante un espacio de adquisición y aplicación de conocimientos y saberes; además, favorece el desarrollo de valores y facilita la inserción en el ejercicio profesional.</p>
        <p id="IM">Con el propósito de apoyar la prestación del servicio social de estudiantes y pasantes de la carrera, se ha reunido en este documento la información necesaria para responder a las principales interrogantes acerca de este tema.</p>
        <h3>El servicio social tiene como fines:</h3>
        <ul>
          <li>- Desarrollar en los prestadores un sentido de solidaridad con la sociedad</li>
          <li>- Contribuir a la formación integral y capacitación profesional de los prestadores</li>
          <li>- Extender y acrecentar los beneficios de la ciencia, la tecnología y la cultura, a la sociedad</li>
          <li>- Aplicar los conocimientos científicos, técnicos y humanísticos adquiridos por el prestador durante su formación académica</li>
          <li>- Contribuir a la formación académica de los prestadores en los rubros de investigación, docencia y servicios</li>
          <li>- Apoyar, en reciprocidad, las necesidades del desarrollo económico, social y cultural de la sociedad</li>
          <li>- Desarrollar principios y valores éticos en los prestadores</li>
          <li>- Lograr que los prestadores adquieran una actitud de servicio hacia la comunidad, mediante el conocimiento e investigación de sus problemas y la participación en su solución.</li>
        </ul>
        <h3 id="IM"><b>Importante</b></h3>
        <p id="IM">Los prestadores de servicio social deberán cubrir el número de horas determinadas por las características del programa al que se encuentren inscritos, pero en ningún caso será menor de 480 horas y no podrá cubrirse en menos de 6 meses ni en más de 2 años.</p>
        <h3>Requisitos:</h3>
        <h4>Para iniciar el Servicio, los estudiantes y pasantes deberán cubrir los requisitos siguientes:</h4>
        <ul>
          <li>- Haber acreditado al menos el 50% del plan de estudios de la carrera técnica del tipo medio superior, técnico superior o de licenciatura</li>
          <li>- Presentar a la institución educativa solicitud de inscripción (Registro/Autorización), en el formato autorizado por la Dirección de Apoyo a la Vinculación</li>
          <li>- Manifestar, a través de la documentación respectiva, si es derechohabiente de alguna institución de salud; y los demás que establezca el Reglamento del Servicio Social del Estado de México</li>
        </ul>
        <p>Fuente: Reglamento de servicio social del Estado De México</p>
      </div>
    `;
    footer.classList.remove('fixed-bottom');
  } else {
    SELECT.innerHTML = `Seleccione una opción.`;
    const footer = document.querySelector('footer');
    footer.classList.add('fixed-bottom');
  }
});
