<?php

namespace Database\Factories;

use App\Models\Bike;
use Illuminate\Database\Eloquent\Factories\Factory;

class BikeFactory extends Factory
{
    protected $model = Bike::class;
    
    public function definition()
    {
        return [
            'description' => 'Quadro Alumínio, Suspensão Caloi R700 com 40mm de curso, Aro 700 - Alumínio - Parede dupla',
            'model' => 'Bicicleta Caloi 700 2021',
            'amount' => '1905.88',
            'purchased_in' => '2019-10-25',
            'buyer_name' => 'Maria de Souza Cruz',
            'store_name' => 'Bike Center',
        ];
    }
}
