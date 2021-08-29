<?php

class Database{
	
	public static function connect() {
		$db = new mysqli("localhost","root","","sisventamultiple");
		$db ->query("SET NAMES 'utf-8'");
		return $db;
	}
}