<?php

class StaffTest extends TestCase {
	public function testShowStaffIndex() {
		Eloquent::unguard();
		$this->be(new User(array('name' => 'Admin')));
		$this->call('GET', 'staffs');
		$this->assertResponseOk();
	}

	public function testShowStaffCreateForm() {
		Eloquent::unguard();
		$this->be(new User(array('name' => 'Admin')));
		$this->call('GET', 'staffs/create');
		$this->assertResponseOk();
	}

	public function testStaffStore() {
		Eloquent::unguard();
		$this->call('POST', 'staffs', array('id' => '1', 'name' => 'Test Product', 'price' => '500', 'description' => 'Test Description'));
		$this->assertResponseStatus(302);
	}

	public function testShowStaffEditForm() {
		Eloquent::unguard();
		$this->be(new User(array('name' => 'Admin')));
		$this->call('GET', 'staffs/1/edit');
		$this->assertResponseOk();
	}

	public function testStaffUpdate() {
		Eloquent::unguard();
		$this->call('PUT', 'staffs/1', array('name' => 'Updated product'));
		$this->assertResponseStatus(302);
	}

	public function testShowStaffDelete() {
		$this->call('DELETE', 'staffs/1');
		$this->assertResponseStatus(302);
	}
}