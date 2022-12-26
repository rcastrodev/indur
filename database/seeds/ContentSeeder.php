<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/Grupo_3506.png',
                'content_1' => '<p>Fabricamos resinas sintéticas y sistemas poliméricos para revestimientos de alta performance<p>',
            ]);
        }

        Content::create([
            'section_id' => 2,
            'content_1' => '<p>AMPLIA GAMA DE PRODUCTOS</p><p>PARA EL MERCADO DE LAS PINTURAS</p><p>Y REVESTIMIENTOS ESPECIALES</p>',
        ]);

        Content::create([
            'section_id' => 3,
            'order'     => 'AA',
            'image'     => 'images/home/Grupo_3503.svg',
            'content_1' => 'Cuidamos del medioambiente',
        ]);

        Content::create([
            'section_id' => 3,
            'order'     => 'BB',
            'image'     => 'images/home/Grupo_3504.svg',
            'content_1' => 'Brindamos excelente servicio de atención',
        ]);

        Content::create([
            'section_id' => 3,
            'order'     => 'CC',
            'image'     => 'images/home/Grupo_3505.svg',
            'content_1' => 'Contamos con personal altamente calificado',
        ]);

        Content::create([
            'section_id' => 4,
            'image'     => 'images/home/logo_ciqyp_solo_v3.png',
            'content_1' => 'COMPROMISO INDUR',
            'content_2' => '<p>Como empresa adherida al programa "Cuidado Responsable del Medio Ambiente", nos hemos comprometido públicamente, en todos los aspectos de seguridad, salud y ambiente, a esforzarse para lograr una mejora permanente, educar a su personal y trabajar con los clientes y la comunidad, en lo referente al conjunto de sus operaciones y al uso de sus productos.<p>',
        ]);
        /** Fin home page */

        /** Empresa  */
       for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id'    => 5,
                'order'         => 'AA',
                'image'         => 'images/company/IMG_1590.png',
                'content_1'     => 'Más de 70 años de experiencia',
                'content_2'     => '<p>Actualmente la producción de productos alcanza un volumen de 6,500 toneladas anuales.</p>',
            ]);
        }

        Content::create([
            'section_id'    => 6,
            'image'         => 'images/company/IMG_1607.png',
            'content_1'     => 'Más de 70 años de experiencia',
            'content_2'     => '<p>La amplia paleta de productos que INDUR S.A. elabora y comercializa está presente como principal insumo en el mercado de las pinturas y revestimientos especiales con una participación del 40% en el mercado libre.</p>
            <p>Junto a las más importantes marcas de pinturas decorativas que llevan nuestros productos elaborados y comercializados como principal materia prima, cabe destacar también las demás industrias en las que los productos y servicios que INDUR S.A. provee están presentes en forma significativa:</p><p>Son, para nombrar algunas, revestimientos para mantenimiento industrial, construcción de pisos y revestimientos de alta resistencia química, revestimientos de tanques y cañerías, pinturas anticorrosivas, industria automotriz, grandes maquinarias, demarcación vial, represas y acueductos, juntas especiales, recubrimientos de alto espesor, envases de hojalata y envases flexibles, pinturas para madera, revestimientos para pisos de madera para uso hogareño y uso deportivo, pinturas marinas, barnices para aislación, plásticos reforzados, moldes, selladores, encapsulados para la industria eléctrica, para la fabricación de herramientas, adhesivos, barnices resistentes a la esterilización, tintas gráficas, laminados industriales, abrasivos, etc.</p>',
        ]);

        Content::create([
            'section_id'    => 7,
            'order'         => 'AA',
            'content_1'     => '1970',
            'content_2'     => '<p>Originalmente de capital nacional, en el año 1970 su paquete accionario fue adquirido por HOECHST AG de Alemania, y pasó a integrar a partir de ese momento ese Grupo Económico. Incorporó tecnología y "know how" alemán y se mantuvo como líder en su rubro.</p>',
        ]);

        Content::create([
            'section_id'    => 8,
            'image'         => 'images/company/Enmascarar_grupo_551.png',
            'content_1'     => 'Planta industrial',
            'content_2'     => '<p>Ubicada en terrenos propios, en la localidad de Boulogne, a pocos km del centro de la ciudad de Buenos Aires, con excelentes vías de comunicación hacia todos los destinos, INDUR S.A. dispone de un predio de 8900 m² , con una superficie total cubierta de 5200 m² con sectores en edificios independientes, formados por:</p>',
            'content_3'     => 'Planta productiva|Depósito de Materias Primas|Depósito de Productos terminados|Servicios|Energía y Mantenimiento|Laboratorios|Oficinas de Administración|Centro de Distribución'
        ]);

        Content::create([
            'section_id'    => 9,
            'order'         => 'AA',
            'image'         => 'images/company/deal.svg',
            'content_1'     => 'MISIÓN',
            'content_2'     => '<p>Consolidar el liderazgo en el mercado argentino de resinas sintéticas, brindar un excelente servicio a los clientes, reacción rápida al deseo y necesidades de los clientes y el mercado, empleados altamente calificados y protección activa del medio ambiente.</p>',
        ]);


        Content::create([
            'section_id'    => 9,
            'order'         => 'BB',
            'image'         => 'images/company/deal.svg',
            'content_1'     => 'VISIÓN',
            'content_2'     => '<p>Asegurar la continuidad de la fuente laboral, mejorar las condiciones de vida de sus colaboradores. Estimular el afán de capacitación, mantener fluido contacto con todos los proveedores, apoya el crecimiento de los más pequeños y fomenta el desarrollo de los nuevos.</p>',
        ]);

        Content::create([
            'section_id'    => 9,
            'order'         => 'CC',
            'image'         => 'images/company/deal.svg',
            'content_1'     => 'VALORES',
            'content_2'     => '<p>Resolver los problemas y cubrir las necesidades de los Clientes. Se fomenta y se estimula la política de estrecho acercamiento al Cliente con el fin de establecer una virtual asociación para potenciar las fortalezas de cada uno.</p>',
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'AA',
            'image'     => 'images/quality/Grupo_3514.png',
            'content_1' => '<p>Excelencia en los procesos de fabricación y en las distintas áreas de gestión da por resultado alto nivel de calidad de los productos finales<p>',
        ]);

        Content::create([
            'section_id' => 11,
            'order'     => 'AA',
            'content_1' => 'Laboratorio de control de Calidad',
            'content_2' => '<p>Indur S.A.C.I.F.I. posee un Laboratorio de Control de Calidad orientado a garantizar el estricto cumplimiento de las especificaciones tanto de las materias primas que utilizamos, como de los productos elaborados en nuestra planta.</p><p>Todos los estamentos de la organización, comenzando con la Dirección, están directamente comprometidos con la calidad. Calidad en los procesos de fabricación de los productos, calidad en las distintas áreas de gestión dan como resultado necesario un alto nivel de calidad de los productos finales.</p>
            ',
        ]);

        Content::create([
            'section_id' => 12,
            'order'     => 'AA',
            'image'     => 'images/quality/Grupo_626.svg',
            'content_1' => '<p>Determina los parámetros que definen la calidad de las materias primas que ingresan al circuito de producción.<p>',
        ]);

        Content::create([
            'section_id' => 12,
            'order'     => 'BB',
            'image'     => 'images/quality/Icon_awesome-glasses.svg',
            'content_1' => '<p>Evalúa las alternativas ofrecidas por distintos proveedores ó solicitadas por los sectores de compras ó producción.<p>',
        ]);

        Content::create([
            'section_id' => 12,
            'order'     => 'CC',
            'image'     => 'images/quality/Grupo_630.svg',
            'content_1' => '<p>Determina las normas de recepción, muestreo y evaluación de los materiales que ingresan a planta en calidad de materias primas y de los productos fabricados que se consideren “producto terminado”.<p>',
        ]);

        Content::create([
            'section_id' => 13,
            'order'     => 'AA',
            'content_1' => 'Certificado de control de calidad',
            'content_2' => 'Descargar certificado'
        ]);

        Content::create([
            'section_id' => 13,
            'order'     => 'BB',
            'content_1' => 'Laboratorio de asistencia técnica y aplicaciones',
            'content_2' => 'Ver principios'
        ]);

        Content::create([
            'section_id' => 13,
            'order'     => 'CC',
            'content_1' => 'Laboratorio de Desarrollo de Resinas Sintéticas',
            'content_2' => 'Ver principios'
        ]);

        Content::create([
            'section_id' => 13,
            'order'     => 'DD',
            'content_1' => 'Laboratorio de Análisis Instrumental y Aparatología',
            'content_2' => 'Ver principios'
        ]);

        Content::create([
            'section_id'    => 14,
            'order'         => 'AA',
            'image'         => 'images/company/IMG_1590.png',
            'content_1'     => 'COMPROMETIDOS CON EL PROGRAMA DE CUIDADO RESPONSABLE DEL MEDIO AMBIENTE
            ',
        ]);

        Content::create([
            'section_id' => 15,
            'order'     => 'AA',
            'content_1' => 'Seguridad y Medio Ambiente',
            'content_2' => '<p>Se presta particular atención a que los procesos y métodos de fabricación estén de acuerdo con las normativas vigentes en cuanto al cuidado del medio ambiente. El compromiso de la empresa con el Programa de Cuidado Responsable así lo demuestra.</p><p>Cuidado Responsable del Medio Ambiente ® es el programa internacional de la industria química para la mejora continua de su desempeño en Seguridad, Salud y Medio Ambiente.</p><p>Es una iniciativa única en la industria, por tratarse de un esfuerzo voluntario, consistente con el Desarrollo Sustentable y adoptado por 52 países en todo el mundo, entre ellos EE.UU., Canadá, Gran Bretaña, Francia, Italia, Japón, México, Brasil, Alemania, Bélgica, Holanda y España.</p>',
            'content_3' => '<p>A nivel mundial, Cuidado Responsable está administrado por el International Council of Chemical Assosiations, con sede en Bruselas, Bélgica.</p><p>En la Argentina el programa se denomina "Cuidado Responsable del Medio Ambiente ®" y es administrado por la Cámara de la Industria Química y Petroquímica (CIQyP); su lanzamiento se realizó el 28 de Mayo de 1992, adhiriéndose en ese acto 91 compañías socias de la Cámara.</p><p>INDUR SACIFI, como empresa adherida al programa "Cuidado Responsable del Medio Ambiente", se ha comprometido públicamente, en todos los aspectos de seguridad, salud y ambiente, a esforzarse para lograr una mejora permanente, educar a su personal y trabajar con los clientes y la comunidad, en lo referente al conjunto de sus operaciones y al uso de sus productos.</p>'
        ]);

        Content::create([
            'section_id' => 16,
            'order'     => 'AA',
            'content_1' => 'Programa de cuidado responsable del medio ambiente',
            'content_2' => 'Descargar programa'
        ]);

        Content::create([
            'section_id' => 16,
            'order'     => 'BB',
            'content_1' => 'Principios medulares de Cuidado Responsable Global',
            'content_2' => 'Ver principios'
        ]);

        Content::create([
            'section_id' => 17,
            'content_1' => 'Evaluación permanente',
            'content_2' => '<p>Cuidado Responsable promueve la mejora continua en seguridad, salud y medio ambiente mediante el entrenamiento del personal, la mejora de las instalaciones y equipos, el desarrollo de los procedimientos y la inserción de las premisas de las políticas del programa.</p>'
        ]);

        Content::create([
            'section_id'    => 18,
            'order'         => 'AA',
            'image'         => 'images/security/Grupo_3517.png',
            'content_1'     => 'Autoevaluaciones',
            'content_2'     => 'Son el autoanálisis periódico de las prácticas de cada código, realizado por las empresas adheridas. Como resultado se obtiene un diagnóstico de la situación del programa en cada una de ellas, y cuándo la situación en alguna de las prácticas no es satisfactoria se debe confeccionar un plan de mejora, con asignación de recursos y fechas de cumplimiento.'
        ]);

        Content::create([
            'section_id'    => 18,
            'order'         => 'AA',
            'image'         => 'images/security/Grupo_3516.png',
            'content_1'     => 'Indicadores de desempeño',
            'content_2'     => 'Anualmente se compilan parámetros relacionados con la seguridad y el ambiente para evaluar mejoras obtenidas por la aplicación del programa, por ejemplo cantidad de accidentes industriales, inversiones y costos de operación de instalaciones y equipos, número de incidentes ambientales y durante el transporte y tratamiento y disposición de desperdicios.'
        ]);

        Content::create([
            'section_id'    => 18,
            'order'         => 'AA',
            'image'         => 'images/security/Grupo_3515.png',
            'content_1'     => 'Auditorías',
            'content_2'     => 'Para enfatizar el interes de la CIQyP por el cumplimiento de las normas del programa y para determinar el estado del mismo en las propias instalaciones de las empresas se cuenta con un plan de auditorias realizado por auditores especializados de IRAM (Insituto Argentino de Normalización y Certificación). Las auditorias se repiten cada dos años y son calificadas, para que la compañia pueda conocer su nivel de alineación con Cuidado Responsable.'
        ]);
    }
}
  


  
