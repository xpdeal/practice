<?php

namespace ElvisLeite\RecordSetDatabase;

use ElvisLeite\RecordSetDatabase\Connection;
use ElvisLeite\RecordSetDatabase\Formatter;

class Recordset
{
	/**
	 * Number rows	 
	 * @var string
	 */
	private static $numRows;

	/**
	 * Result 	 
	 * @var string
	 */
	private static $result;

	/**	 
	 *Registres
	 * @var array
	 */
	private static $regs;

	/**
	 * Link of the connection
	 * @var string
	 */
	private static $link;

	/**
	 * Method responsible for set Connection
	 */
	function __construct()
	{
		return self::$link = Connection::setConnect();		
	}

	/**
	 * Method responsible for runing the sql query
	 * @param string $sql
	 * @return void	 
	 */
	public static function Execute(string $sql): void
	{
		self::$result = mysqli_query(self::$link, $sql) or die(mysqli_error(self::$link));
	}

	/**
	 * Method responsible for generating the datas	 
	 * @return mixed 
	 */
	public static  function DataGenerator(): mixed
	{
		return self::$regs = mysqli_fetch_array(self::$result);
		//CLOSE CONNECTION		
		Connection::getDesconnect(self::$link);
	}

	/**
	 * Method responsible for the number of rows in the table
	 * @param string $sql
	 * @return int	 
	 */
	public static function getCountRows(string $sql): int
	{
		self::$result = mysqli_query(self::$link, $sql);

		//RETURN NUMBER OF TABLE ROWS
		return self::$numRows  = mysqli_num_rows(self::$result);
	}

	/**
	 * Method responsible for selectioning the table's filds	
	 * @param mixed $field
	 * @return mixed
	 */
	public static function fld(mixed $field): mixed
	{
		return self::$regs[$field];
	}

	/**
	 * Method responsible for handling the date field in the format date: time Brazil
	 * @param string $field
	 * @return string
	 */
	public static function formFld(string $field): string
	{
		return Formatter::setTimeDate(self::fld($field));
	}

	/**
	 * Method responsible for handling the date field in the format date: time Brazil
	 * @param string $field
	 * @return string
	 */
	public static function formMonthFld(string $field): string
	{
		return Formatter::setMonthformat(self::fld($field));
	}

	/**
	 * Method responsible for Insert data into the table
	 * @param mixed $values
	 * @param string $table
	 * @return void
	 */
	public static function Insert(mixed $values, string $table): void
	{
		//QUERY DATA
		$fields = array_keys($values);

		//MOONT A QUERY
		$sql = "INSERT INTO $table (" . implode(',', $fields) . ") VALUES ('" . implode("','", $values) . "')";

		//RUN SQL
		self::Execute($sql);
	}

	/**	 
	 *Method responsible for selectioning the datas
	 * @param string $table
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 * @param string $fields
	 * @return string
	 */
	public static function Select(string $table, string $where = null, string $order = null, string $limit = null, string $fields = '*')
	{
		//DATES OF THE QUERY
		$where = strlen($where) ? 'WHERE ' . $where : '';
		$order = strlen($order) ? 'ORDER BY ' . $order : '';
		$limit = strlen($limit) ? 'LIMIT ' . $limit : '';

		//SET UP A QUERY		
		$sql = "SELECT $fields FROM $table $where $order $limit";

		//RUN DE QUERY
		return self::$result = mysqli_query(self::$link, $sql);
	}

	/**	 
	 * Method responsible for updating the datas
	 * @param mixed $filds
	 * @param string $table
	 * @param string $where
	 * @return void
	 */
	public static function Update(mixed $filds, string $table, string $where): void
	{
		//MOUNT QUERY
		$sql = "UPDATE $table SET ";
		foreach ($filds as $fild => $date) {
			if (is_string($date))
				$sql .= $fild . ' = "' . $date . '", ';
			else
				$sql .= $fild . " = " . $date . ", ";
		}
		$sql = substr($sql, 0, -2);
		$sql .= " WHERE " . $where;

		//RUN QUERY
		self::Execute($sql);		
	}

	/**
	 * Method responsible for deleting the data
	 * @param string $table	
	 * @param string $whr
	 * @return void
	 */
	public static function Delete(string $table, string $whr): void
	{
		$sql = "DELETE FROM $table WHERE $whr";

		// RUN SQL		
		self::Execute($sql);
	}

	/**
	 * Method responsible for selectioning a fild of the table
	 * @param string $table
	 * @param string $where
	 * @param mixed $field
	 * @return string
	 */
	public static function getFild(string $table, string $where, mixed $field): string
	{
		self::Select($table, $where, '', '', $field);
		self::DataGenerator();
		return self::fld($field);
	}

	/**
	 * Method responsible for generated a auto-increment on the table
	 * @param mixed $fild
	 * @param string $table
	 * @return int $cod
	 */
	public static function setAutoCode(mixed $fild, string $table): int
	{
		self::Execute("SELECT " . $fild . " FROM " . $table . " ORDER BY " . $fild . " DESC");
		self::DataGenerator();
		$cod = self::fld($fild) + 1;

		//RETURN ID
		return $cod;
	}
}
