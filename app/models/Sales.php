<?php

class Sales extends Eloquent {
	public function details() {
		return $this->hasMany('SalesDetail');
	}
}