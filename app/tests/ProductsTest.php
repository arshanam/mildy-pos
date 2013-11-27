<?php

class ProductsTest extends TestCase {
	public function testShowProductsIndex() {
		$this->call('GET', 'products');
		$this->assertResponseOk();
	}

	public function testShowProductsCreateForm() {
		$this->call('GET', 'products/create');
		$this->assertResponseOk();
	}

	public function testProductsStore() {
		Eloquent::unguard();
		$this->call('POST', 'products', array('id' => '1', 'name' => 'Test Product', 'price' => '500', 'description' => 'Test Description'));
		$this->assertResponseStatus(302);
	}

	public function testShowProductsEditForm() {
		$this->call('GET', 'products/1/edit');
		$this->assertResponseOk();
	}

	public function testProductsUpdate() {
		Eloquent::unguard();
		$this->call('PUT', 'products/1', array('name' => 'Updated product'));
		$this->assertResponseStatus(302);
	}

	public function testShowProductsDelete() {
		$this->call('DELETE', 'products/1');
		$this->assertResponseStatus(302);
	}
}