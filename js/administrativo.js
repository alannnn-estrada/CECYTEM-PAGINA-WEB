
const USER_SELECT =  document.getElementById('OSELECT');
const SELECT = document.getElementById('SELECT');
var css = `
        footer{
            position: fixed;
            bottom: 0;
        }
        @media (min-height:940px) {
            footer {
              position: fixed;
              bottom: 0;
            }
        }
        @media screen and (max-width: 925px){footer{position:relative;}}
        @media screen and (max-height: 332px){footer{position:relative;}}
        @media screen and (min-width: 864px){footer {position: unset; position: fixed; width:100%}}
        `;
var style = document.createElement('style');
style.innerHTML = css;
document.head.appendChild(style);

USER_SELECT.addEventListener("change", (event)=>{
    const OPTION_SELECT = event.target.value;

    if (OPTION_SELECT=== 'Becas'){
        SELECT.innerHTML=`
         <center><h1>Actualmente sin informacion! Pronto se actualizara!</h1></center>
        `;
    }else if (OPTION_SELECT === 'ServicioS'){
        var css = `
        footer{
            position: relative;
        }
        `;
	    style.innerHTML = css;
        SELECT.innerHTML=`
        <div class="SS">
             <h2>Servicio Social</h2>
             <p id="IM">El Servicio Social es una práctica que permite consolidar la formación profesional proporcionando al estudiante un
                 espacio de adquisición y aplicación de conocimientos y saberes; además, favorece el desarrollo de valores y facilita
                 la
                 inserción en el ejercicio profesional.</p>
             <p id="IM">Con el propósito de apoyar la prestación del servicio social de estudiantes y pasantes de la carrera, se ha reunido
                 en
                 este documento la información necesaria para responder a las principales interrogantes acerca de este tema.</p>
             <h3>El servicio social tiene como fines:</h3>
             <ul>
                 <li>- Desarrollar en los prestadores un sentido de solidaridad con la sociedad</li>
                 <li>- Contribuir a la formación integral y capacitación profesional de los prestadores</li>
                 <li>- Extender y acrecentar los beneficios de la ciencia, la tecnología y la cultura, a la sociedad</li>
                 <li>- Aplicar los conocimientos científicos, técnicos y humanísticos, adquiridos por el prestador durante su formación
                     académica</li>
                 <li>- Contribuir a la formación académica de los prestadores en los rubros de investigación, docencia y servicios</li>
                 <li>- Apoyar, en reciprocidad, las necesidades del desarrollo económico, social y cultural de la sociedad</li>
                 <li>- Desarrollar principios y valores éticos en los prestadores</li>
                 <li>- Lograr que los prestadores adquieran una actitud de servicio hacia la comunidad, mediante el conocimiento e
                     investigación de sus problemas y la participación en su solución.</li>
             </ul>
             <h3 id="IM"><b>Importante</b></h3>
             <p id="IM">Los prestadores de servicio social deberán cubrir el número de horas determinadas por las características del
                 programa
                 al que se encuentren inscritos, pero en ningún caso será menor de 480 horas y no podrá cubrirse en menos de 6 meses
                 ni
                 en más de 2 años.</p>
             <h3>Requisitos:</h3>
             <h4>Para iniciar el Servicio, los estudiantes y pasantes deberán cubrir los requisitos siguientes:</h4>
             <ul>
                 <li>- Haber acreditado al menos el 50% del plan de estudios de la carrera técnica del tipo medio superior, técnico
                     superior o
                     de licenciatura</li>
                 <li>- Presentar a la institución educativa solicitud de inscripción (Registro/Autorización), en el formato autorizado
                     por la
                     Dirección de Apoyo a la Vinculación</li>
                 <li>- Manifestar, a través de la documentación respectiva, si es derechohabiente de alguna institución de salud; y los
                     demás
                     que establezca el Reglamento del Servicio Social del Estado de México</li>
             </ul>
             <p>Fuente: Reglamento de servicio social del Estado De México</p>
        </div>
        `;
    }else{
        FORM.innerHTML=`Seleccione una opcion!`;
    }
});

const scrolld = document.getElementById("SCROLLD");
	window.addEventListener("scroll", () =>{
	const { scrollTop, clientHeight, scrollHeight } = document.documentElement;
	const scrolled = (scrollTop/(scrollHeight-clientHeight)*100);
	scrolld.style.width = `${scrolled}%`;
});