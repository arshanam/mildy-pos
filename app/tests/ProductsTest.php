<?php

class ProductsTest extends TestCase {
	public function testShowProductsIndex() {
		Eloquent::unguard();
		$this->be(new User(array('name' => 'Admin')));
		$this->call('GET', 'products');
		$this->assertResponseOk();
	}

	public function testShowProductsCreateForm() {
		Eloquent::unguard();
		$this->be(new User(array('name' => 'Admin')));
		$this->call('GET', 'products/create');
		$this->assertResponseOk();
	}

	public function testProductsStore() {
		Eloquent::unguard();
		$this->call('POST', 'products', array('id' => '1', 'name' => 'Test Product', 'price' => '500', 'description' => 'Test Description'));
		$this->assertResponseStatus(302);
	}

	public function testShowProductsEditForm() {
		Eloquent::unguard();
		$this->be(new User(array('name' => 'Admin')));
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