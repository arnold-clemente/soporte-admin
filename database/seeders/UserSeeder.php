<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Adminstrador', 'usuario' => 'Adminstrador', 'password' => bcrypt('gobernacionLPZ'), 'email' => 'admin@admin.com', 'tipo' => 'tecnico',])->assignRole('administrador');
        User::create(['name' => 'Arnold Clemente', 'usuario' => 'Arnold', 'password' => bcrypt('12345678'), 'email' => 'arnol.clemente@gmail.com', 'tipo' => 'tecnico',])->assignRole('administrador');
        User::create(['name' => 'Cristina Lili Rivera Llanos', 'usuario' => 'RCristina_1002123', 'password' => bcrypt('1002123'), 'email' => 'rcristina2@gmail.com', 'tipo' => 'tecnico',])->assignRole('administrador');
        User::create(['name' => 'Gregorio  Mamani Cutili', 'usuario' => 'MGregorio_913365', 'password' => bcrypt('913365'), 'email' => 'mgregorio1@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Gustabo  Mamani Parraga', 'usuario' => 'MGustabo_913366', 'password' => bcrypt('913366'), 'email' => 'mgustabo2@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Ruben Leonardo  Aruquipa Quispe Limachi', 'usuario' => 'ARuben_913367', 'password' => bcrypt('913367'), 'email' => 'aruben3@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Esteban  Mamani Quispe', 'usuario' => 'MEsteban_913368', 'password' => bcrypt('913368'), 'email' => 'mesteban4@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Julio  Cesar Blanco', 'usuario' => 'CJulio_913369', 'password' => bcrypt('913369'), 'email' => 'cjulio5@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Faustino Mendoza', 'usuario' => 'MFaustino_913370', 'password' => bcrypt('913370'), 'email' => 'mfaustino6@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Jhony  Alarcon Fernandez', 'usuario' => 'AJhony_913371', 'password' => bcrypt('913371'), 'email' => 'ajhony7@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Marta VIrginia  Choque Mamani', 'usuario' => 'CMarta_913372', 'password' => bcrypt('913372'), 'email' => 'cmarta8@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Margarita  Catari Alanoca', 'usuario' => 'CMargarita_913373', 'password' => bcrypt('913373'), 'email' => 'cmargarita9@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Mary Lucre  Arispe Rojas', 'usuario' => 'AMary_913374', 'password' => bcrypt('913374'), 'email' => 'amary10@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Franz  Flores Huayhua', 'usuario' => 'FFranz_913375', 'password' => bcrypt('913375'), 'email' => 'ffranz11@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Yerson  Gomez Alaniz', 'usuario' => 'GYerson_913376', 'password' => bcrypt('913376'), 'email' => 'gyerson12@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Octavio  Idelfonso', 'usuario' => 'IOctavio_913377', 'password' => bcrypt('913377'), 'email' => 'ioctavio13@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Jorge  Luis Oscamaita', 'usuario' => 'LJorge_913378', 'password' => bcrypt('913378'), 'email' => 'ljorge14@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Sheyla Scarlett  Flores Ramos', 'usuario' => 'FSheyla_913379', 'password' => bcrypt('913379'), 'email' => 'fsheyla15@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Gerardo Diego  Mamani', 'usuario' => 'MGerardo_913380', 'password' => bcrypt('913380'), 'email' => 'mgerardo16@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Victor  Sarniento', 'usuario' => 'SVictor_913381', 'password' => bcrypt('913381'), 'email' => 'svictor17@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Elizabeth Ibañez Parra', 'usuario' => 'IElizabeth_913382', 'password' => bcrypt('913382'), 'email' => 'ielizabeth18@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Arnold Ruben  Saavedra Flores', 'usuario' => 'SArnold_913383', 'password' => bcrypt('913383'), 'email' => 'sarnold19@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Maruja  Pinto Mamani', 'usuario' => 'PMaruja_913384', 'password' => bcrypt('913384'), 'email' => 'pmaruja20@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Luis Manzaneda ', 'usuario' => 'MLuis_913385', 'password' => bcrypt('913385'), 'email' => 'mluis21@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Fernado dino Paucara', 'usuario' => 'PFernado_913386', 'password' => bcrypt('913386'), 'email' => 'pfernado22@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Raul Gabriel Loza Pinto', 'usuario' => 'LRaul_913387', 'password' => bcrypt('913387'), 'email' => 'lraul23@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Valdimir Pinto Chopque', 'usuario' => 'PValdimir_913388', 'password' => bcrypt('913388'), 'email' => 'pvaldimir24@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Ivana Yugar Mamani', 'usuario' => 'YIvana_913389', 'password' => bcrypt('913389'), 'email' => 'yivana25@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Belen Yanarico', 'usuario' => 'YBelen_913390', 'password' => bcrypt('913390'), 'email' => 'ybelen26@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Dan Cruz Huascar Huyanca', 'usuario' => 'HDan_913391', 'password' => bcrypt('913391'), 'email' => 'hdan27@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Cesar  Huianca Clemente', 'usuario' => 'HCesar_913392', 'password' => bcrypt('913392'), 'email' => 'hcesar28@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'kate Clemente Huallpa', 'usuario' => 'Ckate_913393', 'password' => bcrypt('913393'), 'email' => 'ckate29@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Katerin Gyr Huanca', 'usuario' => 'GKaterin_913394', 'password' => bcrypt('913394'), 'email' => 'gkaterin30@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Carla Yoson Yercos', 'usuario' => 'YCarla_913395', 'password' => bcrypt('913395'), 'email' => 'ycarla31@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Judith Fernandez ', 'usuario' => 'FJudith_913396', 'password' => bcrypt('913396'), 'email' => 'fjudith32@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Ruth Folres ', 'usuario' => 'FRuth_913397', 'password' => bcrypt('913397'), 'email' => 'fruth33@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Lili Ibaña Mamani', 'usuario' => 'ILili_913398', 'password' => bcrypt('913398'), 'email' => 'ilili34@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Ydira Parra sarniento', 'usuario' => 'PYdira_913399', 'password' => bcrypt('913399'), 'email' => 'pydira35@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Naira Saaverdra chpoque', 'usuario' => 'SNaira_913400', 'password' => bcrypt('913400'), 'email' => 'snaira36@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Maira Choquehuanca Mamani', 'usuario' => 'CMaira_913401', 'password' => bcrypt('913401'), 'email' => 'cmaira37@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Angeliza Guanca hismar ', 'usuario' => 'GAngeliza_913402', 'password' => bcrypt('913402'), 'email' => 'gangeliza38@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Angie paulinas ', 'usuario' => 'pAngie_913403', 'password' => bcrypt('913403'), 'email' => 'pangie39@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Mabel Cutili Parra', 'usuario' => 'CMabel_913404', 'password' => bcrypt('913404'), 'email' => 'cmabel40@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Mariana Cutili mamani', 'usuario' => 'CMariana_913405', 'password' => bcrypt('913405'), 'email' => 'cmariana41@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Marcos Huyallhua ', 'usuario' => 'HMarcos_913406', 'password' => bcrypt('913406'), 'email' => 'hmarcos42@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Jennife Copa Mamani', 'usuario' => 'CJennife_913407', 'password' => bcrypt('913407'), 'email' => 'cjennife43@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Carolina  Folres Herbas', 'usuario' => 'FCarolina_913408', 'password' => bcrypt('913408'), 'email' => 'fcarolina44@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Catherine Folres Pinto', 'usuario' => 'FCatherine_913409', 'password' => bcrypt('913409'), 'email' => 'fcatherine45@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Carmen Atea', 'usuario' => 'ACarmen_913410', 'password' => bcrypt('913410'), 'email' => 'acarmen46@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Roda Tirado mamni', 'usuario' => 'TRoda_913411', 'password' => bcrypt('913411'), 'email' => 'troda47@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Rosmery Rico Mamni', 'usuario' => 'RRosmery_913412', 'password' => bcrypt('913412'), 'email' => 'rrosmery48@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'fanny Reyes Choque', 'usuario' => 'Rfanny_913413', 'password' => bcrypt('913413'), 'email' => 'rfanny49@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'silviua Quispe Mamni', 'usuario' => 'Qsilviua_913414', 'password' => bcrypt('913414'), 'email' => 'qsilviua50@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Gary Tarantino Mamni', 'usuario' => 'TGary_913415', 'password' => bcrypt('913415'), 'email' => 'tgary51@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Julio  tarantino Hunc', 'usuario' => 'tJulio_913416', 'password' => bcrypt('913416'), 'email' => 'tjulio52@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Carlos  Reyes ', 'usuario' => 'RCarlos_913417', 'password' => bcrypt('913417'), 'email' => 'rcarlos53@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Juan Marco Yucra', 'usuario' => 'YJuan_913418', 'password' => bcrypt('913418'), 'email' => 'yjuan54@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Cristal  Loza paucara', 'usuario' => 'LCristal_913419', 'password' => bcrypt('913419'), 'email' => 'lcristal55@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Cristel  lazarte pinto', 'usuario' => 'lCristel_913420', 'password' => bcrypt('913420'), 'email' => 'lcristel56@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Jovanna  Calle Quispe', 'usuario' => 'CJovanna_913421', 'password' => bcrypt('913421'), 'email' => 'cjovanna57@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Yohanna Calle Mamani', 'usuario' => 'CYohanna_913422', 'password' => bcrypt('913422'), 'email' => 'cyohanna58@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Pamela caaviri Huanca', 'usuario' => 'cPamela_913423', 'password' => bcrypt('913423'), 'email' => 'cpamela59@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Erika Carla Arispe Rojas', 'usuario' => 'AErika_913424', 'password' => bcrypt('913424'), 'email' => 'aerika60@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Alison Flores Huayhua', 'usuario' => 'FAlison_913425', 'password' => bcrypt('913425'), 'email' => 'falison61@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Lucero Belen Gomez Alaniz', 'usuario' => 'GLucero_913426', 'password' => bcrypt('913426'), 'email' => 'glucero62@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Juan Pablo Idelfonso', 'usuario' => 'IJuan_913427', 'password' => bcrypt('913427'), 'email' => 'ijuan63@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Yerson  Luis Oscamaita', 'usuario' => 'LYerson_913428', 'password' => bcrypt('913428'), 'email' => 'lyerson64@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Juan Gabriel Flores Ramos', 'usuario' => 'FJuan_913429', 'password' => bcrypt('913429'), 'email' => 'fjuan65@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Ruben Leonardo  Mamani', 'usuario' => 'MRuben_913430', 'password' => bcrypt('913430'), 'email' => 'mruben66@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Victor Juan Sarniento', 'usuario' => 'SVictor_913431', 'password' => bcrypt('913431'), 'email' => 'svictor67@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Richard  Ibañez Parra', 'usuario' => 'IRichard_913432', 'password' => bcrypt('913432'), 'email' => 'irichard68@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Gregorio  Saavedra Flores', 'usuario' => 'SGregorio_913433', 'password' => bcrypt('913433'), 'email' => 'sgregorio69@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Gustabo  Pinto Mamani', 'usuario' => 'PGustabo_913434', 'password' => bcrypt('913434'), 'email' => 'pgustabo70@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Ruben Leonardo  Manzaneda ', 'usuario' => 'MRuben_913435', 'password' => bcrypt('913435'), 'email' => 'mruben71@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Esteban  Paucara', 'usuario' => 'PEsteban_913436', 'password' => bcrypt('913436'), 'email' => 'pesteban72@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Agosto Loza Pinto', 'usuario' => 'LAgosto_913437', 'password' => bcrypt('913437'), 'email' => 'lagosto73@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Faustino Pinto Chopque', 'usuario' => 'PFaustino_913438', 'password' => bcrypt('913438'), 'email' => 'pfaustino74@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Jhony  Yugar Mamani', 'usuario' => 'YJhony_913439', 'password' => bcrypt('913439'), 'email' => 'yjhony75@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Marta VIrginia  Yanarico', 'usuario' => 'YMarta_913440', 'password' => bcrypt('913440'), 'email' => 'ymarta76@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Margarita  Huascar Huyanca', 'usuario' => 'HMargarita_913441', 'password' => bcrypt('913441'), 'email' => 'hmargarita77@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Mary Lucre  Huianca Clemente', 'usuario' => 'HMary_913442', 'password' => bcrypt('913442'), 'email' => 'hmary78@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Franz  Clemente Huallpa', 'usuario' => 'CFranz_913443', 'password' => bcrypt('913443'), 'email' => 'cfranz79@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Yerson  Gyr Huanca', 'usuario' => 'GYerson_913444', 'password' => bcrypt('913444'), 'email' => 'gyerson80@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Octavio  Yoson Yercos', 'usuario' => 'YOctavio_913445', 'password' => bcrypt('913445'), 'email' => 'yoctavio81@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Jorge  Fernandez ', 'usuario' => 'FJorge_913446', 'password' => bcrypt('913446'), 'email' => 'fjorge82@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Sheyla Scarlett  Folres ', 'usuario' => 'FSheyla_913447', 'password' => bcrypt('913447'), 'email' => 'fsheyla83@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Gerardo Diego  Ibaña Mamani', 'usuario' => 'IGerardo_913448', 'password' => bcrypt('913448'), 'email' => 'igerardo84@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Victor  Parra sarniento', 'usuario' => 'PVictor_913449', 'password' => bcrypt('913449'), 'email' => 'pvictor85@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Elizabeth Saaverdra chpoque', 'usuario' => 'SElizabeth_913450', 'password' => bcrypt('913450'), 'email' => 'selizabeth86@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Arnold Ruben  Choquehuanca Mamani', 'usuario' => 'CArnold_913451', 'password' => bcrypt('913451'), 'email' => 'carnold87@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Maruja  Guanca hismar ', 'usuario' => 'GMaruja_913452', 'password' => bcrypt('913452'), 'email' => 'gmaruja88@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Luis paulinas ', 'usuario' => 'pLuis_913453', 'password' => bcrypt('913453'), 'email' => 'pluis89@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Fernado dino Cutili Parra', 'usuario' => 'CFernado_913454', 'password' => bcrypt('913454'), 'email' => 'cfernado90@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Raul Gabriel Cutili mamani', 'usuario' => 'CRaul_913455', 'password' => bcrypt('913455'), 'email' => 'craul91@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Valdimir Huyallhua ', 'usuario' => 'HValdimir_913456', 'password' => bcrypt('913456'), 'email' => 'hvaldimir92@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Ivana Copa Mamani', 'usuario' => 'CIvana_913457', 'password' => bcrypt('913457'), 'email' => 'civana93@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Belen Folres Herbas', 'usuario' => 'FBelen_913458', 'password' => bcrypt('913458'), 'email' => 'fbelen94@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Dan Cruz Folres Pinto', 'usuario' => 'FDan_913459', 'password' => bcrypt('913459'), 'email' => 'fdan95@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Cesar  Atea', 'usuario' => 'ACesar_913460', 'password' => bcrypt('913460'), 'email' => 'acesar96@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'kate Tirado mamni', 'usuario' => 'Tkate_913461', 'password' => bcrypt('913461'), 'email' => 'tkate97@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Katerin Rico Mamni', 'usuario' => 'RKaterin_913462', 'password' => bcrypt('913462'), 'email' => 'rkaterin98@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Carla Reyes Choque', 'usuario' => 'RCarla_913463', 'password' => bcrypt('913463'), 'email' => 'rcarla99@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
        User::create(['name' => 'Judith Quispe Mamni', 'usuario' => 'QJudith_913464', 'password' => bcrypt('913464'), 'email' => 'qjudith100@gmail.com', 'tipo' => 'funcionario',])->assignRole('administrador');
    }
}
