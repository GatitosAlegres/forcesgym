<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            [
                "name" => "Cinta de correr",
                "description" => "Cinta de correr profesional con motor potente y programas de entrenamiento variados.",
                "purchase_price" => 1499.99,
                "sale_price" => 1699.99,

                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_716395-MPE52473668921_112022-V.webp",
                "category_id" => 1,
            ],
            [
                "name" => "Juego de Mancuernas",
                "description" => "Mancuernas de alta calidad para ejercicios de fuerza, con agarre cómodo.",
                "purchase_price" => 199.99,
                "sale_price" => 219.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_915122-MLA70676439993_072023-V.webp",
                "category_id" => 2
            ],
            [
                "name" => "Tapete de Yoga",
                "description" => "Tapete de yoga antideslizante con material ecológico, ideal para prácticas de yoga y estiramientos.",
                "purchase_price" => 439.99,
                "sale_price" => 459.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_963396-MPE43438549132_092020-V.webp",
                "category_id" => 3
            ],
            [
                "name" => "Guantes de Boxeo",
                "description" => "Guantes de boxeo de alta resistencia, ideales para entrenamientos intensos.",
                "purchase_price" => 79.99,
                "sale_price" => 99.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_904472-MPE52560267029_112022-V.webp",
                "category_id" => 7
            ],
            [
                "name" => "Suplemento Proteico",
                "description" => "Proteína en polvo de alta calidad para el desarrollo muscular y la recuperación.",
                "purchase_price" => 349.99,
                "sale_price" => 369.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_649382-MPE51246551900_082022-V.webp",
                "category_id" => 10
            ],
            [
                "name" => "Bicicleta estática",
                "description" => "Bicicleta estática, con pantalla LCD y múltiples niveles de resistencia.",
                "purchase_price" => 2799.99,
                "sale_price" => 2999.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_648559-MPE70351429650_072023-V.webp",
                "category_id" => 1
            ],
            [
                "name" => "Leggings",
                "description" => "Leggings de alta calidad ideales para sesiones de yoga y entrenamiento.",
                "purchase_price" => 249.99,
                "sale_price" => 269.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_688694-MPE69502000642_052023-W.webp",
                "category_id" => 13
            ],
            [
                "name" => "Zapatillas",
                "description" => "Zapatillas deportivas para correr con comodidad y estilo.",
                "purchase_price" => 329.99,
                "sale_price" => 349.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_605709-MPE54956081543_042023-V.webp",
                "category_id" => 14
            ],
            [
                "name" => "Shaker",
                "description" => "Shaker para preparar batidos de proteína con facilidad en el gimnasio.",
                "purchase_price" => 19.99,
                "sale_price" => 29.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_662901-MPE71030399519_082023-V.webp",
                "category_id" => 21,
            ],
            [
                "name" => "Libro de Entrenamiento",
                "description" => "Libro de entrenamiento con rutinas y consejos de los expertos en fitness.",
                "purchase_price" => 84.99,
                "sale_price" => 104.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_767987-MPE43775259263_102020-V.webp",
                "category_id" => 19
            ],
            [
                "name" => "Elíptica",
                "description" => "Elíptica de alta gama con pantalla táctil y múltiples programas de entrenamiento.",
                "purchase_price" => 1199.99,
                "sale_price" => 1399.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_934238-MPE46776060919_072021-V.webp",
                "category_id" => 1
            ],
            [
                "name" => "Set de Pesas Ajustables",
                "description" => "Set de pesas ajustables con incrementos de peso, perfecto para entrenamiento de fuerza en casa.",
                "purchase_price" => 399.99,
                "sale_price" => 419.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_694851-MPE70068560908_062023-V.webp",
                "category_id" => 2
            ],
            [
                "name" => "Bloque de Yoga",
                "description" => "Bloque de yoga de alta densidad para mejorar la flexibilidad y el equilibrio en tus posturas.",
                "purchase_price" => 174.99,
                "sale_price" => 194.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_604801-MPE69673425074_052023-V.webp",
                "category_id" => 3
            ],
            [
                "name" => "Pelota de Pilates",
                "description" => "Pelota de Pilates para fortalecer el núcleo y mejorar la estabilidad.",
                "purchase_price" => 69.99,
                "sale_price" => 89.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_964049-MPE52968911734_122022-V.webp",
                "category_id" => 4
            ],
            [
                "name" => "Step",
                "description" => "Step ajustable para ejercicios aeróbicos y de resistencia.",
                "purchase_price" => 149.99,
                "sale_price" => 169.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_807067-MPE72106227837_102023-V.webp",
                "category_id" => 5
            ],
            [
                "name" => "Masajeador de Rodillos",
                "description" => "Masajeador de rodillos para liberar la tensión muscular y mejorar la recuperación.",
                "purchase_price" => 349.99,
                "sale_price" => 369.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_861821-MPE69822753091_062023-V.webp",
                "category_id" => 6
            ],
            [
                "name" => "Banda de Resistencia",
                "description" => "Banda de resistencia con múltiples niveles de resistencia para entrenamientos versátiles.",
                "purchase_price" => 179.99,
                "sale_price" => 199.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_728452-MPE69822791855_062023-V.webp",
                "category_id" => 17
            ],
            [
                "name" => "Saco de Boxeo",
                "description" => "Saco de boxeo con cadena de montaje, ideal para entrenamiento de golpeo.",
                "purchase_price" => 209.99,
                "sale_price" => 229.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_761672-MPE52670198289_112022-V.webp",
                "category_id" => 7
            ],
            [
                "name" => "Caja Plyo Suave",
                "description" => "Caja plyo suave para entrenamiento de pliometría con menor riesgo de lesiones.",
                "purchase_price" => 69.99,
                "sale_price" => 89.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_776938-MLA52631829911_112022-V.webp",
                "category_id" => 8
            ],
            [
                "name" => "Bosu Balance Trainer",
                "description" => "Bosu Balance Trainer para mejorar el equilibrio, la coordinación y la fuerza en casa o en el gimnasio.",
                "purchase_price" => 89.99,
                "sale_price" => 109.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_801449-MPE43231521781_082020-V.webp",
                "category_id" => 9
            ],
            [
                "name" => "Proteína en Polvo",
                "description" => "Proteína en polvo de suero de leche para apoyar el crecimiento muscular y la recuperación.",
                "purchase_price" => 204.99,
                "sale_price" => 224.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_833364-MPE70248816831_072023-V.webp",
                "category_id" => 10
            ],
            [
                "name" => "Camiseta",
                "description" => "Camiseta deportiva de alto rendimiento para entrenamientos intensos.",
                "purchase_price" => 24.99,
                "sale_price" => 44.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_809542-MPE49385170748_032022-V.webp",
                "category_id" => 11
            ],
            [
                "name" => "Zapatillas de Entrenamiento",
                "description" => "Zapatillas de entrenamiento con amortiguación para comodidad durante los ejercicios.",
                "purchase_price" => 399.99,
                "sale_price" => 419.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_915231-MPE54692886388_032023-V.webp",
                "category_id" => 14
            ],
            [
                "name" => "Botella de Agua",
                "description" => "Botella de agua aislada para mantener tus bebidas frías o calientes durante tus entrenamientos.",
                "purchase_price" => 29.99,
                "sale_price" => 49.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_633435-MPE69777332589_062023-V.webp",
                "category_id" => 17
            ],
            [
                "name" => "Reloj Deportivo",
                "description" => "Reloj deportivo con GPS y seguimiento de actividad para mejorar tu entrenamiento.",
                "purchase_price" => 249.99,
                "sale_price" => 269.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_947271-MPE45815994513_052021-V.webp",
                "category_id" => 16
            ],
            [
                "name" => "Cuerda de Salto",
                "description" => "Cuerda de salto con sistema de intercambio de pesos para entrenamiento de 1 y resistencia.",
                "purchase_price" => 34.99,
                "sale_price" => 54.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_713711-MPE49193584502_022022-V.webp",
                "category_id" => 18
            ],
            [
                "name" => "Libro de Yoga para Principiantes",
                "description" => "Libro de yoga con instrucciones y ejercicios para principiantes que desean comenzar su práctica.",
                "purchase_price" => 94.99,
                "sale_price" => 114.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_732083-MLA41780993500_052020-V.webp",
                "category_id" => 19
            ],
            [
                "name" => "Cuaderno de Entrenamiento",
                "description" => "Cuaderno de entrenamiento para llevar un registro detallado de tus sesiones y progresos en el gimnasio.",
                "purchase_price" => 19.99,
                "sale_price" => 39.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_691216-MPE49893059645_052022-V.webp",
                "category_id" => 20
            ],
            [
                "name" => "Botella de Proteína con Compartimentos",
                "description" => "Botella de proteína con compartimentos para almacenar polvo y suplementos antes de mezclarlos.",
                "purchase_price" => 99.99,
                "sale_price" => 119.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_760774-MPE54946592025_042023-V.webp",
                "category_id" => 21
            ],
            [
                "name" => "Bicicleta de Spinning Peloton",
                "description" => "Bicicleta de spinning Peloton con pantalla táctil para clases virtuales en tiempo real.",
                "purchase_price" => 1999.99,
                "sale_price" => 2199.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_891135-MPE71974563383_092023-V.webp",
                "category_id" => 1
            ],
            [
                "name" => "Banco de Pesas",
                "description" => "Banco de pesas ajustable para entrenamiento de fuerza versátil en casa.",
                "purchase_price" => 379.99,
                "sale_price" => 399.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_624759-MPE54366721267_032023-V.webp",
                "category_id" => 2
            ],
            [
                "name" => "Esterilla de Yoga",
                "description" => "Esterilla de yoga con marcas de alineación para mejorar la postura y la práctica de yoga.",
                "purchase_price" => 169.99,
                "sale_price" => 189.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_693058-MPE43452543540_092020-V.webp",
                "category_id" => 3
            ],
            [
                "name" => "Rueda de Pilates",
                "description" => "Rueda de Pilates para fortalecer el núcleo y mejorar la flexibilidad.",
                "purchase_price" => 92.99,
                "sale_price" => 112.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_666901-MPE45918406328_052021-V.webp",
                "category_id" => 4
            ],
            [
                "name" => "Cuerda de Saltar",
                "description" => "Cuerda de saltar ajustable para ejercicios de 1 y agilidad.",
                "purchase_price" => 74.99,
                "sale_price" => 94.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_735177-MPE71093280346_082023-V.webp",
                "category_id" => 5
            ],
            [
                "name" => "Rodillo de Espuma",
                "description" => "Rodillo de espuma para liberar la tensión muscular y mejorar la movilidad.",
                "purchase_price" => 119.99,
                "sale_price" => 139.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_937337-MPE69806069116_062023-V.webp",
                "category_id" => 6
            ],
            [
                "name" => "Guantes de Levantamiento",
                "description" => "Guantes de levantamiento con muñequera ajustable para proteger tus manos y muñecas.",
                "purchase_price" => 122.99,
                "sale_price" => 142.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_948252-MPE47515313416_092021-V.webp",
                "category_id" => 17
            ],
            [
                "name" => "Saco de Boxeo",
                "description" => "Saco de boxeo de alta resistencia para golpeo y entrenamiento de artes marciales.",
                "purchase_price" => 149.99,
                "sale_price" => 169.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_716608-MPE49488662407_032022-V.webp",
                "category_id" => 7
            ],
            [
                "name" => "Proteína Vegana",
                "description" => "Proteína en polvo vegana para apoyar el crecimiento muscular y la recuperación con ingredientes naturales.",
                "purchase_price" => 149.99,
                "sale_price" => 169.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_738298-MPE71607401086_092023-V.webp",
                "category_id" => 10
            ],
            [
                "name" => "Mallas",
                "description" => "Mallas deportivas con tejido transpirable y ajuste cómodo para entrenamientos intensos.",
                "purchase_price" => 59.99,
                "sale_price" => 79.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_731578-MPE71652188492_092023-V.webp",
                "category_id" => 13
            ],
            [
                "name" => "Zapatillas",
                "description" => "Zapatillas diseñadas para levantamiento de pesas y entrenamiento de alta intensidad.",
                "purchase_price" => 225.99,
                "sale_price" => 245.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_798984-MPE70434291284_072023-W.webp",
                "category_id" => 14
            ],
            [
                "name" => "Botella de Agua",
                "description" => "Botella de agua con sistema de hidratación a prueba de fugas, perfecta para deportes al aire libre.",
                "purchase_price" => 57.99,
                "sale_price" => 77.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_613004-MPE69777354799_062023-V.webp",
                "category_id" => 17
            ],
            [
                "name" => "Smartwatch",
                "description" => "Smartwatch con seguimiento de actividad, ritmo cardíaco y funciones de salud y bienestar.",
                "purchase_price" => 129.99,
                "sale_price" => 149.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_977105-MPE46135195875_052021-V.webp",
                "category_id" => 16
            ],
            [
                "name" => "Banda de Resistencia",
                "description" => "Banda de resistencia para ejercicios de fortalecimiento y rehabilitación.",
                "purchase_price" => 59.99,
                "sale_price" => 79.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_743973-MPE71610031322_092023-V.webp",
                "category_id" => 18
            ],
            [
                "name" => "Libro de Nutrición Deportiva",
                "description" => "Libro de nutrición deportiva con pautas y recetas para una alimentación equilibrada y rendimiento óptimo.",
                "purchase_price" => 64.99,
                "sale_price" => 84.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_751930-MLU54980186640_042023-V.webp",
                "category_id" => 19
            ],
            [
                "name" => "Agenda de Entrenamiento",
                "description" => "Agenda de entrenamiento con planificación de rutinas, seguimiento de progresos y objetivos.",
                "purchase_price" => 17.99,
                "sale_price" => 37.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_789029-MPE52943137681_122022-V.webp",
                "category_id" => 20
            ],
            [
                "name" => "Botella con Infusor de Frutas",
                "description" => "Botella con infusor de frutas para disfrutar de agua saborizada durante tus entrenamientos.",
                "purchase_price" => 32.99,
                "sale_price" => 52.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_619613-MPE71339946065_082023-V.webp",
                "category_id" => 21
            ],
            [
                "name" => "Casaca Deportiva",
                "description" => "Casaca deportiva para mantenerte abrigado antes y después del entrenamiento.",
                "purchase_price" => 159.99,
                "sale_price" => 179.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_774914-MPE69105477945_042023-V.webp",
                "category_id" => 12
            ],
            [
                "name" => "Casaca Impermeable",
                "description" => "Casaca impermeable para actividades al aire libre, con protección contra la lluvia y el viento.",
                "purchase_price" => 179.99,
                "sale_price" => 199.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_623005-MPE44531606035_012021-V.webp",
                "category_id" => 12
            ],
            [
                "name" => "Casaca Acolchada",
                "description" => "Casaca acolchada para mantener el calor en climas fríos, con estilo deportivo y comodidad.",
                "purchase_price" => 169.99,
                "sale_price" => 189.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_985481-MPE54849144739_042023-V.webp",
                "category_id" => 12
            ],
            [
                "name" => "Casaca de Entrenamiento ",
                "description" => "Casaca de entrenamiento con tejido transpirable y diseño ergonómico para movimientos sin restricciones.",
                "purchase_price" => 249.99,
                "sale_price" => 269.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_975481-MPE50219649439_062022-V.webp",
                "category_id" => 12
            ],
            [
                "name" => "Proteína en Polvo",
                "description" => "Proteína en polvo con 24 gramos de proteína por porción.",
                "purchase_price" => 29.99,
                "sale_price" => 49.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_833364-MPE70248816831_072023-V.webp",
                "category_id" => 15
            ],
            [
                "name" => "BCCA en Cápsulas",
                "description" => "Suplemento de BCAA en cápsulas para recuperación muscular y resistencia.",
                "purchase_price" => 99.99,
                "sale_price" => 119.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_657993-MPE47055202181_082021-V.webp",
                "category_id" => 15
            ],
            [
                "name" => "Multivitamínico",
                "description" => "Multivitamínico con vitaminas esenciales y minerales para un apoyo nutricional completo.",
                "purchase_price" => 144.99,
                "sale_price" => 164.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_684511-MPE49452721897_032022-V.webp",
                "category_id" => 15
            ],
            [
                "name" => "Omega-3",
                "description" => "Suplemento de aceite de pescado Omega-3 para salud cardiovascular y bienestar general.",
                "purchase_price" => 119.99,
                "sale_price" => 139.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => mt_rand(1, 10),
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => "https://http2.mlstatic.com/D_NQ_NP_637249-MLU71085053185_082023-V.webp",
                "category_id" => 15
            ]
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

        $products = Product::all();
        foreach ($products as $product) {
            $product->base_price = $product->purchase_price * 1.1;
            $slug = '';

            if ($product->name) {
                $slug .= str_replace(' ', '_', strtolower($product->name));
            }

            $slug .= '_' . date('Y');

            $product->slug = $slug;
            $product->save();
        }
    }
}
