<?php 

class Types extends Dbh {
  public function getType() {
    $sql = "SELECT * FROM types";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addType($title, $body, $author) {
    $sql = "INSERT INTO posts(title, body, author) VALUES (?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $body, $author]);
  }

  public function editType($id) {
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();

    return $result;
  }

  public function updateType($id, $title, $body, $author) {
    $sql = "UPDATE posts SET title = ?, body = ?, author = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $body, $author, $id]);
  }

  public function delType($id) {
    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }
}