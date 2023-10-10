<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Funcionario;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::create(['nombres' => 'Gregorio ', 'apellidos' => 'Mamani Cutili', 'ci' => 913365, 'cargo' => 'tecnico', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '4',]);
        Funcionario::create(['nombres' => 'Gustabo ', 'apellidos' => 'Mamani Parraga', 'ci' => 913366, 'cargo' => 'tecnico', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '5',]);
        Funcionario::create(['nombres' => 'Ruben Leonardo ', 'apellidos' => 'Aruquipa Quispe Limachi', 'ci' => 913367, 'cargo' => 'profesional', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '6',]);
        Funcionario::create(['nombres' => 'Esteban ', 'apellidos' => 'Mamani Quispe', 'ci' => 913368, 'cargo' => 'ingenierio', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '7',]);
        Funcionario::create(['nombres' => 'Julio ', 'apellidos' => 'Cesar Blanco', 'ci' => 913369, 'cargo' => 'director', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '8',]);
        Funcionario::create(['nombres' => 'Faustino', 'apellidos' => 'Mendoza', 'ci' => 913370, 'cargo' => 'secretario', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '9',]);
        Funcionario::create(['nombres' => 'Jhony ', 'apellidos' => 'Alarcon Fernandez', 'ci' => 913371, 'cargo' => 'tecnico', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '10',]);
        Funcionario::create(['nombres' => 'Marta VIrginia ', 'apellidos' => 'Choque Mamani', 'ci' => 913372, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '11',]);
        Funcionario::create(['nombres' => 'Margarita ', 'apellidos' => 'Catari Alanoca', 'ci' => 913373, 'cargo' => 'tecnico', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '12',]);
        Funcionario::create(['nombres' => 'Mary Lucre ', 'apellidos' => 'Arispe Rojas', 'ci' => 913374, 'cargo' => 'secretario', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '13',]);
        Funcionario::create(['nombres' => 'Franz ', 'apellidos' => 'Flores Huayhua', 'ci' => 913375, 'cargo' => 'tecnico', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '14',]);
        Funcionario::create(['nombres' => 'Yerson ', 'apellidos' => 'Gomez Alaniz', 'ci' => 913376, 'cargo' => 'profesional', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '15',]);
        Funcionario::create(['nombres' => 'Octavio ', 'apellidos' => 'Idelfonso', 'ci' => 913377, 'cargo' => 'secretario', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '16',]);
        Funcionario::create(['nombres' => 'Jorge ', 'apellidos' => 'Luis Oscamaita', 'ci' => 913378, 'cargo' => 'director', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '17',]);
        Funcionario::create(['nombres' => 'Sheyla Scarlett ', 'apellidos' => 'Flores Ramos', 'ci' => 913379, 'cargo' => 'ingenierio', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '18',]);
        Funcionario::create(['nombres' => 'Gerardo Diego ', 'apellidos' => 'Mamani', 'ci' => 913380, 'cargo' => 'secretario', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '19',]);
        Funcionario::create(['nombres' => 'Victor ', 'apellidos' => 'Sarniento', 'ci' => 913381, 'cargo' => 'profesional', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '20',]);
        Funcionario::create(['nombres' => 'Elizabeth', 'apellidos' => 'Ibañez Parra', 'ci' => 913382, 'cargo' => 'ingenierio', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '21',]);
        Funcionario::create(['nombres' => 'Arnold Ruben ', 'apellidos' => 'Saavedra Flores', 'ci' => 913383, 'cargo' => 'profesional', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '22',]);
        Funcionario::create(['nombres' => 'Maruja ', 'apellidos' => 'Pinto Mamani', 'ci' => 913384, 'cargo' => 'ingenierio', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '23',]);
        Funcionario::create(['nombres' => 'Luis', 'apellidos' => 'Manzaneda ', 'ci' => 913385, 'cargo' => 'tecnico', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '24',]);
        Funcionario::create(['nombres' => 'Fernado dino', 'apellidos' => 'Paucara', 'ci' => 913386, 'cargo' => 'tecnico', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '25',]);
        Funcionario::create(['nombres' => 'Raul Gabriel', 'apellidos' => 'Loza Pinto', 'ci' => 913387, 'cargo' => 'profesional', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '26',]);
        Funcionario::create(['nombres' => 'Valdimir', 'apellidos' => 'Pinto Chopque', 'ci' => 913388, 'cargo' => 'ingenierio', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '27',]);
        Funcionario::create(['nombres' => 'Ivana', 'apellidos' => 'Yugar Mamani', 'ci' => 913389, 'cargo' => 'director', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '28',]);
        Funcionario::create(['nombres' => 'Belen', 'apellidos' => 'Yanarico', 'ci' => 913390, 'cargo' => 'secretario', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '29',]);
        Funcionario::create(['nombres' => 'Dan Cruz', 'apellidos' => 'Huascar Huyanca', 'ci' => 913391, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '30',]);
        Funcionario::create(['nombres' => 'Cesar ', 'apellidos' => 'Huianca Clemente', 'ci' => 913392, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '31',]);
        Funcionario::create(['nombres' => 'kate', 'apellidos' => 'Clemente Huallpa', 'ci' => 913393, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '32',]);
        Funcionario::create(['nombres' => 'Katerin', 'apellidos' => 'Gyr Huanca', 'ci' => 913394, 'cargo' => 'secretario', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '33',]);
        Funcionario::create(['nombres' => 'Carla', 'apellidos' => 'Yoson Yercos', 'ci' => 913395, 'cargo' => 'tecnico', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '34',]);
        Funcionario::create(['nombres' => 'Judith', 'apellidos' => 'Fernandez ', 'ci' => 913396, 'cargo' => 'profesional', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '35',]);
        Funcionario::create(['nombres' => 'Ruth', 'apellidos' => 'Folres ', 'ci' => 913397, 'cargo' => 'secretario', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '36',]);
        Funcionario::create(['nombres' => 'Lili', 'apellidos' => 'Ibaña Mamani', 'ci' => 913398, 'cargo' => 'director', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '37',]);
        Funcionario::create(['nombres' => 'Ydira', 'apellidos' => 'Parra sarniento', 'ci' => 913399, 'cargo' => 'ingenierio', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '38',]);
        Funcionario::create(['nombres' => 'Naira', 'apellidos' => 'Saaverdra chpoque', 'ci' => 913400, 'cargo' => 'secretario', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '39',]);
        Funcionario::create(['nombres' => 'Maira', 'apellidos' => 'Choquehuanca Mamani', 'ci' => 913401, 'cargo' => 'profesional', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '40',]);
        Funcionario::create(['nombres' => 'Angeliza', 'apellidos' => 'Guanca hismar ', 'ci' => 913402, 'cargo' => 'ingenierio', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '41',]);
        Funcionario::create(['nombres' => 'Angie', 'apellidos' => 'paulinas ', 'ci' => 913403, 'cargo' => 'profesional', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '42',]);
        Funcionario::create(['nombres' => 'Mabel', 'apellidos' => 'Cutili Parra', 'ci' => 913404, 'cargo' => 'ingenierio', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '43',]);
        Funcionario::create(['nombres' => 'Mariana', 'apellidos' => 'Cutili mamani', 'ci' => 913405, 'cargo' => 'tecnico', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '44',]);
        Funcionario::create(['nombres' => 'Marcos', 'apellidos' => 'Huyallhua ', 'ci' => 913406, 'cargo' => 'tecnico', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '45',]);
        Funcionario::create(['nombres' => 'Jennife', 'apellidos' => 'Copa Mamani', 'ci' => 913407, 'cargo' => 'profesional', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '46',]);
        Funcionario::create(['nombres' => 'Carolina ', 'apellidos' => 'Folres Herbas', 'ci' => 913408, 'cargo' => 'ingenierio', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '47',]);
        Funcionario::create(['nombres' => 'Catherine', 'apellidos' => 'Folres Pinto', 'ci' => 913409, 'cargo' => 'director', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '48',]);
        Funcionario::create(['nombres' => 'Carmen', 'apellidos' => 'Atea', 'ci' => 913410, 'cargo' => 'secretario', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '49',]);
        Funcionario::create(['nombres' => 'Roda', 'apellidos' => 'Tirado mamni', 'ci' => 913411, 'cargo' => 'tecnico', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '50',]);
        Funcionario::create(['nombres' => 'Rosmery', 'apellidos' => 'Rico Mamni', 'ci' => 913412, 'cargo' => 'tecnico', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '51',]);
        Funcionario::create(['nombres' => 'fanny', 'apellidos' => 'Reyes Choque', 'ci' => 913413, 'cargo' => 'tecnico', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '52',]);
        Funcionario::create(['nombres' => 'silviua', 'apellidos' => 'Quispe Mamni', 'ci' => 913414, 'cargo' => 'secretario', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '53',]);
        Funcionario::create(['nombres' => 'Gary', 'apellidos' => 'Tarantino Mamni', 'ci' => 913415, 'cargo' => 'tecnico', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '54',]);
        Funcionario::create(['nombres' => 'Julio ', 'apellidos' => 'tarantino Hunc', 'ci' => 913416, 'cargo' => 'profesional', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '55',]);
        Funcionario::create(['nombres' => 'Carlos ', 'apellidos' => 'Reyes ', 'ci' => 913417, 'cargo' => 'secretario', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '56',]);
        Funcionario::create(['nombres' => 'Juan Marco', 'apellidos' => 'Yucra', 'ci' => 913418, 'cargo' => 'director', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '57',]);
        Funcionario::create(['nombres' => 'Cristal ', 'apellidos' => 'Loza paucara', 'ci' => 913419, 'cargo' => 'ingenierio', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '58',]);
        Funcionario::create(['nombres' => 'Cristel ', 'apellidos' => 'lazarte pinto', 'ci' => 913420, 'cargo' => 'secretario', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '59',]);
        Funcionario::create(['nombres' => 'Jovanna ', 'apellidos' => 'Calle Quispe', 'ci' => 913421, 'cargo' => 'profesional', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '60',]);
        Funcionario::create(['nombres' => 'Yohanna', 'apellidos' => 'Calle Mamani', 'ci' => 913422, 'cargo' => 'ingenierio', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '61',]);
        Funcionario::create(['nombres' => 'Pamela', 'apellidos' => 'caaviri Huanca', 'ci' => 913423, 'cargo' => 'profesional', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '62',]);
        Funcionario::create(['nombres' => 'Erika Carla', 'apellidos' => 'Arispe Rojas', 'ci' => 913424, 'cargo' => 'ingenierio', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '63',]);
        Funcionario::create(['nombres' => 'Alison', 'apellidos' => 'Flores Huayhua', 'ci' => 913425, 'cargo' => 'tecnico', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '64',]);
        Funcionario::create(['nombres' => 'Lucero Belen', 'apellidos' => 'Gomez Alaniz', 'ci' => 913426, 'cargo' => 'tecnico', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '65',]);
        Funcionario::create(['nombres' => 'Juan Pablo', 'apellidos' => 'Idelfonso', 'ci' => 913427, 'cargo' => 'profesional', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '66',]);
        Funcionario::create(['nombres' => 'Yerson ', 'apellidos' => 'Luis Oscamaita', 'ci' => 913428, 'cargo' => 'ingenierio', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '67',]);
        Funcionario::create(['nombres' => 'Juan Gabriel', 'apellidos' => 'Flores Ramos', 'ci' => 913429, 'cargo' => 'director', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '68',]);
        Funcionario::create(['nombres' => 'Ruben Leonardo ', 'apellidos' => 'Mamani', 'ci' => 913430, 'cargo' => 'secretario', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '69',]);
        Funcionario::create(['nombres' => 'Victor Juan', 'apellidos' => 'Sarniento', 'ci' => 913431, 'cargo' => 'tecnico', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '70',]);
        Funcionario::create(['nombres' => 'Richard ', 'apellidos' => 'Ibañez Parra', 'ci' => 913432, 'cargo' => 'tecnico', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '71',]);
        Funcionario::create(['nombres' => 'Gregorio ', 'apellidos' => 'Saavedra Flores', 'ci' => 913433, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '72',]);
        Funcionario::create(['nombres' => 'Gustabo ', 'apellidos' => 'Pinto Mamani', 'ci' => 913434, 'cargo' => 'secretario', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '73',]);
        Funcionario::create(['nombres' => 'Ruben Leonardo ', 'apellidos' => 'Manzaneda ', 'ci' => 913435, 'cargo' => 'tecnico', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '74',]);
        Funcionario::create(['nombres' => 'Esteban ', 'apellidos' => 'Paucara', 'ci' => 913436, 'cargo' => 'profesional', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '75',]);
        Funcionario::create(['nombres' => 'Agosto', 'apellidos' => 'Loza Pinto', 'ci' => 913437, 'cargo' => 'secretario', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '76',]);
        Funcionario::create(['nombres' => 'Faustino', 'apellidos' => 'Pinto Chopque', 'ci' => 913438, 'cargo' => 'director', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '77',]);
        Funcionario::create(['nombres' => 'Jhony ', 'apellidos' => 'Yugar Mamani', 'ci' => 913439, 'cargo' => 'ingenierio', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '78',]);
        Funcionario::create(['nombres' => 'Marta VIrginia ', 'apellidos' => 'Yanarico', 'ci' => 913440, 'cargo' => 'secretario', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '79',]);
        Funcionario::create(['nombres' => 'Margarita ', 'apellidos' => 'Huascar Huyanca', 'ci' => 913441, 'cargo' => 'profesional', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '80',]);
        Funcionario::create(['nombres' => 'Mary Lucre ', 'apellidos' => 'Huianca Clemente', 'ci' => 913442, 'cargo' => 'ingenierio', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '81',]);
        Funcionario::create(['nombres' => 'Franz ', 'apellidos' => 'Clemente Huallpa', 'ci' => 913443, 'cargo' => 'profesional', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '82',]);
        Funcionario::create(['nombres' => 'Yerson ', 'apellidos' => 'Gyr Huanca', 'ci' => 913444, 'cargo' => 'ingenierio', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '83',]);
        Funcionario::create(['nombres' => 'Octavio ', 'apellidos' => 'Yoson Yercos', 'ci' => 913445, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '84',]);
        Funcionario::create(['nombres' => 'Jorge ', 'apellidos' => 'Fernandez ', 'ci' => 913446, 'cargo' => 'tecnico', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '85',]);
        Funcionario::create(['nombres' => 'Sheyla Scarlett ', 'apellidos' => 'Folres ', 'ci' => 913447, 'cargo' => 'profesional', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '86',]);
        Funcionario::create(['nombres' => 'Gerardo Diego ', 'apellidos' => 'Ibaña Mamani', 'ci' => 913448, 'cargo' => 'ingenierio', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '87',]);
        Funcionario::create(['nombres' => 'Victor ', 'apellidos' => 'Parra sarniento', 'ci' => 913449, 'cargo' => 'director', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '88',]);
        Funcionario::create(['nombres' => 'Elizabeth', 'apellidos' => 'Saaverdra chpoque', 'ci' => 913450, 'cargo' => 'secretario', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '89',]);
        Funcionario::create(['nombres' => 'Arnold Ruben ', 'apellidos' => 'Choquehuanca Mamani', 'ci' => 913451, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '90',]);
        Funcionario::create(['nombres' => 'Maruja ', 'apellidos' => 'Guanca hismar ', 'ci' => 913452, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '91',]);
        Funcionario::create(['nombres' => 'Luis', 'apellidos' => 'paulinas ', 'ci' => 913453, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '92',]);
        Funcionario::create(['nombres' => 'Fernado dino', 'apellidos' => 'Cutili Parra', 'ci' => 913454, 'cargo' => 'secretario', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '93',]);
        Funcionario::create(['nombres' => 'Raul Gabriel', 'apellidos' => 'Cutili mamani', 'ci' => 913455, 'cargo' => 'tecnico', 'unidad_id' => 4, 'activo' => '1', 'user_id' => '94',]);
        Funcionario::create(['nombres' => 'Valdimir', 'apellidos' => 'Huyallhua ', 'ci' => 913456, 'cargo' => 'profesional', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '95',]);
        Funcionario::create(['nombres' => 'Ivana', 'apellidos' => 'Copa Mamani', 'ci' => 913457, 'cargo' => 'secretario', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '96',]);
        Funcionario::create(['nombres' => 'Belen', 'apellidos' => 'Folres Herbas', 'ci' => 913458, 'cargo' => 'director', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '97',]);
        Funcionario::create(['nombres' => 'Dan Cruz', 'apellidos' => 'Folres Pinto', 'ci' => 913459, 'cargo' => 'ingenierio', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '98',]);
        Funcionario::create(['nombres' => 'Cesar ', 'apellidos' => 'Atea', 'ci' => 913460, 'cargo' => 'secretario', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '99',]);
        Funcionario::create(['nombres' => 'kate', 'apellidos' => 'Tirado mamni', 'ci' => 913461, 'cargo' => 'profesional', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '100',]);
        Funcionario::create(['nombres' => 'Katerin', 'apellidos' => 'Rico Mamni', 'ci' => 913462, 'cargo' => 'ingenierio', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '101',]);
        Funcionario::create(['nombres' => 'Carla', 'apellidos' => 'Reyes Choque', 'ci' => 913463, 'cargo' => 'profesional', 'unidad_id' => 2, 'activo' => '1', 'user_id' => '102',]);
        Funcionario::create(['nombres' => 'Judith', 'apellidos' => 'Quispe Mamni', 'ci' => 913464, 'cargo' => 'ingenierio', 'unidad_id' => 3, 'activo' => '1', 'user_id' => '103',]);
    }
}
