<?php
/**
 * Preguntas frecuentes de la sección #faq.
 * Para agregar una pregunta, añade un elemento al arreglo.
 * Las preguntas se reparten automáticamente en slides de FAQ_PER_SLIDE.
 */

const FAQ_PER_SLIDE = 5;

return [
    // ===== Validación =====
    [
        'q' => '¿Por qué es necesario contar con una base de datos validada?',
        'a' => 'Una base de datos validada garantiza la integridad, trazabilidad y confiabilidad de la información de seguridad de los pacientes. Además, asegura el cumplimiento con las normativas regulatorias internacionales que exigen sistemas validados para la gestión de SRA.',
    ],
    [
        'q' => 'Si ya cuento con una base de datos, ¿es necesario validarla?',
        'a' => 'Sí. Incluso si ya dispones de una base de datos operativa, esta debe ser validada para demostrar que cumple con los requisitos funcionales, técnicos y regulatorios aplicables.',
    ],
    [
        'q' => '¿Qué implica el proceso de validación de una base de datos?',
        'a' => 'Incluye la planificación, ejecución y documentación de pruebas que demuestran que el sistema cumple su propósito previsto. Abarca la validación de instalación (IQ), operación (OQ) y desempeño (PQ) y capacitación de usuarios.',
    ],
    [
        'q' => '¿Cuánto tiempo toma la validación de una base de datos?',
        'a' => 'Depende de la complejidad del sistema, la disponibilidad de la información y el grado de automatización requerido. En promedio, el proceso puede tomar de 4 a 12 semanas.',
    ],
    [
        'q' => '¿Qué beneficios ofrece una base de datos validada?',
        'a' => 'Una base de datos validada permite garantizar la exactitud y trazabilidad de los reportes, reducir errores humanos, agilizar auditorías regulatorias y fortalecer la calidad del sistema de farmacovigilancia.',
    ],
    [
        'q' => '¿Qué pasa si el sistema no está validado ante una inspección?',
        'a' => 'Esto puede considerarse una no conformidad crítica, ya que compromete la confiabilidad de los datos de seguridad. Esto puede derivar en observaciones regulatorias, suspensión de procesos o pérdida de certificaciones de cumplimiento.',
    ],

    // ===== Estándares internacionales =====
    [
        'q' => '¿Por qué un sistema de farmacovigilancia debe operar bajo estándares internacionales?',
        'a' => 'Los estándares armonizados de ICH y de la OMS garantizan que la información de seguridad se registre, interprete e intercambie de manera uniforme entre titulares de registro, autoridades sanitarias y socios comerciales. Su adopción reduce la variabilidad en el procesamiento de casos y facilita la interoperabilidad con sistemas regulatorios. También asegura que los datos conserven su valor analítico a lo largo de todo el ciclo de vida del producto.',
    ],
    [
        'q' => '¿Qué establece la guía ICH E2B(R3) y qué implica su cumplimiento?',
        'a' => 'ICH E2B(R3) define los elementos de datos, la estructura y el formato de transmisión electrónica (XML, basado en el estándar ISO/HL7 ICSR) de los Reportes Individuales de Seguridad (ICSR). Su cumplimiento permite el intercambio electrónico de casos sin reprocesamiento manual y garantiza la integridad del contenido durante la transmisión. Además, alinea la operación local con los requisitos de las principales agencias regulatorias. Alessa Database estructura cada caso bajo E2B(R3) y genera el archivo XML correspondiente para su transmisión.',
    ],
    [
        'q' => '¿Cuál es la función de MedDRA en la gestión de reacciones adversas?',
        'a' => 'MedDRA (Medical Dictionary for Regulatory Activities), terminología médica reconocida por ICH bajo la guía M1, es el estándar internacional para codificar reacciones adversas, indicaciones, antecedentes médicos y hallazgos clínicos. Su estructura jerárquica de cinco niveles (LLT, PT, HLT, HLGT y SOC) permite agrupar términos clínicamente equivalentes. Con ella se realizan búsquedas consistentes y se agregan datos con fines de detección de señales. Una codificación no estandarizada puede fragmentar la información y comprometer la identificación oportuna de riesgos.',
    ],
    [
        'q' => '¿Qué aporta WHODrug Global a la calidad de la información de casos?',
        'a' => 'WHODrug Global, mantenido por el Uppsala Monitoring Centre (OMS), es el diccionario de referencia para la codificación de medicamentos. Permite identificar de forma inequívoca el producto sospechoso y la medicación concomitante, vinculando nombres comerciales con sus principios activos y su clasificación ATC. Su uso elimina ambigüedades entre denominaciones de distintos mercados y respalda el análisis por sustancia activa. Así facilita la evaluación de interacciones medicamentosas.',
    ],

    // ===== Calidad de datos =====
    [
        'q' => '¿Qué se entiende por calidad de datos en farmacovigilancia?',
        'a' => 'La calidad de datos comprende la completitud, exactitud, consistencia y trazabilidad de la información de seguridad, conforme a los principios ALCOA+ (atribuible, legible, contemporáneo, original y exacto, además de completo, consistente, perdurable y disponible). En la práctica, exige verificar los criterios mínimos de validez del caso: paciente identificable, notificador identificable, medicamento sospechoso y reacción adversa debidamente estandarizada por la OMS.',
    ],
    [
        'q' => '¿Cómo se traduce la calidad del dato en operaciones estandarizadas?',
        'a' => 'La estandarización y codificación uniforme de datos permite desarrollar una farmacovigilancia homogénea, reproducible y trazable, reduciendo la dependencia del operador. Esto facilita la evaluación de causalidad, el cumplimiento de plazos regulatorios, la elaboración de IPS, la gestión de señales y la predicción de reacciones adversas, sobre una única fuente de información confiable, auditable y escalable.',
    ],
    [
        'q' => '¿La adopción de estándares responde únicamente a una exigencia regulatoria?',
        'a' => 'La estandarización de una base de datos de farmacovigilancia va más allá del cumplimiento normativo, es un activo estratégico para el análisis de tendencias, la detección temprana de señales y la toma de decisiones. Asimismo, facilita el intercambio de información bajo el estándar E2B(R3) con licenciantes y socios globales, fortaleciendo la gestión del riesgo y la toma de decisiones.',
    ],

    // ===== Alessa e IA =====
    [
        'q' => '¿Cómo facilita Alessa Database la adopción de estos estándares?',
        'a' => 'Alessa Database incorpora el estándar E2B(R3) en todo el ciclo de vida de la SRA, desde su registro hasta el sometimiento a la autoridad. Complementa esta funcionalidad con validación del sistema conforme a GAMP 5 y 21 CFR Part 11, respaldo en la nube, garantizando que el cumplimiento del estándar sea inherente al sistema y no dependa del criterio del usuario.',
    ],
    [
        'q' => '¿Por qué la estandarización de datos es un requisito previo para incorporar inteligencia artificial en farmacovigilancia?',
        'a' => 'La calidad y estandarización de los datos constituyen la base para implementar soluciones de IA en farmacovigilancia, como el triaje automatizado, la codificación MedDRA, la detección de duplicados y la identificación de señales. Alessa Database impulsa una revolución en farmacovigilancia mediante la gestión estructurada, uniforme y trazable de los casos, preparando a las organizaciones para adoptar modelos de IA de manera segura y confiable.',
    ],
];
