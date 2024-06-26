<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ConceptosCuentas;
use App\Models\Tipo_moneda;
use App\Models\TipoPago;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            
           
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,
            
            /*
            Tipo_DocumentoSeeder::class,
            NacionalidadSeeder::class,
            DepartamentoRegionSeeder::class,
            TipoEstablecimientoSeeder::class,
            ViaSeeder::class,
            ZonaSeeder::class,
            */
          // ProvinciaSeeder::class,
          // DistritoSeeder::class,
          //ViaSeeder::class,
          //ZonaSeeder::class,
          //NivelEducativoSeeder::class,
          //TipoTrabajadorsSeeder::class,
          //TipoMonedasSeeder::class,
          // TipoCambioSeeder::class,
          //OcupacionSeeder::class,
          // RegimenPensionarioSeeder::class,
          // TiposContatosTrabajoSeeder::class,
          // PeriodicidadSeeder::class,
          // EPSSeeder::class,
          // SituacionEPSSeeder::class,
          // TipoPagoSeeder::class,
          // MotivoFinPeriodoSeeder::class,
          // TipoModalidadFormativaSeeder::class,
          // VinculoFamiliarSeeder::class,
          // MotivoBajaDHSeeder::class,
          // TipoSuspensionSeeder::class,
           // TipoComprobanteSeeder::class,
          // UitSeeder::class,
          // FormulaSeeder::class,
         // ConceptoSunatSeeder::class,
          //ConceptosSeeder::class,
          // ConceptosCuentasSeeder::class,
          // CategoriaOcupacionalSeeder::class,


        ]);
    }
}
