<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Topic;

class TypesandTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
			'Acampada, viaje o retiro',
			'Atracción',
			'Carrera o evento de resistencia',
			'Cena o gala',
			'Clase, curso o taller',
			'Comparecencia o firma',
			'Concierto o actuación',
			'Conferencia',
			'Convención',
			'Encuentro o evento de red',
			'Feria comercial, feria de consumo o exposición',
			'Festival o feria',
			'Fiesta o reunión social',
			'Juego o competición',
			'"Otro',
			'Proyección',
			'Rally',
			'Seminario o charla',
			'Torneo',
			'Visita',
        ];

        $topics = [
			'Aficiones e intereses especiales',
			'Artes escénicas y visuales',
			'Ciencia y tecnología',
			'Cine, medios de comunicación y entretenimiento',
			'Coches, barcos y aviones',
			'Comunidad y cultura',
			'Deportes y salud',
			'Familia y educación',
			'Gastronomía',
			'Gobierno y política',
			'Hogar y estilo de vida',
			'Moda y belleza',
			'Música',
			'Negocios y servicios profesionales',
			'Organizaciones y causas benéficas',
			'Otro',
			'Religión y espiritualidad',
			'Salud y bienestar',
			'Vacaciones y días de fiesta',
			'Viajes y actividades al aire libre',
        ];

        foreach ($types as $key => $type) {
        	Type::create([
        		'name' => $type
    		]);
        }

        foreach ($topics as $key => $topic) {
        	Topic::create([
        		'name' => $topic
    		]);
        }
    }
}
