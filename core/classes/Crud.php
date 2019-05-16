<?php
class Crud {

	protected $pdo;

	function __construct($pdo) 
	{
		$this->pdo = $pdo;
	}

	/* create */
	public function create($table, $fields = array()) 
	{
		$columns = implode(',', array_keys($fields));
		$values  = ':'.implode(', :', array_keys($fields));
		$sql     = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

		if($stmt = $this->pdo->prepare($sql)) {
			foreach ($fields as $key => $data) {
				$stmt->bindValue(':'.$key, $data);	
			}
			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
	}

	/* update */ 
	public function update($table, $data, $edit_id, $fields = array()) 
	{
		$columns = '';
		$i       = 1;

		foreach ($fields as $name => $value) {
			$columns .= "{$name} = :{$name}";
			if($i < count($fields)) {
				$columns .= ', ';
			} 
			$i++;
		}

		$sql = "UPDATE {$table} SET {$columns} WHERE {$data} = {$edit_id}";
		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $value) {
				$stmt->bindValue(':'.$key, $value);
			}
			$stmt->execute();	
		}
	}

	/* delete */ 
	public function delete($table, $array) 
	{
		$sql   = "DELETE FROM {$table} ";
		$where = " WHERE ";

		foreach ($array as $name => $value) {
			$sql  .= "{$where} {$name} = :{$name} ";
			$where =" AND ";
		}

		if($stmt = $this->pdo->prepare($sql)) {
			foreach ($array as $name => $value) {
				$stmt->bindValue(':'.$name, $value);
			}
			$delete = $stmt->execute();
			return (isset($delete)) ? true : false;
		}
	}

	/* find one row */
	public function find($table, $field, $data)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM $table WHERE {$field} = :data");
		if(is_string($data)){
			$stmt->bindParam(':data', $data, PDO::PARAM_STR);
		}else {
			$stmt->bindParam(':data', $data, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);		
	}

	/* get last row */
	public function getLast($table, $field, $data){
		$stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$field} = :data ORDER BY {$field} LIMIT 1");
		if(is_string($data)){
			$stmt->bindParam(":data", $data, PDO::PARAM_STR);
		}else {
			$stmt->bindParam(":data", $data, PDO::PARAM_INT);
		}			
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);	
	}

	/* show all data by id */
	public function selectAll($table, $data, $id){
		if($data == '' && $id == '') {
			$stmt = $this->pdo->prepare("SELECT * FROM {$table}");
		} else {
			$stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$data} = :id");
			if(is_string($id)){
				$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			}else {
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			}			
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/* pagination */
	public function paginate($table, $row, $data, $getFrom, $getTo){
		if(empty($row) && empty($data)){
			$stmt = $this->pdo->prepare("SELECT * FROM $table LIMIT {$getFrom},{$getTo}");
		}else {
			$stmt = $this->pdo->prepare("SELECT * FROM $table WHERE {$row} = :data LIMIT {$getFrom},{$getTo}");
		}
		if(is_string($id)){
			$stmt->bindParam(":data", $data, PDO::PARAM_STR);
		}else {
			$stmt->bindParam(":data", $data, PDO::PARAM_INT);
		}		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);	
	}

}
?>