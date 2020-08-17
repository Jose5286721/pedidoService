<?php

use App\Estado;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call('UsersTableSeeder');
		factory(Estado::class, 3)->create();
		//factory(Pedido::class, 10)->create();
	}
}
