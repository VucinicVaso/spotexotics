<?php 
class Posts {

	protected $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	/* select * posts by user_id and join with tables brand, types */
	public function usersPosts($id)
	{
		$stmt = $this->pdo->prepare("SELECT posts.id, posts.brand as postBrand, posts.model as postModel, posts.spotter, posts.images, posts.city, posts.country, posts.created_at, brand.brand, model.model, users.username
			FROM posts 
			LEFT JOIN brand ON posts.brand   = brand.id 
			LEFT JOIN model ON posts.model   = model.id
			LEFT JOIN users ON posts.spotter = users.id  
			WHERE spotter = :id ORDER BY posts.id DESC");
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/* select post by id and join with tables brand, type, users */
	public function post($id)
	{
		$stmt = $this->pdo->prepare("SELECT posts.id, posts.brand AS postBrand, posts.model as postModel, posts.spotter, posts.images, posts.city, posts.country, posts.created_at, posts.views, posts.total_votes, brand.brand, model.model, users.username 
			FROM posts 
			LEFT JOIN brand ON posts.brand = brand.id 
			LEFT JOIN model ON posts.model = model.id 
			LEFT JOIN users ON posts.spotter = users.id 
			WHERE posts.id = :id");
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	/* select posts with same brand and model as selected post */
	public function simularPosts($brand, $model)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM posts WHERE brand = :brand AND model = :model ORDER BY created_at DESC LIMIT 3");
		$stmt->bindValue(":brand", $brand, PDO::PARAM_INT);
		$stmt->bindValue(":model", $model, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/* select posts by brand and model */
	public function postsByBrandAndModel($brand, $model)
	{
		$stmt = $this->pdo->prepare("SELECT posts.id, posts.brand AS postBrand, posts.model as postModel, posts.spotter, posts.images, posts.created_at, brand.brand, model.model, users.username 
			FROM posts 
			LEFT JOIN brand ON posts.brand = brand.id 
			LEFT JOIN model ON posts.model = model.id
			LEFT JOIN users ON posts.spotter = users.id  
		 	WHERE posts.brand = :brand AND posts.model = :model ORDER BY posts.created_at DESC");
		$stmt->bindValue(":brand", $brand, PDO::PARAM_INT);
		$stmt->bindValue(":model", $model, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/* paginate posts */
	public function paginatePosts($getFrom, $getTo){
		$stmt = $this->pdo->prepare("SELECT posts.id, posts.brand AS postBrand, posts.model as postModel, posts.spotter, posts.images, posts.city, posts.country, posts.created_at, brand.brand, model.model, users.username FROM posts 
			LEFT JOIN brand ON posts.brand = brand.id 
			LEFT JOIN model ON posts.model = model.id 
			LEFT JOIN users ON posts.spotter = users.id 
			ORDER BY posts.created_at DESC 
			LIMIT {$getFrom},{$getTo}"); 
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);	
	}

	/* check if user voted for spot */
	public function checkForVote($post_id, $user_id)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM votes WHERE post_id = :post_id AND user_id = :user_id");
		$stmt->bindValue(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else {
			return false;
		}
	}

	/* check if brand exists */
	public function checkBrand($title)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM brand WHERE brand = :title");
		$stmt->bindValue(":title", $title, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else {
			return false;
		}
	}

	/* check if type exists */
	public function checkModel($title)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM model WHERE model = :title");
		$stmt->bindValue(":title", $title, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else {
			return false;
		}
	}

	/* select posts by brand */
	public function selectAllByBrand($id)
	{
		$stmt = $this->pdo->prepare("SELECT posts.id, posts.brand AS postBrand, posts.model as postModel, posts.spotter, posts.images, posts.created_at, brand.brand, model.model, users.username 
			FROM posts 
			LEFT JOIN brand ON posts.brand = brand.id 
			LEFT JOIN model ON posts.model = model.id 
			LEFT JOIN users ON posts.spotter = users.id 
			WHERE posts.brand = :id");
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);		
	}

	/* select posts by model */
	public function selectAllByModel($id)
	{
		$stmt = $this->pdo->prepare("SELECT posts.id, posts.brand AS postBrand, posts.model as postModel, posts.spotter, posts.images, posts.created_at, brand.brand, model.model, users.username 
			FROM posts 
			LEFT JOIN brand ON posts.brand = brand.id 
			LEFT JOIN model ON posts.model = model.id 
			LEFT JOIN users ON posts.spotter = users.id 
			WHERE posts.model = :id");
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);		
	}

	/* count all posts */
	public function countPosts()
	{
		$stmt = $this->pdo->prepare("SELECT count(id) FROM posts");
		$stmt->execute();
		return $stmt->fetchColumn();
	}
	
	/* count all posts in last 24h */
	public function countPostsByDay()
	{
		$stmt = $this->pdo->prepare("SELECT count(id) FROM posts WHERE created_at >= now() - INTERVAL 1 DAY");
		$stmt->execute();
		return $stmt->fetchColumn();
	}	

	/* find spot with max votes by day */
	public function spotOfTheDay()
	{
		$stmt = $this->pdo->prepare("SELECT posts.id, posts.brand AS postBrand, posts.model as postModel, posts.spotter, posts.images, posts.created_at, posts.daily_votes, brand.brand, model.model, users.username, 
			(SELECT count(votes.post_id) FROM votes WHERE votes.post_id = posts.id) AS countedVotes 
			FROM posts 
			LEFT JOIN brand ON posts.brand = brand.id 
			LEFT JOIN model ON posts.model = model.id 
			LEFT JOIN users ON posts.spotter = users.id
			LEFT JOIN votes ON posts.id = votes.post_id	
			WHERE DATE(posts.created_at) = CURDATE() AND DATE(votes.created_at) = CURDATE() HAVING countedVotes = posts.daily_votes
			");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
}
?>
