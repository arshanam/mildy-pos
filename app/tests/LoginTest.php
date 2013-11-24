<?php

class LoginTest extends TestCase {
	public function testShowLogin() {
		$this->call('GET', 'login');
		$this->assertResponseOk();
	}

	public function testDoLogin() {
		$this->call('POST', 'login');
		$this->assertSessionHas('message');
	}

	public function testLogout() {
		$this->call('POST', 'logout');
		$this->assertResponseStatus(302);
	}
}