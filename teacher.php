<?php

namespace App;
use \PDO;

class classes
{
	protected $id;
	protected $first_name;
	protected $last_name;
	protected $email;
    protected $contact;
    protected $employee_number;

	// Database Connection Object
	protected $connection;

    /*public function __construct($id,  )
	{
		$this->task = $task;
		$this->is_completed = $is_completed;
	}*/
    public function getId()
	{
		return $this->id;
	}

	public function getFirstName()
	{
		return $this->first_name;
	}
    public function getLastName()
	{
		return $this->last_name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getContact()
	{
		return $this->contact;
	}
    public function getEmployeeNumber()
	{
		return $this->employee_number;
	}
    public function setConnection($connection)
	{
		$this->connection = $connection;
	}
    public function save()
	{
		try {
			$sql = "INSERT INTO teachers SET first_name=:first_name, last_name=:last_name, email=:email, contact=:contact, employee_number=:employee_number";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':first_name' => $this->getFirstName(),
				':last_name' => $this->getLastName(),
                ':email' => $this->getEmail(),
                ':contact' => $this->getContact(),
                ':employee_number' => $this->getEmployeeNumber(),
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
    public function update($first_name, $last_name, $email, $contact, $employee_number)
	{
		try {
			$sql = 'UPDATE teachers SET first_name=?, last_name=?, email=?, contact=?, employee_number=? WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$first_name,
                $last_name,
                $email,
                $contact,
                $employee_number,
                $this->getID()

			]);
			$this->first_name = $first_name;
			$this->last_name = $last_name;
            $this->email = $email;
            $this->contact = $contact;
            $this->employee_number = $employee_number;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}
    public function delete()
	{
		try {
			$sql = 'DELETE FROM teachers WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
    /*public function assignTeacher()
    {
        try {
			$sql = '';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());*/
		}

