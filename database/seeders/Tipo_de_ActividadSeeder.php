<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class Tipo_de_ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [

            [ 'codigo' => 01110,'descripcion' => 'CULTIVOS DE CEREALES'],
            [ 'codigo' => 01123,'descripcion' => 'CULTIVO DE HORTALIZAS Y LEGUMBRES'],
            [ 'codigo' => 01136,'descripcion' => 'CULTIVO DE FRUTAS'],
            [ 'codigo' => 01211,'descripcion' => 'CRIA DE GANADO'],
            [ 'codigo' => 01224,'descripcion' => 'CRIA DE ANIMALES DOMESTICOS'],
            [ 'codigo' => 01300,'descripcion' => 'EXPLOTACION MIXTA'],
            [ 'codigo' => 01400,'descripcion' => 'SERVICIOS AGRICOLAS, GANADERAS'],
            [ 'codigo' => 01501,'descripcion' => 'CAZA ORDINARIA Y SERVICIOS CONEXOS'],
            [ 'codigo' => 02003,'descripcion' => 'SILVICULTURA Y EXT. DE MADERA'],
            [ 'codigo' => 05002,'descripcion' => 'PESCA, EXPLOT. CRIADEROS DE PECES'],
            [ 'codigo' => 10100,'descripcion' => 'EXTRAC. Y  AGLOMERAC. CARBON DE PIEDRA'],
            [ 'codigo' => 10200,'descripcion' => 'EXTRAC. Y AGLOMERAC. LIGNITO'],
            [ 'codigo' => 10301,'descripcion' => 'EXTRAC. Y AGLOMERAC. DE TURBA'],
            [ 'codigo' => 11106,'descripcion' => 'EXT. PETROLEO CRUDO Y GAS NATURAL'],
            [ 'codigo' => 11207,'descripcion' => 'SERV. PETROLEROS Y DE GAS'],
            [ 'codigo' => 12001,'descripcion' => 'EXT. DE MIN. URANIO Y TORIO'],
            [ 'codigo' => 13109,'descripcion' => 'EXT. DE MIN. DE HIERRO'],
            [ 'codigo' => 13200,'descripcion' => 'EXT. DE MIN. METALIFEROS NO FERROSOS'],
            [ 'codigo' => 14105,'descripcion' => 'EXT. DE PIEDRA, ARENA Y ARCILLA'],
            [ 'codigo' => 14219,'descripcion' => 'EXT. MIN FABRIC. ABONO Y PROD. QUIMIC'],
            [ 'codigo' => 14221,'descripcion' => 'EXTRACCION DE SAL'],
            [ 'codigo' => 14290,'descripcion' => 'EXP. OTRAS MINAS Y CANTERAS NIA'],
            [ 'codigo' => 15114,'descripcion' => 'PRODUC. CARNE Y PROD. CARNICOS'],
            [ 'codigo' => 15127,'descripcion' => 'ELAB. Y CONS DE PESCADO'],
            [ 'codigo' => 15130,'descripcion' => 'ELAB. FRUTAS, LEG. Y HORTALIZAS'],
            [ 'codigo' => 15142,'descripcion' => 'ELAB. DE ACEITE Y GRASAS'],
            [ 'codigo' => 15202,'descripcion' => 'ELAB DE PRODUCTOS LACTEOS'],
            [ 'codigo' => 15316,'descripcion' => 'ELAB. DE PRODUCTOS DE MOLINERIA'],
            [ 'codigo' => 15329,'descripcion' => 'ELAB DE ALMIDONES Y DERIVADOS'],
            [ 'codigo' => 15331,'descripcion' => 'ELAB. DE PIENSOS PREPARADOS'],
            [ 'codigo' => 15417,'descripcion' => 'ELAB. PROD. DE PANADERIA'],
            [ 'codigo' => 15420,'descripcion' => 'ELAB. DE AZUCAR'],
            [ 'codigo' => 15432,'descripcion' => 'ELAB. CACAO, CHOCOLATE Y CONFIT'],
            [ 'codigo' => 15445,'descripcion' => 'ELAB. MACARRONES, FIDEOS Y OTROS'],
            [ 'codigo' => 15499,'descripcion' => 'ELAB DE OTROS PROD. ALIMENTICIOS'],
            [ 'codigo' => 15518,'descripcion' => 'MEZCLA DE BEBIDAS ALCOHOLICAS'],
            [ 'codigo' => 15520,'descripcion' => 'ELAB. DE VINOS'],
            ['codigo' => 15533, 'descripcion' => 'ELAB. DE BEBIDAS MALTEADAS.'],
            ['codigo' => 15546, 'descripcion' => 'ELAB. DE BEBIDAS NO ALCOHOLICAS.'],
            ['codigo' => 16007, 'descripcion' => 'ELAB. DE PRODUCTOS DE TABACO.'],
            ['codigo' => 17117, 'descripcion' => 'PREP Y TEJ DE FIBRAS TEXTILES.'],
            ['codigo' => 17120, 'descripcion' => 'ACABADO DE PROD. TEXTILES.'],
            ['codigo' => 17218, 'descripcion' => 'FAB. ART. CONFECCIONADOS.'],
            ['codigo' => 17220, 'descripcion' => 'FAB. DE TAPICES Y ALFOMBRAS.'],
            ['codigo' => 17233, 'descripcion' => 'FAB. CUERDAS, CORDELES Y REDES.'],
            ['codigo' => 17290, 'descripcion' => 'FAB. OTROS PROD. TEXTILES NEOP.'],
            ['codigo' => 17306, 'descripcion' => 'FAB. TEJIDOS Y ART DE PUNTO.'],
            ['codigo' => 18100, 'descripcion' => 'FAB. DE PRENDAS DE VESTIR.'],
            ['codigo' => 18201, 'descripcion' => 'FAB. DE ARTICULOS DE PIEL.'],
            ['codigo' => 19110, 'descripcion' => 'CURTIDO Y ADOBO DE CUEROS.'],
            ['codigo' => 19122, 'descripcion' => 'FAB. DE MALETAS Y OTROS.'],
            ['codigo' => 19208, 'descripcion' => 'FAB. DE CALZADO.'],
            ['codigo' => 20108, 'descripcion' => 'ASERRADO Y ACEPILLADURA MADERA.'],
            ['codigo' => 20211, 'descripcion' => 'FAB. DE HOJAS DE MADERA.'],
            ['codigo' => 20224, 'descripcion' => 'FAB. PARTES Y PIEZAS CARPINTERIA.'],
            ['codigo' => 20237, 'descripcion' => 'FAB. RECIPIENTES DE MADERA.'],
            ['codigo' => 20293, 'descripcion' => 'FAB. OTROS PRODUCTOS DE MADERA.'],
            ['codigo' => 21016, 'descripcion' => 'FAB. DE PAPEL Y CARTON.'],
            ['codigo' => 21029, 'descripcion' => 'FAB. ENVASES DE PAPEL Y CARTON.'],
            ['codigo' => 21098, 'descripcion' => 'FAB. DE OTROS ARTICULOS.'],
            ['codigo' => 22113, 'descripcion' => 'ED. LIBROS, FOLLETOS Y OTROS.'],
            ['codigo' => 22126, 'descripcion' => 'ED. DE PERIODICOS Y REVISTAS.'],
            ['codigo' => 22139, 'descripcion' => 'ED. DE MATERIALES GRABADOS.'],
            ['codigo' => 22195, 'descripcion' => 'OTROS TRABAJOS DE EDICION.'],
            ['codigo' => 22214, 'descripcion' => 'ACTIVIDADES DE IMPRESION.'],
            ['codigo' => 22227, 'descripcion' => 'SERVICIOS RDOS CON IMPRESION.'],
            ['codigo' => 22302, 'descripcion' => 'REPRODUCCION MATERIALES GRAB.'],
            ['codigo' => 23107, 'descripcion' => 'FAB. PROD. DE HORNOS DE COQUE.'],
            ['codigo' => 23208, 'descripcion' => 'FAB. PROD. REFINACION DEL PETROLEO.'],
            ['codigo' => 23309, 'descripcion' => 'ELAB. DE COMBUSTIBLES NUCLEAR.'],
            ['codigo' => 24116, 'descripcion' => 'FAB. DE SUSTANCIAS QUIMICAS BASICAS.'],
            ['codigo' => 24129, 'descripcion' => 'FAB. ABONO Y COMP. DE NITROGENO.'],
            ['codigo' => 24131, 'descripcion' => 'FAB. DE PLASTICOS Y DE CAUCHO.'],
            ['codigo' => 24217, 'descripcion' => 'FAB. DE PLAGUICIDAS Y OTROS PROD. QUIM.'],
            ['codigo' => 24220, 'descripcion' => 'FAB. DE PINTURAS Y BARNICES.'],
            ['codigo' => 24232, 'descripcion' => 'FAB. DE PROD. FARMACEUTICOS.'],
            ['codigo' => 24245, 'descripcion' => 'FAB. JABONES Y DETERGENTES.'],
            ['codigo' => 24299, 'descripcion' => 'FAB. DE OTROS PROD. QUIMICOS NEOP.'],
            ['codigo' => 24305, 'descripcion' => 'FAB. DE FIBRAS SINTETICAS O ARTIFIC.'],
            ['codigo' => 25112, 'descripcion' => 'FAB. DE CUBIERTOS DE CAUCHO.'],
            ['codigo' => 25194, 'descripcion' => 'FAB. OTROS PRODUCTOS DE CAUCHO.'],
            ['codigo' => 25200, 'descripcion' => 'FAB. DE PRODUCTOS DE PLASTICOS.'],
            ['codigo' => 26106, 'descripcion' => 'FAB. VIDRIO Y PROD. DE VIDRIO.'],
            ['codigo' => 26916, 'descripcion' => 'FAB. PROD. CERAMICA NO REFRACT. N. EST.'],
            ['codigo' => 26929, 'descripcion' => 'FAB. PROD. CERAMICA REFACTARIA.'],
            ['codigo' => 26931, 'descripcion' => 'FAB. PROD. CERAMICA NO REFRACT. EST.'],
            ['codigo' => 26944, 'descripcion' => 'FAB. DE CEMENTO, CAL Y YESO.'],
            ['codigo' => 26957, 'descripcion' => 'FAB. ART. DE HORMIGON, CEMENTO Y YESO.'],
            ['codigo' => 26960, 'descripcion' => 'CORTE, TALLADO Y ACABADO DE PIEDRA.'],
            ['codigo' => 26998, 'descripcion' => 'FAB. OTROS PROD. MIN. NO METALIC. NCP.'],
            ['codigo' => 27102, 'descripcion' => 'FAB. PRODUCTOS DE HIERRO Y ACERO.'],
            ['codigo' => 27203, 'descripcion' => 'FAB. PRODUCTOS DE MET. PRECIOSOS.'],
            ['codigo' => 27317, 'descripcion' => 'FUNDICION DE HIERRO Y DE ACERO.'],
            ['codigo' => 27320, 'descripcion' => 'FUNDICION DE METALES NO FERROSOS.'],
            ['codigo' => 28111, 'descripcion' => 'FAB. PROD. METAL. USO ESTRUCTURAL.'],
            ['codigo' => 28124, 'descripcion' => 'FAB. TANQUES, DEPOSITOS Y RECIP. METAL.'],
            ['codigo' => 28137, 'descripcion' => 'FAB. DE GENERADORES DE VAPOR.'],
            ['codigo' => 28919, 'descripcion' => 'FAB. PROD. MET. ACABADOS O SEMIACABAD.'],
            ['codigo' => 28921, 'descripcion' => 'OBRAS DE INGENIERIA MECANICA.'],
            ['codigo' => 28934, 'descripcion' => 'FAB. ART. CUCHILLERIA, FERRETERIA.'],
            ['codigo' => 28990, 'descripcion' => 'FAB. OTROS PROD. DE METAL NCP.'],
            ['codigo' => 29118, 'descripcion' => 'FAB. DE MOTORES Y TURBINAS.'],
            ['codigo' => 29120, 'descripcion' => 'FAB. DE BOMBAS, COMPRESORAS, GRIFOS.'],
            ['codigo' => 29133, 'descripcion' => 'FAB. COJINETES Y ENGRANAJES.'],
            ['codigo' => 29146, 'descripcion' => 'FAB. HORNOS, HOGUERAS, QUEMADORES.'],
            ['codigo' => 29159, 'descripcion' => 'FAB. EQUIP. ELEVACION Y MANIPULACION.'],
            ['codigo' => 29190, 'descripcion' => 'FAB. OTRO TIPO MAQUINARIA USO GRAL.'],
            ['codigo' => 29219, 'descripcion' => 'FAB. DE MAQUINARIA AGROPECUARIA.'],
            ['codigo' => 29221, 'descripcion' => 'FAB. DE MAQUINAS HERRAMIENTA.'],
            ['codigo' => 29234, 'descripcion' => 'FAB. DE MAQUINARIA METALURGICA.'],
            ['codigo' => 29247, 'descripcion' => 'FAB. MAQUIN MINERA Y OBRAS DE CONST.'],
            ['codigo' => 29250, 'descripcion' => 'FAB. MAQUIN. ELAB. ALIMENTOS, BEBIDAS.'],
            ['codigo' => 29262, 'descripcion' => 'FAB. MAQUINARIA ELAB. TEXTILES.'],
            ['codigo' => 29275, 'descripcion' => 'FAB. DE ARMAS Y MUNICIONES.'],
            ['codigo' => 29290, 'descripcion' => 'FAB. OTRO TIPO MAQUIN. USO ESPECIAL.'],
            ['codigo' => 29307, 'descripcion' => 'FAB. APARATOS DE USO DOMESTICO NCP.'],
            ['codigo' => 30005, 'descripcion' => 'FAB. MAQUINARIA DE OFICINA.'],
            ['codigo' => 31102, 'descripcion' => 'FAB. MOTORES, GENERADORES ELECTRICOS.'],
            ['codigo' => 31203, 'descripcion' => 'FAB. DE APARATOS DE DISTRIBUCION.'],
            ['codigo' => 31304, 'descripcion' => 'FAB. DE HILOS Y CABLES AISLADOS.'],
            ['codigo' => 31405, 'descripcion' => 'FAB. DE ACUMULADORES Y BATERIAS.'],
            ['codigo' => 31506, 'descripcion' => 'FAB. DE LAMPARAS ELECTRICAS.'],
            ['codigo' => 31900, 'descripcion' => 'FAB. OTRO TIPO EQUIPO ELECTRICO NCP.'],
            ['codigo' => 32109, 'descripcion' => 'FAB. TUBOS Y VALVULAS ELECTRONICOS.'],
            ['codigo' => 32200, 'descripcion' => 'FAB. TRANSMISORES DE RADIO Y TV.'],
            ['codigo' => 32300, 'descripcion' => 'FAB. RECEPTORES DE RADIO Y TV.'],
            ['codigo' => 33118, 'descripcion' => 'FAB. EQUIPO MEDICO Y QUIRURGICO.'],
            ['codigo' => 33120, 'descripcion' => 'FAB. INSTRUMENTOS DE MEDICION.'],
            ['codigo' => 33133, 'descripcion' => 'FAB. EQUIPO CONTROL DE PROCESOS IND.'],
            ['codigo' => 33206, 'descripcion' => 'FAB. INSTRUMENTOS OPTICOS.'],
            ['codigo' => 33307, 'descripcion' => 'FAB. DE RELOJES.'],
            ['codigo' => 34101, 'descripcion' => 'FAB. VEHICULOS AUTOMOTORES.'],
            ['codigo' => 34202, 'descripcion' => 'FAB. CARROCERIAS PARA VEHICULOS.'],
            ['codigo' => 34303, 'descripcion' => 'FAB. PARTES, PIEZAS Y ACCESORIOS.'],
            ['codigo' => 35110, 'descripcion' => 'CONSTRUCCION Y REPARACION DE BUQUES.'],
            ['codigo' => 35123, 'descripcion' => 'CONSTRUC. Y REPARAC. DE EMBARCACIONES.'],
            ['codigo' => 35209, 'descripcion' => 'FAB. LOCOMOTORAS Y MATERIAL RODANTE.'],
            ['codigo' => 35300, 'descripcion' => 'FAB. AERONAVES Y NAVES ESPACIALES.'],
            ['codigo' => 35918, 'descripcion' => 'FAB. DE MOTOCICLETAS.'],
            ['codigo' => 35920, 'descripcion' => 'FAB. BICICLETAS Y SILLONES DE RUEDAS.'],
            ['codigo' => 35990, 'descripcion' => 'FAB. OTROS EQUIPOS DE TRANSPORTE NCP.'],
            ['codigo' => 36104, 'descripcion' => 'FAB. DE MUEBLES.'],
            ['codigo' => 36914, 'descripcion' => 'FAB. JOYAS Y ARTICULOS CONEXOS.'],
            ['codigo' => 36927, 'descripcion' => 'FAB. INSTRUMENTOS MUSICALES.'],
            ['codigo' => 36930, 'descripcion' => 'FAB. ARTICULOS DEPORTIVOS.'],
            ['codigo' => 36942, 'descripcion' => 'FAB. DE JUEGOS Y JUGUETES.'],
            ['codigo' => 36996, 'descripcion' => 'OTRAS INDUSTRIAS MANUFACTURERAS NCP.'],
            ['codigo' => 37100, 'descripcion' => 'RECICLAMIENTO DESPERDICIOS METALIC.'],
            ['codigo' => 37201, 'descripcion' => 'RECICLAMIENTO DESPERDICIOS NO METAL.'],
            ['codigo' => 40104, 'descripcion' => 'GENERACION Y DIST. ENERGIA ELECTRICA.'],
            ['codigo' => 40205, 'descripcion' => 'FAB. DE GAS, DISTRIBUCION COMBUSTIBLE.'],
            ['codigo' => 40306, 'descripcion' => 'SUMINISTRO DE VAPOR Y AGUA CALIENTE.'],
            ['codigo' => 41000, 'descripcion' => 'CAPTACION, DEPURACION Y DIST. DE AGUA'],
            ['codigo' => 45106, 'descripcion' => 'PREPARACION DEL TERRENO.'],
            ['codigo' => 45207, 'descripcion' => 'CONSTRUCCION EDIFICIOS COMPLETOS.'],
            ['codigo' => 45308, 'descripcion' => 'ACONDICIONAMINTO DE EDIFICIOS.'],
            ['codigo' => 45409, 'descripcion' => 'TERMINACION DE EDIFICIOS.'],
            ['codigo' => 45500, 'descripcion' => 'ALQUILER DE CONSTRUCCION.'],
            ['codigo' => 50102, 'descripcion' => 'VENTA DE VEHICULOS AUTOMOTORES.'],
            ['codigo' => 50203, 'descripcion' => 'MANTENIMIENTO Y REPARAC. VEHICULOS.'],
            ['codigo' => 50304, 'descripcion' => 'VENTA PARTES, PIEZAS, ACCESORIOS.'],
            ['codigo' => 50405, 'descripcion' => 'VENTA, MANTEN. Y REPARAC. MOTOCICLETAS.'],
            ['codigo' => 50506, 'descripcion' => 'VENTA AL POR MENOR COMBUSTIBLES.'],
            ['codigo' => 51109, 'descripcion' => 'VTA. MAY. A CAMBIO DE UNA RETRIBUCION.'],
            ['codigo' => 51212, 'descripcion' => 'VTA. MAY. DE MATERIAS PRIMAS AGROPEC.'],
            ['codigo' => 51225, 'descripcion' => 'VTA. MAY. ALIMENTOS, BEBIDAS Y TABACO.'],
            ['codigo' => 51313, 'descripcion' => 'VTA. MAY. PRODUCTOS TEXTILES.'],
            ['codigo' => 51395, 'descripcion' => 'VTA. MAY. OTROS ENSERES DOMESTICOS.'],
            ['codigo' => 51414, 'descripcion' => 'VTA. AL POR MAYOR DE COMBUSTIBLES.'],
            ['codigo' => 51427, 'descripcion' => 'VTA. MAY. DE METALES Y MINERALES MET.'],
            ['codigo' => 51430, 'descripcion' => 'VTA. MAY. MATERIALES DE CONSTRUCCION.'],
            ['codigo' => 51496, 'descripcion' => 'VTA. MAY. OTROS PRODUCTOS INTERMEDIOS.'],
            ['codigo' => 51502, 'descripcion' => 'VTA. MAY. MAQUINARIA, EQUIPO Y MATER.'],
            ['codigo' => 51906, 'descripcion' => 'VTA. MAY. DE OTROS PRODUCTOS.'],
            ['codigo' => 52118, 'descripcion' => 'VTA. MIN. EN ALMACENES NO ESPECIALIZ.'],
['codigo' => 52190, 'descripcion' => 'VTA. MIN. OTROS PRODUCTOS EN ALMACEN.'],
['codigo' => 52206, 'descripcion' => 'VTA. MIN. ALIMENTOS, BEBIDAS, TABACO.'],
['codigo' => 52310, 'descripcion' => 'VTA. MIN. PROD. FARMAC. Y ART. TOCADOR.'],
['codigo' => 52322, 'descripcion' => 'VTA. MIN. PRODUCTOS TEXTILES, CALZADO.'],
['codigo' => 52335, 'descripcion' => 'VTA. MIN. EQUIPO DE USO DOMESTICO.'],
['codigo' => 52348, 'descripcion' => 'VTA. MIN. ARTICULOS DE FERRETERIA.'],
['codigo' => 52391, 'descripcion' => 'OTROS TIPOS DE VENTA AL POR MENOR.'],
['codigo' => 52408, 'descripcion' => 'VTA. MIN. DE ALMACENES DE ART. USADOS.'],
['codigo' => 52511, 'descripcion' => 'VTA. MIN. DE CASAS DE VENTA POR CORREO.'],
['codigo' => 52524, 'descripcion' => 'VTA. MIN. EN PUESTOS DE VENTA.'],
['codigo' => 52593, 'descripcion' => 'OTROS TIPOS DE VENTA POR MENOR.'],
['codigo' => 52600, 'descripcion' => 'REPARACION DE EFECTOS PERSONALES.'],
['codigo' => 55104, 'descripcion' => 'HOTELES, CAMPAMENTOS Y OTROS.'],
['codigo' => 55205, 'descripcion' => 'RESTAURANTES, BARES Y CANTINAS.'],
['codigo' => 60100, 'descripcion' => 'TRANSPORTE POR VIA FERREA.'],
['codigo' => 60214, 'descripcion' => 'OTROS TIPOS TRANSPORTE REG. VIA TER.'],
['codigo' => 60227, 'descripcion' => 'OTROS TIPOS TRANSPORTE NO REG. VIA TER.'],
['codigo' => 60230, 'descripcion' => 'TRANSPORTE DE CARGA POR CARRETERA.'],
['codigo' => 60302, 'descripcion' => 'TRANSPORTE POR TUBERIAS.'],
['codigo' => 61107, 'descripcion' => 'TRANSPORTE MARITIMO Y DE CABOTAJE.'],
['codigo' => 61208, 'descripcion' => 'TRANSPORTE VIAS NAVEGACION INTERIOR.'],
['codigo' => 62103, 'descripcion' => 'TRANSPORTE REGULAR VIA AEREA.'],
['codigo' => 62204, 'descripcion' => 'TRANSPORTE NO REGULAR POR VIA AEREA.'],
['codigo' => 63011, 'descripcion' => 'MANIPULACION DE LA CARGA'],
['codigo' => 63024, 'descripcion' => 'ALMACENAMIENTO Y DEPOSITO'],
['codigo' => 63037, 'descripcion' => 'OTRAS ACTIVIDADES DE TRANSPORTES.'],
['codigo' => 63040, 'descripcion' => 'AGENCIAS DE VIAJES Y GUIAS TURISTIC.'],
['codigo' => 63093, 'descripcion' => 'ORGANIZACION DEL TRANSPORTE'],
['codigo' => 64119, 'descripcion' => 'ACTIVIDADES POSTALES NACIONALES'],
['codigo' => 64121, 'descripcion' => 'ACTIVIDADES DE CORREO DISTINTAS'],
['codigo' => 64207, 'descripcion' => 'TELECOMUNICACIONES'],
['codigo' => 65115, 'descripcion' => 'BANCA CENTRAL'],
['codigo' => 65197, 'descripcion' => 'OTROS TIPOS INTERMEDIACION MONETARIA.'],
['codigo' => 65912, 'descripcion' => 'ARRENDAMIENTO CON OPCION DE COMPRA'],
['codigo' => 65925, 'descripcion' => 'OTROS TIPOS DE CREDITO'],
['codigo' => 65994, 'descripcion' => 'OTROS TIPOS DE INTERMEDIACION FINANC.'],
['codigo' => 66010, 'descripcion' => 'PLANES DE SEGUROS DE VIDA'],
['codigo' => 66023, 'descripcion' => 'PLANES DE PENSIONES'],
['codigo' => 66036, 'descripcion' => 'PLANES DE SEGUROS GENERALES'],
['codigo' => 67118, 'descripcion' => 'ADMINISTRACION MERCADOS FINANCIEROS.'],
['codigo' => 67120, 'descripcion' => 'ACTIVIDADES BURSATILES'],
['codigo' => 67190, 'descripcion' => 'ACTIV. AUXIL ARES DE INTERM. FINANC.'],
['codigo' => 67206, 'descripcion' => 'ACTIV. FINANC. PLANES SEGUROS Y PENS.'],
['codigo' => 70109, 'descripcion' => 'ACTIVIDADES INMOBILIARIAS'],
['codigo' => 70200, 'descripcion' => 'ACTIV. INMOBILIARIAS POR RETRIBUCION.'],
['codigo' => 71118, 'descripcion' => 'ALQUILER EQUIPO TRANSPORTE V. TERRES.'],
['codigo' => 71120, 'descripcion' => 'ALQUILER EQUIPO TRANSPORTE V.ACUAT.'],
['codigo' => 71133, 'descripcion' => 'ALQUILER EQUIPO TRANSPORTE V.AEREA.'],
['codigo' => 71219, 'descripcion' => 'ALQUILER MAQUI. Y EQUIP.AGROPECUARIO.'],
['codigo' => 71221, 'descripcion' => 'ALQUILER MAQUI. Y EQUIP.CONSTRUCCION.'],
['codigo' => 71234, 'descripcion' => 'ALQUILER MAQUI.Y EQUIP.DE OFICINA.'],
['codigo' => 71290, 'descripcion' => 'ALQUILER OTROS TIPOS MAQ.Y EQUI. NCP.'],
['codigo' => 71307, 'descripcion' => 'ALQUILER ENSERES DOMESTICOS NCP.'],
['codigo' => 72101, 'descripcion' => 'CONSULTORES EN EQUIPO INFORMATICA.'],
['codigo' => 72202, 'descripcion' => 'CONSULTORES PROG. Y SUMIN. INFORMATIC.'],
['codigo' => 72303, 'descripcion' => 'PROCESAMIENTO DE DATOS.'],
['codigo' => 72404, 'descripcion' => 'ACTIV.RELACIONADAS CON BASE DE DATO.'],
['codigo' => 72505, 'descripcion' => 'MANTEN.Y REPAR.MAQUIN. DE OFICINA.'],
['codigo' => 72909, 'descripcion' => 'OTRAS ACTIVIDADES DE INFORMATICA.'],
['codigo' => 73108, 'descripcion' => 'INVESTIGACION DE CIENCIAS NATURALES.'],
['codigo' => 73209, 'descripcion' => 'INVESTIGACION DE CIENCIAS SOCIALES.'],
['codigo' => 74117, 'descripcion' => 'ACTIVIDADES JURIDICAS'],
['codigo' => 74120, 'descripcion' => 'ACTIVIDADES DE CONTABILIDAD'],
['codigo' => 74132, 'descripcion' => 'INVESTIGACION DE MERCADOS'],
['codigo' => 74145, 'descripcion' => 'ACTIV.DE ASESORAMIENTO EMPRESARIAL'],
['codigo' => 74218, 'descripcion' => 'ACTIV.DE ARQUITECTURA E INGENIERIA'],
['codigo' => 74220, 'descripcion' => 'ENSAYOS Y ANALISIS TECNICOS'],
['codigo' => 74306, 'descripcion' => 'PUBLICIDAD'],
['codigo' => 74914, 'descripcion' => 'OBTENCION Y DOTACION PERSONAL'],
['codigo' => 74927, 'descripcion' => 'ACTIV. DE INVESTIGACION Y SEGURIDAD.'],
['codigo' => 74930, 'descripcion' => 'ACTIVIDADES LIMPIEZA DE EDIFICIOS'],
['codigo' => 74942, 'descripcion' => 'ACTIVIDADES DE FOTOGRAFIA'],
['codigo' => 74955, 'descripcion' => 'ACTIVIDADES DE ENVASE Y EMPAQUE'],
['codigo' => 74996, 'descripcion' => 'OTRAS ACTIVIDADES EMPRESARIALES NCP.'],
['codigo' => 75113, 'descripcion' => 'ACTIV. ADMINIST. PUBLICA EN GENERAL'],
['codigo' => 75126, 'descripcion' => 'REGULACION DE ACTIVID.ORGANISMOS'],
['codigo' => 75139, 'descripcion' => 'REGULAC. Y FACILITAC. ACTIV.ECONOMIC.'],
['codigo' => 75141, 'descripcion' => 'SERVIC. AUXIL.PARA ADMINIST.PUBLICA.'],
['codigo' => 75214, 'descripcion' => 'RELACIONES EXTERIORES'],
['codigo' => 75227, 'descripcion' => 'ACTIVIDADES DE DEFENSA'],
['codigo' => 75230, 'descripcion' => 'MANTENIMIENTO DEL ORDEN PUBLICO'],
['codigo' => 75302, 'descripcion' => 'SERVICIOS PUBLICOS SEGURIDAD SOCIAL'],
['codigo' => 80107, 'descripcion' => 'ENSEÑANZA PRIMARIA'],
['codigo' => 80210, 'descripcion' => 'ENSEÑANZA SECUNDARIA FORMACION GRAL.'],
['codigo' => 80223, 'descripcion' => 'ENSEÑANZA SECUNDARIA FORMAC. TECNICA.'],
['codigo' => 80309, 'descripcion' => 'ENSEÑANZA SUPERIOR'],
['codigo' => 80904, 'descripcion' => 'EDUCACION DE ADULTOS Y OTROS'],
['codigo' => 85111, 'descripcion' => 'ACTIVIDADES DE HOSPITALES'],
['codigo' => 85124, 'descripcion' => 'ACTIVIDADES DE MEDICOS Y ODONTOLOGO'],
['codigo' => 85193, 'descripcion' => 'OTRAS ACTIV.RELAC. CON SALUD HUMANA'],
['codigo' => 85200, 'descripcion' => 'ACTIVIDADES VETERINARIAS'],
['codigo' => 85313, 'descripcion' => 'SERVICIOS SOCIALES CON ALOJAMIENTO'],
['codigo' => 85326, 'descripcion' => 'SERVICIOS SOCIALES SIN ALOJAMIENTO'],
['codigo' => 90004, 'descripcion' => 'ELIMINACION DE DESPERDICIOS'],
['codigo' => 91114, 'descripcion' => 'ACTIV.ORGANIZACIONES EMPRESARIALES'],
['codigo' => 91127, 'descripcion' => 'ACTIV.ORGANIZACIONES PROFESIONALES.'],
['codigo' => 91202, 'descripcion' => 'ACTIVIDADES DE SINDICATOS'],
['codigo' => 91911, 'descripcion' => 'ACTIV.ORGANIZACIONES RELIGIOSAS'],
['codigo' => 91924, 'descripcion' => 'ACTIV.ORGANIZACIONES POLITICAS'],
['codigo' => 91993, 'descripcion' => 'ACTIVIDADES OTRAS ASOCIACIONES NCP.'],
['codigo' => 92110, 'descripcion' => 'PRODUCCION Y DIST.FILMES Y VIDEOS'],
['codigo' => 92123, 'descripcion' => 'EXHIBICION FILMES Y VIDEOS'],
['codigo' => 92136, 'descripcion' => 'ACTIVIDADES DE RADIO Y TELEVISION.'],
['codigo' => 92149, 'descripcion' => 'ACTIV.TEATRALES, MUSICALES Y OTRAS.'],
['codigo' => 92192, 'descripcion' => 'OTRAS ACTIVID.ENTRETENIMIENTO NCP.'],
['codigo' => 92209, 'descripcion' => 'ACTIVIDADES DE AGENCIAS DE NOTICIAS'],
['codigo' => 92312, 'descripcion' => 'ACTIVIDADES BIBLIOTECAS Y ARCHIVOS'],
['codigo' => 92325, 'descripcion' => 'ACTIV.MUSEOS Y LUGARES HISTORICOS.'],
['codigo' => 92338, 'descripcion' => 'ACTIV.JARDINES BOTANICOS Y ZOOLOGIC.'],
['codigo' => 92413, 'descripcion' => 'ACTIVIDADES DEPORTIVAS'],
['codigo' => 92495, 'descripcion' => 'OTRAS ACTIVIDADES DE ESPARCIMIENTO'],
['codigo' => 93016, 'descripcion' => 'LAVADO, LIMPIEZA Y TEÑIDO TELA'],
['codigo' => 93029, 'descripcion' => 'PELUQUERIA Y OTROS'],
['codigo' => 93031, 'descripcion' => 'POMPAS FUNEBRES Y ACTIVID.CONEXAS'],
['codigo' => 93098, 'descripcion' => 'OTRAS ACTIVID.DE TIPO SERVICIO NCP'],
['codigo' => 95006, 'descripcion' => 'HOGARES PRIVADOS C. SERV.DOMESTICO'],
['codigo' => 99001, 'descripcion' => 'ORGANIZACIONES INTERNACIONALES'],

            

        ];
        DB::table('tipo_de_actividad')->insert($data);

    }
}
