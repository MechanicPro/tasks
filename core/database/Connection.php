<?php

/**
* Create a connection with MySQL database
*/
class Connection
{
	
	public static function make($config)
	{
		try {
			return new PDO(
				$config['connection'] . ';dbname=' . $config['name'] . ';charset=' . $config['charset'],
				$config['username'],
				$config['password'],
				$config['options']
			);	

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}