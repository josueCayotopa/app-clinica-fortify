<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['codigo' => 9001, 'descripcion' => 'BOUVET ISLAND'],
            ['codigo' => 9002, 'descripcion' => 'COTE D IVOIRE'],
            ['codigo' => 9003, 'descripcion' => 'FALKLAND ISLANDS (MALVINAS)'],
            ['codigo' => 9004, 'descripcion' => 'FRANCE, METROPOLITAN'],
            ['codigo' => 9005, 'descripcion' => 'FRENCH SOUTHERN TERRITORIES'],
            ['codigo' => 9006, 'descripcion' => 'HEARD AND MC DONALD ISLANDS'],
            ['codigo' => 9007, 'descripcion' => 'MAYOTTE'],
            ['codigo' => 9008, 'descripcion' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'],
            ['codigo' => 9009, 'descripcion' => 'SVALBARD AND JAN MAYEN ISLANDS'],
            ['codigo' => 9010, 'descripcion' => 'UNITED STATES MINOR OUTLYING ISLANDS'],
            ['codigo' => 9011, 'descripcion' => 'OTROS PAISES O LUGARES'],
            ['codigo' => 9013, 'descripcion' => 'AFGANISTAN'],
            ['codigo' => 9017, 'descripcion' => 'ALBANIA'],
            ['codigo' => 9019, 'descripcion' => 'ALDERNEY'],
            ['codigo' => 9023, 'descripcion' => 'ALEMANIA'],
            ['codigo' => 9026, 'descripcion' => 'ARMENIA'],
            ['codigo' => 9027, 'descripcion' => 'ARUBA'],
            ['codigo' => 9028, 'descripcion' => 'ASCENCION'],
            ['codigo' => 9029, 'descripcion' => 'BOSNIA-HERZEGOVINA'],
            ['codigo' => 9031, 'descripcion' => 'BURKINA FASO'],
            ['codigo' => 9037, 'descripcion' => 'ANDORRA'],
            ['codigo' => 9040, 'descripcion' => 'ANGOLA'],
            ['codigo' => 9041, 'descripcion' => 'ANGUILLA'],
            ['codigo' => 9043, 'descripcion' => 'ANTIGUA Y BARBUDA'],
            ['codigo' => 9047, 'descripcion' => 'ANTILLAS HOLANDESAS'],
            ['codigo' => 9053, 'descripcion' => 'ARABIA SAUDITA'],
            ['codigo' => 9059, 'descripcion' => 'ARGELIA'],
            ['codigo' => 9063, 'descripcion' => 'ARGENTINA'],
            ['codigo' => 9069, 'descripcion' => 'AUSTRALIA'],
            ['codigo' => 9072, 'descripcion' => 'AUSTRIA'],
            ['codigo' => 9074, 'descripcion' => 'AZERBAIJÁN'],
            ['codigo' => 9077, 'descripcion' => 'BAHAMAS'],
            ['codigo' => 9080, 'descripcion' => 'BAHREIN'],
            ['codigo' => 9081, 'descripcion' => 'BANGLA DESH'],
            ['codigo' => 9083, 'descripcion' => 'BARBADOS'],
            ['codigo' => 9087, 'descripcion' => 'BÉLGICA'],
            ['codigo' => 9088, 'descripcion' => 'BELICE'],
            ['codigo' => 9090, 'descripcion' => 'BERMUDAS'],
            ['codigo' => 9091, 'descripcion' => 'BELARUS'],
            ['codigo' => 9093, 'descripcion' => 'MYANMAR'],
            ['codigo' => 9097, 'descripcion' => 'BOLIVIA'],
            ['codigo' => 9101, 'descripcion' => 'BOTSWANA'],
            ['codigo' => 9105, 'descripcion' => 'BRASIL'],
            ['codigo' => 9108, 'descripcion' => 'BRUNEI DARUSSALAM'],
            ['codigo' => 9111, 'descripcion' => 'BULGARIA'],
            ['codigo' => 9115, 'descripcion' => 'BURUNDI'],
            ['codigo' => 9119, 'descripcion' => 'BUTÁN'],
            ['codigo' => 9127, 'descripcion' => 'CABO VERDE'],
            ['codigo' => 9137, 'descripcion' => 'CAIMÁN, ISLAS'],
            ['codigo' => 9141, 'descripcion' => 'CAMBOYA'],
            ['codigo' => 9145, 'descripcion' => 'CAMERÚN, REPUBLICA UNIDA DEL'],
            ['codigo' => 9147, 'descripcion' => 'CAMPIONE D TALIA'],
            ['codigo' => 9149, 'descripcion' => 'CANADÁ'],
            ['codigo' => 9155, 'descripcion' => 'CANAL (NORMANDAS), ISLAS'],
            ['codigo' => 9157, 'descripcion' => 'CANTÓN Y ENDERBURRY'],
            ['codigo' => 9159, 'descripcion' => 'SANTA SEDE'],
            ['codigo' => 9165, 'descripcion' => 'COCOS (KEELING),ISLAS'],
            ['codigo' => 9169, 'descripcion' => 'COLOMBIA'],
            ['codigo' => 9173, 'descripcion' => 'COMORAS'],
            ['codigo' => 9177, 'descripcion' => 'CONGO'],
            ['codigo' => 9183, 'descripcion' => 'COOK, ISLAS'],
            ['codigo' => 9187, 'descripcion' => 'COREA (NORTE), REPUBLICA POPULAR DEMOCRATICA DE'],
            ['codigo' => 9190, 'descripcion' => 'COREA (SUR), REPUBLICA DE'],
            ['codigo' => 9193, 'descripcion' => 'COSTA DE MARFIL'],
            ['codigo' => 9196, 'descripcion' => 'COSTA RICA'],
            ['codigo' => 9198, 'descripcion' => 'CROACIA'],
            ['codigo' => 9199, 'descripcion' => 'CUBA'],
            ['codigo' => 9203, 'descripcion' => 'CHAD'],
            ['codigo' => 9207, 'descripcion' => 'CHECOSLOVAQUIA'],
            ['codigo' => 9211, 'descripcion' => 'CHILE'],
            ['codigo' => 9215, 'descripcion' => 'CHINA'],
            ['codigo' => 9218, 'descripcion' => 'TAIWAN (FORMOSA)'],
            ['codigo' => 9221, 'descripcion' => 'CHIPRE'],
            ['codigo' => 9229, 'descripcion' => 'BENIN'],
            ['codigo' => 9232, 'descripcion' => 'DINAMARCA'],
            ['codigo' => 9235, 'descripcion' => 'DOMINICA'],
            ['codigo' => 9239, 'descripcion' => 'ECUADOR'],
            ['codigo' => 9240, 'descripcion' => 'EGIPTO'],
['codigo' => 9242, 'descripcion' => 'EL SALVADOR'],
['codigo' => 9243, 'descripcion' => 'ERITREA'],
['codigo' => 9244, 'descripcion' => 'EMIRATOS ARABES UNIDOS'],
['codigo' => 9245, 'descripcion' => 'ESPAÑA'],
['codigo' => 9246, 'descripcion' => 'ESLOVAQUIA'],
['codigo' => 9247, 'descripcion' => 'ESLOVENIA'],
['codigo' => 9249, 'descripcion' => 'ESTADOS UNIDOS'],
['codigo' => 9251, 'descripcion' => 'ESTONIA'],
['codigo' => 9253, 'descripcion' => 'ETIOPIA'],
['codigo' => 9259, 'descripcion' => 'FEROE, ISLAS'],
['codigo' => 9267, 'descripcion' => 'FILIPINAS'],
['codigo' => 9271, 'descripcion' => 'FINLANDIA'],
['codigo' => 9275, 'descripcion' => 'FRANCIA'],
['codigo' => 9281, 'descripcion' => 'GABON'],
['codigo' => 9285, 'descripcion' => 'GAMBIA'],
['codigo' => 9286, 'descripcion' => 'GAZA Y JERICO'],
['codigo' => 9287, 'descripcion' => 'GEORGIA'],
['codigo' => 9289, 'descripcion' => 'GHANA'],
['codigo' => 9293, 'descripcion' => 'GIBRALTAR'],
['codigo' => 9297, 'descripcion' => 'GRANADA'],
['codigo' => 9301, 'descripcion' => 'GRECIA'],
['codigo' => 9305, 'descripcion' => 'GROENLANDIA'],
['codigo' => 9309, 'descripcion' => 'GUADALUPE'],
['codigo' => 9313, 'descripcion' => 'GUAM'],
['codigo' => 9317, 'descripcion' => 'GUATEMALA'],
['codigo' => 9325, 'descripcion' => 'GUAYANA FRANCESA'],
['codigo' => 9327, 'descripcion' => 'GUERNSEY'],
['codigo' => 9329, 'descripcion' => 'GUINEA'],
['codigo' => 9331, 'descripcion' => 'GUINEA ECUATORIAL'],
['codigo' => 9334, 'descripcion' => 'GUINEA-BISSAU'],
['codigo' => 9337, 'descripcion' => 'GUYANA'],
['codigo' => 9341, 'descripcion' => 'HAITI'],
['codigo' => 9345, 'descripcion' => 'HONDURAS'],
['codigo' => 9348, 'descripcion' => 'HONDURAS BRITANICAS'],
['codigo' => 9351, 'descripcion' => 'HONG KONG'],
['codigo' => 9355, 'descripcion' => 'HUNGRIA'],
['codigo' => 9361, 'descripcion' => 'INDIA'],
['codigo' => 9365, 'descripcion' => 'INDONESIA'],
['codigo' => 9369, 'descripcion' => 'IRAK'],
['codigo' => 9372, 'descripcion' => 'IRAN, REPUBLICA ISLAMICA DEL'],
['codigo' => 9375, 'descripcion' => 'IRLANDA (EIRE)'],
['codigo' => 9377, 'descripcion' => 'ISLA AZORES'],
['codigo' => 9378, 'descripcion' => 'ISLA DEL MAN'],
['codigo' => 9379, 'descripcion' => 'ISLANDIA'],
['codigo' => 9380, 'descripcion' => 'ISLAS CANARIAS'],
['codigo' => 9381, 'descripcion' => 'ISLAS DE CHRISTMAS'],
['codigo' => 9382, 'descripcion' => 'ISLAS QESHM'],
['codigo' => 9383, 'descripcion' => 'ISRAEL'],
['codigo' => 9386, 'descripcion' => 'ITALIA'],
['codigo' => 9391, 'descripcion' => 'JAMAICA'],
['codigo' => 9395, 'descripcion' => 'JONSTON, ISLAS'],
['codigo' => 9399, 'descripcion' => 'JAPON'],
['codigo' => 9401, 'descripcion' => 'JERSEY'],
['codigo' => 9403, 'descripcion' => 'JORDANIA'],
['codigo' => 9406, 'descripcion' => 'KAZAJSTAN'],
['codigo' => 9410, 'descripcion' => 'KENIA'],
['codigo' => 9411, 'descripcion' => 'KIRIBATI'],
['codigo' => 9412, 'descripcion' => 'KIRGUIZISTAN'],
['codigo' => 9413, 'descripcion' => 'KUWAIT'],
['codigo' => 9418, 'descripcion' => 'LABUN'],
['codigo' => 9420, 'descripcion' => 'LAOS, REPUBLICA POPULAR DEMOCRATICA DE'],
['codigo' => 9426, 'descripcion' => 'LESOTHO'],
['codigo' => 9429, 'descripcion' => 'LETONIA'],
['codigo' => 9431, 'descripcion' => 'LIBANO'],
['codigo' => 9434, 'descripcion' => 'LIBERIA'],
['codigo' => 9438, 'descripcion' => 'LIBIA'],
['codigo' => 9440, 'descripcion' => 'LIECHTENSTEIN'],
['codigo' => 9443, 'descripcion' => 'LITUANIA'],
['codigo' => 9445, 'descripcion' => 'LUXEMBURGO'],
['codigo' => 9447, 'descripcion' => 'MACAO'],
['codigo' => 9448, 'descripcion' => 'MACEDONIA'],
['codigo' => 9450, 'descripcion' => 'MADAGASCAR'],
['codigo' => 9453, 'descripcion' => 'MADEIRA'],
['codigo' => 9455, 'descripcion' => 'MALAYSIA'],
['codigo' => 9458, 'descripcion' => 'MALAWI'],
['codigo' => 9461, 'descripcion' => 'MALDIVAS'],
['codigo' => 9464, 'descripcion' => 'MALI'],
['codigo' => 9467, 'descripcion' => 'MALTA'],
['codigo' => 9469, 'descripcion' => 'MARIANAS DEL NORTE, ISLAS'],
['codigo' => 9472, 'descripcion' => 'MARSHALL, ISLAS'],
['codigo' => 9474, 'descripcion' => 'MARRUECOS'],
['codigo' => 9477, 'descripcion' => 'MARTINICA'],
['codigo' => 9485, 'descripcion' => 'MAURICIO'],
['codigo' => 9488, 'descripcion' => 'MAURITANIA'],
['codigo' => 9493, 'descripcion' => 'MEXICO'],
['codigo' => 9494, 'descripcion' => 'MICRONESIA, ESTADOS FEDERADOS DE'],
['codigo' => 9495, 'descripcion' => 'MIDWAY ISLAS'],
['codigo' => 9496, 'descripcion' => 'MOLDAVIA'],
['codigo' => 9497, 'descripcion' => 'MONGOLIA'],
['codigo' => 9498, 'descripcion' => 'MONACO'],
['codigo' => 9501, 'descripcion' => 'MONTSERRAT, ISLA'],
['codigo' => 9505, 'descripcion' => 'MOZAMBIQUE'],
['codigo' => 9507, 'descripcion' => 'NAMIBIA'],
['codigo' => 9508, 'descripcion' => 'NAURU'],
['codigo' => 9511, 'descripcion' => 'NAVIDAD (CHRISTMAS), ISLA'],
['codigo' => 9517, 'descripcion' => 'NEPAL'],
['codigo' => 9521, 'descripcion' => 'NICARAGUA'],
['codigo' => 9525, 'descripcion' => 'NIGER'],
['codigo' => 9528, 'descripcion' => 'NIGERIA'],
['codigo' => 9531, 'descripcion' => 'NIUE, ISLA'],
['codigo' => 9535, 'descripcion' => 'NORFOLK, ISLA'],
['codigo' => 9538, 'descripcion' => 'NORUEGA'],
['codigo' => 9542, 'descripcion' => 'NUEVA CALEDONIA'],
['codigo' => 9545, 'descripcion' => 'PAPUASIA NUEVA GUINEA'],
['codigo' => 9548, 'descripcion' => 'NUEVA ZELANDA'],
['codigo' => 9551, 'descripcion' => 'VANUATU'],
['codigo' => 9556, 'descripcion' => 'OMAN'],
['codigo' => 9566, 'descripcion' => 'PACIFICO, ISLAS DEL'],
['codigo' => 9573, 'descripcion' => 'PAISES BAJOS'],
['codigo' => 9576, 'descripcion' => 'PAKISTAN'],
['codigo' => 9578, 'descripcion' => 'PALAU, ISLAS'],
['codigo' => 9579, 'descripcion' => 'TERRITORIO AUTONOMO DE PALESTINA.'],
['codigo' => 9580, 'descripcion' => 'PANAMA'],
['codigo' => 9586, 'descripcion' => 'PARAGUAY'],
['codigo' => 9589, 'descripcion' => 'PERÚ'],
['codigo' => 9593, 'descripcion' => 'PITCAIRN, ISLA'],
['codigo' => 9599, 'descripcion' => 'POLINESIA FRANCESA'],
['codigo' => 9603, 'descripcion' => 'POLONIA'],
['codigo' => 9607, 'descripcion' => 'PORTUGAL'],
['codigo' => 9611, 'descripcion' => 'PUERTO RICO'],
['codigo' => 9618, 'descripcion' => 'QATAR'],
['codigo' => 9628, 'descripcion' => 'REINO UNIDO'],
['codigo' => 9629, 'descripcion' => 'ESCOCIA'],
['codigo' => 9633, 'descripcion' => 'REPUBLICA ARABE UNIDA'],
['codigo' => 9640, 'descripcion' => 'REPUBLICA CENTROAFRICANA'],
['codigo' => 9644, 'descripcion' => 'REPUBLICA CHECA'],
['codigo' => 9645, 'descripcion' => 'REPUBLICA DE SWAZILANDIA'],
['codigo' => 9646, 'descripcion' => 'REPUBLICA DE TUNEZ'],
['codigo' => 9647, 'descripcion' => 'REPUBLICA DOMINICANA'],
['codigo' => 9660, 'descripcion' => 'REUNION'],
['codigo' => 9665, 'descripcion' => 'ZIMBABWE'],
['codigo' => 9670, 'descripcion' => 'RUMANIA'],
['codigo' => 9675, 'descripcion' => 'RUANDA'],
['codigo' => 9676, 'descripcion' => 'RUSIA'],
['codigo' => 9677, 'descripcion' => 'SALOMON, ISLAS'],
['codigo' => 9685, 'descripcion' => 'SAHARA OCCIDENTAL'],
['codigo' => 9687, 'descripcion' => 'SAMOA OCCIDENTAL'],
['codigo' => 9690, 'descripcion' => 'SAMOA NORTEAMERICANA'],
['codigo' => 9695, 'descripcion' => 'SAN CRISTOBAL Y NIEVES'],
['codigo' => 9697, 'descripcion' => 'SAN MARINO'],
['codigo' => 9700, 'descripcion' => 'SAN PEDRO Y MIQUELON'],
['codigo' => 9705, 'descripcion' => 'SAN VICENTE Y LAS GRANADINAS'],
['codigo' => 9710, 'descripcion' => 'SANTA ELENA'],
['codigo' => 9715, 'descripcion' => 'SANTA LUCIA'],
['codigo' => 9720, 'descripcion' => 'SANTO TOME Y PRINCIPE'],
['codigo' => 9728, 'descripcion' => 'SENEGAL'],
['codigo' => 9731, 'descripcion' => 'SEYCHELLES'],
['codigo' => 9735, 'descripcion' => 'SIERRA LEONA'],
['codigo' => 9741, 'descripcion' => 'SINGAPUR'],
['codigo' => 9744, 'descripcion' => 'SIRIA, REPUBLICA ARABE DE'],
['codigo' => 9748, 'descripcion' => 'SOMALIA'],
['codigo' => 9750, 'descripcion' => 'SRI LANKA'],
['codigo' => 9756, 'descripcion' => 'SUDAFRICA, REPUBLICA DE'],
['codigo' => 9759, 'descripcion' => 'SUDAN'],
['codigo' => 9764, 'descripcion' => 'SUECIA'],
['codigo' => 9767, 'descripcion' => 'SUIZA'],
['codigo' => 9770, 'descripcion' => 'SURINAM'],
['codigo' => 9773, 'descripcion' => 'SAWSILANDIA'],
['codigo' => 9774, 'descripcion' => 'TADJIKISTAN'],
['codigo' => 9776, 'descripcion' => 'TAILANDIA'],
['codigo' => 9780, 'descripcion' => 'TANZANIA, REPUBLICA UNIDA DE'],
['codigo' => 9783, 'descripcion' => 'DJIBOUTI'],
['codigo' => 9786, 'descripcion' => 'TERRITORIO ANTARTICO BRITANICO'],
['codigo' => 9787, 'descripcion' => 'TERRITORIO BRITANICO DEL OCEANO INDICO'],
['codigo' => 9788, 'descripcion' => 'TIMOR DEL ESTE'],
['codigo' => 9800, 'descripcion' => 'TOGO'],
['codigo' => 9805, 'descripcion' => 'TOKELAU'],
['codigo' => 9810, 'descripcion' => 'TONGA'],
['codigo' => 9815, 'descripcion' => 'TRINIDAD Y TOBAGO'],
['codigo' => 9816, 'descripcion' => 'TRISTAN DA CUNHA'],
['codigo' => 9820, 'descripcion' => 'TUNICIA'],
['codigo' => 9823, 'descripcion' => 'TURCAS Y CAICOS, ISLAS'],
['codigo' => 9825, 'descripcion' => 'TURKMENISTAN'],
['codigo' => 9827, 'descripcion' => 'TURQUIA'],
['codigo' => 9828, 'descripcion' => 'TUVALU'],
['codigo' => 9830, 'descripcion' => 'UCRANIA'],
['codigo' => 9833, 'descripcion' => 'UGANDA'],
['codigo' => 9840, 'descripcion' => 'URSS'],
['codigo' => 9845, 'descripcion' => 'URUGUAY'],
['codigo' => 9847, 'descripcion' => 'UZBEKISTAN'],
['codigo' => 9850, 'descripcion' => 'VENEZUELA'],
['codigo' => 9855, 'descripcion' => 'VIET NAM'],
['codigo' => 9858, 'descripcion' => 'VIETNAM (DEL NORTE)'],
['codigo' => 9863, 'descripcion' => 'VIRGENES, ISLAS (BRITANICAS)'],
['codigo' => 9866, 'descripcion' => 'VIRGENES, ISLAS (NORTEAMERICANAS)'],
['codigo' => 9870, 'descripcion' => 'FIJI'],
['codigo' => 9873, 'descripcion' => 'WAKE, ISLA'],
['codigo' => 9875, 'descripcion' => 'WALLIS Y FORTUNA, ISLAS'],
['codigo' => 9880, 'descripcion' => 'YEMEN'],
['codigo' => 9885, 'descripcion' => 'YUGOSLAVIA'],
['codigo' => 9888, 'descripcion' => 'ZAIRE'],
['codigo' => 9890, 'descripcion' => 'ZAMBIA'],
['codigo' => 9895, 'descripcion' => 'ZONA DEL CANAL DE PANAMA'],
['codigo' => 9896, 'descripcion' => 'ZONA LIBRE OSTRAVA'],
['codigo' => 9897, 'descripcion' => 'ZONA NEUTRAL (PALESTINA)'],
        ];
        DB::table('nacionalidad')->insert($data);
    }
}