<?php

class Product extends Eloquent {
	public $fillable = array('name', 'price', 'description');
}