<?php

class SalesDetail extends Eloquent {
	public function sales() {
		return $this->belongsTo('Sales');
	}
}