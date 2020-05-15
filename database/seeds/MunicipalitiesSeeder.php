<?php

use Illuminate\Database\Seeder;
use App\Models\States;
use App\Models\Municipalities;

class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = States::where('name', 'Jalisco')->first();

        Municipalities::create([
            'name' => 'Encarnación de Díaz',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Lagos de Moreno',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Ojuelos de Jalisco',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Diego de Alejandría',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Juan de los Lagos',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Teocaltiche',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Unión de San Antonio',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Villa Hidalgo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Acatic',            
            'state_id' => $state->id,        
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Arandas',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Jalostotitlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Jesús María',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Mexticacán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Julián',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Miguel el Alto',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tepatitlán de Morelos',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Valle de Guadalupe',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Cañadas de Obregón',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Yahualica de González Gallo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Ignacio Cerro Gordo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Cuquío',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Ixtlahuacán de los Membrillos',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Ixtlahuacán del Río',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Juanacatlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'El Salto',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Cristóbal de la Barranca',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tlajomulco de Zúñiga',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Zapotlanejo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Atotonilco el Alto',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Ayotlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'La Barca',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Degollado',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Jamay',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Ocotlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Poncitlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tototlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Zapotlán del Rey',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Casimiro Castillo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Cihuatlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Cuautitlán de García Barragán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'La Huerta',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Villa Purificación',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tomatlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Acatlán de Juárez',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Amacueca',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Atemajac de Brizuela',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Atoyac',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Cocula',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Martín Hidalgo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Sayula',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tapalpa',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Techaluta de Montenegro',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Teocuitatlán de Corona',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Villa Corona',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Zacoalco de Torres',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Bolaños',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Colotlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Chimaltitán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Huejúcar',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Huejuquilla el Alto',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Mezquitic',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Martín de Bolaños',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Santa María de los Ángeles',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Totatiche',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Villa Guerrero',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Atengo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Autlán de Navarro',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Ayutla',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Cuautla',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Chiquilistlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Ejutla',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'El Grullo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Juchitlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'El Limón',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tecolotlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tenamaxtlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tonaya',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tuxcacuesco',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Unión de Tula',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Atenguillo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Cabo Corrientes',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Guachinango',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Mascota',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Mixtlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Puerto Vallarta',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Sebastián del Oeste',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Talpa de Allende',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Zapotlán El Grande',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Jilotlán de los Dolore',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Pihuamo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Gómez Farías',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tamazula de Gordiano',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tecalitlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tolimán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tonila',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tuxpan',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Gabriel',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Zapotiltic',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Zapotitlán de Vadillo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Concepción de Buenos Aires',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Chapala',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Jocotepec',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Santa María del Oro',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'La Manzanilla de la Paz',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Mazamitla',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Quitupan',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tizapán el Alto',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tuxcueca',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Valle de Juárez',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Ahualulco de Mercado',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Amatitán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Ameca',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Juanito de Escobedo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'El Arenal',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Etzatlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Hostotipaquillo',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Magdalena',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'San Marcos',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tala',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tequila',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Teuchitlán',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Guadalajara',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Zapopan',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Municipalities::create([
            'name' => 'Tonala',
            'state_id' => $state->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
