<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [

            [
                "name" => "Cinta de correr ProForm",
                "description" => "Cinta de correr profesional con motor potente y programas de entrenamiento variados.",
                "price" => 1499.99,
                "stock" => 10,
                "image" => "proform_treadmill.jpg",
                "category_id" => 1
            ],
            [
                "name" => "Juego de Mancuernas Nike",
                "description" => "Mancuernas de alta calidad para ejercicios de fuerza, con agarre cómodo.",
                "price" => 199.99,
                "stock" => 25,
                "image" => "nike_dumbbells.jpg",
                "category_id" => 2
            ],
            [
                "name" => "Tapete de Yoga adidas",
                "description" => "Tapete de yoga antideslizante con material ecológico, ideal para prácticas de yoga y estiramientos.",
                "price" => 39.99,
                "stock" => 30,
                "image" => "adidas_yoga_mat.jpg",
                "category_id" => 3
            ],
            [
                "name" => "Guantes de Boxeo Everlast",
                "description" => "Guantes de boxeo de alta resistencia de la marca Everlast, ideales para entrenamientos intensos.",
                "price" => 79.99,
                "stock" => 15,
                "image" => "everlast_boxing_gloves.jpg",
                "category_id" => 8
            ],
            [
                "name" => "Suplemento Proteico Optimum Nutrition",
                "description" => "Proteína en polvo de alta calidad de Optimum Nutrition para el desarrollo muscular y la recuperación.",
                "price" => 49.99,
                "stock" => 50,
                "image" => "optimum_nutrition_protein.jpg",
                "category_id" => 11
            ],
            [
                "name" => "Bicicleta estática Schwinn",
                "description" => "Bicicleta estática de la reconocida marca Schwinn, con pantalla LCD y múltiples niveles de resistencia.",
                "price" => 799.99,
                "stock" => 20,
                "image" => "schwinn_exercise_bike.jpg",
                "category_id" => 1
            ],
            [
                "name" => "Leggings Reebok para Yoga",
                "description" => "Leggings de alta calidad de Reebok ideales para sesiones de yoga y entrenamiento.",
                "price" => 49.99,
                "stock" => 40,
                "image" => "reebok_yoga_leggings.jpg",
                "category_id" => 13
            ],
            [
                "name" => "Zapatillas Nike Air Zoom",
                "description" => "Zapatillas deportivas Nike Air Zoom para correr con comodidad y estilo.",
                "price" => 129.99,
                "stock" => 30,
                "image" => "nike_air_zoom_shoes.jpg",
                "category_id" => 14
            ],
            [
                "name" => "Shaker BlenderBottle",
                "description" => "Shaker de BlenderBottle para preparar batidos de proteína con facilidad en el gimnasio.",
                "price" => 9.99,
                "stock" => 100,
                "image" => "blenderbottle_shaker.jpg",
                "category_id" => 7
            ],
            [
                "name" => "Libro de Entrenamiento CrossFit",
                "description" => "Libro de entrenamiento CrossFit con rutinas y consejos de los expertos en fitness.",
                "price" => 24.99,
                "stock" => 15,
                "image" => "crossfit_training_book.jpg",
                "category_id" => 19
            ],
            [
                "name" => "Elíptica NordicTrack",
                "description" => "Elíptica de alta gama de NordicTrack con pantalla táctil y múltiples programas de entrenamiento.",
                "price" => 1199.99,
                "stock" => 10,
                "image" => "nordictrack_elliptical.jpg",
                "category_id" => 1
            ],
            [
                "name" => "Set de Pesas Ajustables Bowflex",
                "description" => "Set de pesas ajustables Bowflex con incrementos de peso, perfecto para entrenamiento de fuerza en casa.",
                "price" => 399.99,
                "stock" => 20,
                "image" => "bowflex_adjustable_weights.jpg",
                "category_id" => 2
            ],
            [
                "name" => "Bloque de Yoga Gaiam",
                "description" => "Bloque de yoga de alta densidad Gaiam para mejorar la flexibilidad y el equilibrio en tus posturas.",
                "price" => 12.99,
                "stock" => 50,
                "image" => "gaiam_yoga_block.jpg",
                "category_id" => 3
            ],
            [
                "name" => "Pelota de Pilates Stamina",
                "description" => "Pelota de Pilates Stamina para fortalecer el núcleo y mejorar la estabilidad.",
                "price" => 19.99,
                "stock" => 30,
                "image" => "stamina_pilates_ball.jpg",
                "category_id" => 4
            ],
            [
                "name" => "Step Reebok",
                "description" => "Step Reebok ajustable para ejercicios aeróbicos y de resistencia.",
                "price" => 49.99,
                "stock" => 25,
                "image" => "reebok_step.jpg",
                "category_id" => 5
            ],
            [
                "name" => "Masajeador de Rodillos TriggerPoint",
                "description" => "Masajeador de rodillos TriggerPoint para liberar la tensión muscular y mejorar la recuperación.",
                "price" => 29.99,
                "stock" => 40,
                "image" => "triggerpoint_roller_massager.jpg",
                "category_id" => 6
            ],
            [
                "name" => "Banda de Resistencia Fit Simplify",
                "description" => "Banda de resistencia Fit Simplify con múltiples niveles de resistencia para entrenamientos versátiles.",
                "price" => 14.99,
                "stock" => 60,
                "image" => "fit_simplify_resistance_band.jpg",
                "category_id" => 7
            ],
            [
                "name" => "Saco de Boxeo Everlast",
                "description" => "Saco de boxeo Everlast con cadena de montaje, ideal para entrenamiento de golpeo.",
                "price" => 129.99,
                "stock" => 15,
                "image" => "everlast_punching_bag.jpg",
                "category_id" => 8
            ],
            [
                "name" => "Caja Plyo Suave Valor Fitness",
                "description" => "Caja plyo suave de Valor Fitness para entrenamiento de pliometría con menor riesgo de lesiones.",
                "price" => 69.99,
                "stock" => 10,
                "image" => "valor_fitness_plyo_box.jpg",
                "category_id" => 9
            ],
            [
                "name" => "Bosu Balance Trainer",
                "description" => "Bosu Balance Trainer para mejorar el equilibrio, la coordinación y la fuerza en casa o en el gimnasio.",
                "price" => 89.99,
                "stock" => 20,
                "image" => "bosu_balance_trainer.jpg",
                "category_id" => 10
            ],
            [
                "name" => "Proteína en Polvo Optimum Nutrition",
                "description" => "Proteína en polvo de suero de leche de Optimum Nutrition para apoyar el crecimiento muscular y la recuperación.",
                "price" => 34.99,
                "stock" => 50,
                "image" => "optimum_nutrition_protein_powder.jpg",
                "category_id" => 11
            ],
            [
                "name" => "Camiseta Under Armour",
                "description" => "Camiseta deportiva Under Armour de alto rendimiento para entrenamientos intensos.",
                "price" => 24.99,
                "stock" => 60,
                "image" => "under_armour_shirt.jpg",
                "category_id" => 12
            ],
            [
                "name" => "Zapatillas de Entrenamiento New Balance",
                "description" => "Zapatillas de entrenamiento New Balance con amortiguación para comodidad durante los ejercicios.",
                "price" => 69.99,
                "stock" => 40,
                "image" => "new_balance_training_shoes.jpg",
                "category_id" => 14
            ],
            [
                "name" => "Botella de Agua Hydro Flask",
                "description" => "Botella de agua Hydro Flask aislada para mantener tus bebidas frías o calientes durante tus entrenamientos.",
                "price" => 29.99,
                "stock" => 30,
                "image" => "hydro_flask_water_bottle.jpg",
                "category_id" => 17
            ],
            [
                "name" => "Reloj Deportivo Garmin",
                "description" => "Reloj deportivo Garmin con GPS y seguimiento de actividad para mejorar tu entrenamiento.",
                "price" => 149.99,
                "stock" => 15,
                "image" => "garmin_sport_watch.jpg",
                "category_id" => 16
            ],
            [
                "name" => "Cuerda de Salto Crossrope",
                "description" => "Cuerda de salto Crossrope con sistema de intercambio de pesos para entrenamiento de 1 y resistencia.",
                "price" => 34.99,
                "stock" => 25,
                "image" => "crossrope_jump_rope.jpg",
                "category_id" => 18
            ],
            [
                "name" => "Libro de Yoga para Principiantes",
                "description" => "Libro de yoga con instrucciones y ejercicios para principiantes que desean comenzar su práctica.",
                "price" => 14.99,
                "stock" => 30,
                "image" => "yoga_beginners_book.jpg",
                "category_id" => 19
            ],
            [
                "name" => "Cuaderno de Entrenamiento",
                "description" => "Cuaderno de entrenamiento para llevar un registro detallado de tus sesiones y progresos en el gimnasio.",
                "price" => 9.99,
                "stock" => 40,
                "image" => "training_notebook.jpg",
                "category_id" => 20
            ],
            [
                "name" => "Botella de Proteína con Compartimentos",
                "description" => "Botella de proteína con compartimentos para almacenar polvo y suplementos antes de mezclarlos.",
                "price" => 12.99,
                "stock" => 50,
                "image" => "protein_shaker_bottle.jpg",
                "category_id" => 21
            ],
            [
                "name" => "Bicicleta de Spinning Peloton",
                "description" => "Bicicleta de spinning Peloton con pantalla táctil para clases virtuales en tiempo real.",
                "price" => 1999.99,
                "stock" => 15,
                "image" => "peloton_spinning_bike.jpg",
                "category_id" => 1
            ],
            [
                "name" => "Banco de Pesas Bowflex",
                "description" => "Banco de pesas ajustable Bowflex para entrenamiento de fuerza versátil en casa.",
                "price" => 299.99,
                "stock" => 20,
                "image" => "bowflex_weight_bench.jpg",
                "category_id" => 2
            ],
            [
                "name" => "Esterilla de Yoga Liforme",
                "description" => "Esterilla de yoga Liforme con marcas de alineación para mejorar la postura y la práctica de yoga.",
                "price" => 69.99,
                "stock" => 25,
                "image" => "liforme_yoga_mat.jpg",
                "category_id" => 3
            ],
            [
                "name" => "Rueda de Pilates Merrithew",
                "description" => "Rueda de Pilates Merrithew para fortalecer el núcleo y mejorar la flexibilidad.",
                "price" => 29.99,
                "stock" => 30,
                "image" => "merrithew_pilates_wheel.jpg",
                "category_id" => 4
            ],
            [
                "name" => "Cuerda de Saltar Reebok",
                "description" => "Cuerda de saltar Reebok ajustable para ejercicios de 1 y agilidad.",
                "price" => 14.99,
                "stock" => 40,
                "image" => "reebok_jump_rope.jpg",
                "category_id" => 5
            ],
            [
                "name" => "Rodillo de Espuma TriggerPoint",
                "description" => "Rodillo de espuma TriggerPoint para liberar la tensión muscular y mejorar la movilidad.",
                "price" => 19.99,
                "stock" => 35,
                "image" => "triggerpoint_foam_roller.jpg",
                "category_id" => 6
            ],
            [
                "name" => "Guantes de Levantamiento Harbinger",
                "description" => "Guantes de levantamiento Harbinger con muñequera ajustable para proteger tus manos y muñecas.",
                "price" => 24.99,
                "stock" => 50,
                "image" => "harbinger_weightlifting_gloves.jpg",
                "category_id" => 7
            ],
            [
                "name" => "Saco de Boxeo Century",
                "description" => "Saco de boxeo Century de alta resistencia para golpeo y entrenamiento de artes marciales.",
                "price" => 149.99,
                "stock" => 15,
                "image" => "century_punching_bag.jpg",
                "category_id" => 8
            ],
            [
                "name" => "Proteína Vegana Orgain",
                "description" => "Proteína en polvo vegana Orgain para apoyar el crecimiento muscular y la recuperación con ingredientes naturales.",
                "price" => 29.99,
                "stock" => 30,
                "image" => "orgain_vegan_protein_powder.jpg",
                "category_id" => 11
            ],
            [
                "name" => "Mallas Under Armour",
                "description" => "Mallas deportivas Under Armour con tejido transpirable y ajuste cómodo para entrenamientos intensos.",
                "price" => 39.99,
                "stock" => 25,
                "image" => "under_armour_leggings.jpg",
                "category_id" => 11
            ],
            [
                "name" => "Zapatillas Reebok CrossFit",
                "description" => "Zapatillas Reebok CrossFit diseñadas para levantamiento de pesas y entrenamiento de alta intensidad.",
                "price" => 89.99,
                "stock" => 20,
                "image" => "reebok_crossfit_shoes.jpg",
                "category_id" => 14
            ],
            [
                "name" => "Botella de Agua CamelBak",
                "description" => "Botella de agua CamelBak con sistema de hidratación a prueba de fugas, perfecta para deportes al aire libre.",
                "price" => 17.99,
                "stock" => 40,
                "image" => "camelbak_water_bottle.jpg",
                "category_id" => 17
            ],
            [
                "name" => "Smartwatch Fitbit",
                "description" => "Smartwatch Fitbit con seguimiento de actividad, ritmo cardíaco y funciones de salud y bienestar.",
                "price" => 129.99,
                "stock" => 10,
                "image" => "fitbit_smartwatch.jpg",
                "category_id" => 16
            ],
            [
                "name" => "Banda de Resistencia TheraBand",
                "description" => "Banda de resistencia TheraBand para ejercicios de fortalecimiento y rehabilitación.",
                "price" => 9.99,
                "stock" => 30,
                "image" => "theraband_resistance_band.jpg",
                "category_id" => 18
            ],
            [
                "name" => "Libro de Nutrición Deportiva",
                "description" => "Libro de nutrición deportiva con pautas y recetas para una alimentación equilibrada y rendimiento óptimo.",
                "price" => 14.99,
                "stock" => 25,
                "image" => "sports_nutrition_book.jpg",
                "category_id" => 19
            ],
            [
                "name" => "Agenda de Entrenamiento",
                "description" => "Agenda de entrenamiento con planificación de rutinas, seguimiento de progresos y objetivos.",
                "price" => 7.99,
                "stock" => 50,
                "image" => "training_agenda.jpg",
                "category_id" => 20
            ],
            [
                "name" => "Botella con Infusor de Frutas",
                "description" => "Botella con infusor de frutas para disfrutar de agua saborizada durante tus entrenamientos.",
                "price" => 12.99,
                "stock" => 40,
                "image" => "fruit_infusion_bottle.jpg",
                "category_id" => 21
            ],
            [
                "name" => "Casaca Deportiva Adidas",
                "description" => "Casaca deportiva de la reconocida marca Adidas para mantenerte abrigado antes y después del entrenamiento.",
                "price" => 59.99,
                "stock" => 25,
                "image" => "adidas_sport_jacket.jpg",
                "category_id" => 12
            ],
            [
                "name" => "Casaca Impermeable Columbia",
                "description" => "Casaca impermeable Columbia para actividades al aire libre, con protección contra la lluvia y el viento.",
                "price" => 79.99,
                "stock" => 20,
                "image" => "columbia_waterproof_jacket.jpg",
                "category_id" => 12
            ],
            [
                "name" => "Casaca Acolchada Puma",
                "description" => "Casaca acolchada Puma para mantener el calor en climas fríos, con estilo deportivo y comodidad.",
                "price" => 69.99,
                "stock" => 30,
                "image" => "puma_padded_jacket.jpg",
                "category_id" => 12
            ],
            [
                "name" => "Casaca de Entrenamiento Nike",
                "description" => "Casaca de entrenamiento Nike con tejido transpirable y diseño ergonómico para movimientos sin restricciones.",
                "price" => 49.99,
                "stock" => 35,
                "image" => "nike_training_jacket.jpg",
                "category_id" => 12
            ],
            [
                "name" => "Casaca Reflectante Reebok",
                "description" => "Casaca reflectante Reebok para correr de noche, aumentando la visibilidad y la seguridad.",
                "price" => 44.99,
                "stock" => 15,
                "image" => "reebok_reflective_jacket.jpg",
                "category_id" => 12
            ],
            [
                "name" => "Proteína en Polvo Gold Standard",
                "description" => "Proteína en polvo Gold Standard de Optimum Nutrition con 24 gramos de proteína por porción.",
                "price" => 29.99,
                "stock" => 50,
                "image" => "gold_standard_protein_powder.jpg",
                "category_id" => 15
            ],
            [
                "name" => "BCCA en Cápsulas NutraBlast",
                "description" => "Suplemento de BCAA en cápsulas NutraBlast para recuperación muscular y resistencia.",
                "price" => 19.99,
                "stock" => 40,
                "image" => "nutrablast_bcaa_capsules.jpg",
                "category_id" => 15
            ],
            [
                "name" => "Multivitamínico Nature's Way",
                "description" => "Multivitamínico Nature's Way con vitaminas esenciales y minerales para un apoyo nutricional completo.",
                "price" => 14.99,
                "stock" => 60,
                "image" => "natures_way_multivitamin.jpg",
                "category_id" => 15
            ],
            [
                "name" => "Omega-3 NutraBlast",
                "description" => "Suplemento de aceite de pescado Omega-3 NutraBlast para salud cardiovascular y bienestar general.",
                "price" => 9.99,
                "stock" => 70,
                "image" => "nutrablast_omega3.jpg",
                "category_id" => 15
            ]
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
