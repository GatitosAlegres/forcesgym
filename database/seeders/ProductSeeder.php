<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{

    private function getProductImage($name)
    {
        return 'products/' . $name;
    }

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

                "supplier_id" => 1,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('cinta_correr.webp'),
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

                "supplier_id" => 3,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('juego_mancuernas.webp'),
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

                "supplier_id" => 5,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('tapete_yoga.webp'),
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

                "supplier_id" => 2,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('guantes_boxeo.webp'),
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

                "supplier_id" => 8,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('suplemento_proteico.webp'),
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

                "supplier_id" => 5,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('bicicleta_estatica.webp'),
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

                "supplier_id" => 6,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('leggings.webp'),
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

                "supplier_id" => 6,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('zapatillas.webp'),
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

                "supplier_id" => 4,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('shaker.webp'),
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

                "supplier_id" => 1,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('libro_entrenamiento.webp'),
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

                "supplier_id" => 3,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('eliptica.webp'),
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

                "supplier_id" => 2,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('pesas_ajustables.webp'),
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

                "supplier_id" => 5,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('bloque_yoga.webp'),
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

                "supplier_id" => 4,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('pelota_pilates.webp'),
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

                "supplier_id" => 5,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('step.webp'),
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

                "supplier_id" => 2,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('masajeador_rodillos.webp'),
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

                "supplier_id" => 3,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('banda_resistencia.webp'),
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

                "supplier_id" => 3,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('saco_boxeo.webp'),
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

                "supplier_id" => 1,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('caja_plyo.webp'),
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

                "supplier_id" => 1,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('bosu_balance_trainer.webp'),
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

                "supplier_id" => 9,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('proteina_polvo.webp'),
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

                "supplier_id" => 6,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('camiseta.webp'),
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

                "supplier_id" => 6,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('zapatillas_entrenamiento.webp'),
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

                "supplier_id" => 7,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('botella_agua.webp'),
                "category_id" => 17
            ],

            [
                "name" => "Botella de Proteína con Compartimentos",
                "description" => "Botella de proteína con compartimentos para almacenar polvo y suplementos antes de mezclarlos.",
                "purchase_price" => 99.99,
                "sale_price" => 119.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => 8,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('botella_proteina_compartimientos.webp'),
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

                "supplier_id" => 3,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('bicicleta_spinning_peloton.webp'),
                "category_id" => 1
            ],
            [
                "name" => "Cuerda de Saltar",
                "description" => "Cuerda de saltar ajustable para ejercicios de 1 y agilidad.",
                "purchase_price" => 74.99,
                "sale_price" => 94.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => 4,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('cuerda_saltar.webp'),
                "category_id" => 5
            ],
            [
                "name" => "Casaca Deportiva",
                "description" => "Casaca deportiva para mantenerte abrigado antes y después del entrenamiento.",
                "purchase_price" => 159.99,
                "sale_price" => 179.99,
                "stock" => 0,
                "backorder" => rand(0, 1),
                "barcode" => mt_rand(1000000000000, 9999999999999),

                "supplier_id" => 6,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('casaca_deportiva.webp'),
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

                "supplier_id" => 6,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('casaca_impermeable.webp'),
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

                "supplier_id" => 6,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('casaca_acolchada.webp'),
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

                "supplier_id" => 6,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('casaca_entrenamiento.webp'),
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

                "supplier_id" => 8,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('proteina_polvo.webp'),
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

                "supplier_id" => 8,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('bcca_capsulas.webp'),
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

                "supplier_id" => 9,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('multivitaminico.webp'),
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

                "supplier_id" => 8,
                "is_visible" => 1,
                "requires_shipping" => 1,

                "security_stock" => rand(1, 10),
                "image" => $this->getProductImage('omega3.webp'),
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
