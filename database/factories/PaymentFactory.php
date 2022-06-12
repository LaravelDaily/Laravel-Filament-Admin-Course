<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        $users = collect(User::all()->modelKeys());

        $voucher = Voucher::inRandomOrder()->get('id')->first();

        return [
            'user_id' => $users->random(),
            'voucher_id' => $this->faker->boolean(60) ? $voucher->id : null,
            'taxes' => $this->faker->numberBetween(0, 20),
            'created_at' => $this->faker->dateTimeBetween('-100 days', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Payment $payment) {
            $product = Product::inRandomOrder()->first();

            $payment->product_id = $product->id;
            $payment->subtotal = $product->price;
            $payment->taxes = $this->faker->numberBetween(0, 20) * $product->price;
            $payment->total = $payment->subtotal + $payment->taxes;
        });
    }
}
