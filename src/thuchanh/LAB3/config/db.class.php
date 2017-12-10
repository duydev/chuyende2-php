<?php

class DB {

	/** @var bool|mysqli $conn */
	protected static $conn;

	/**
	 * Connect DB
	 *
	 * @return bool|mysqli
	 */
	public function connect() {
		if ( ! isset( self::$conn ) ) {
			$config     = parse_ini_file( 'config.ini' );
			self::$conn = new mysqli( $config['dbhost'], $config['dbuser'], $config['dbpass'], $config['dbname'] );
		}

		if ( false === self::$conn ) {
			return false;
		}

		self::$conn->query("SET NAMES utf8");
		return self::$conn;
	}

	/**
	 * Execute query.
	 *
	 * @param $query
	 *
	 * @return bool|mysqli_result
	 */
	public function execute_query( $query ) {
		$conn = $this->connect();

		if ( $conn ) {
			$res = $conn->query( $query );
			$conn->close();
			self::$conn = null;

			return $res;
		}

		return false;
	}

	/**
	 * Execute query and return array result
	 *
	 * @param $query
	 *
	 * @return array|bool
	 */
	public function select_to_array( $query ) {
		$res = $this->execute_query( $query );

		if ( $res ) {
			$rows = [];
			while ( $item = $res->fetch_assoc() ) {
				$rows[] = $item;
			}

			return $rows;
		}

		return false;
	}

}