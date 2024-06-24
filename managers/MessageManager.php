<?php

class MessageManager extends AbstractManager
{
    public function findAll() : array {  
        $query = $this->db->prepare('SELECT * FROM messages');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $messages = [];
        foreach($result as $item) {
            $message = new Message($item['username'], $item['content'], DateTime::createFromFormat('Y-m-d H:i:s', $item['created_at']));
            $message->setId($item['id']);
            $messages[] = $message;
        }
        return $messages;
    }
    public function create(Message $message) : void {
        $query = $this->db->prepare('INSERT INTO messages (username, content, created_at) VALUES (:username, :content, :createdAt)');
		
		$parameters = [
			'content' => $message->getContent(),
			'createdAt' => date('Y-m-d H:i:s'),
			'username' => $message->getUsername(),
		];
		$query->execute($parameters);
    }
}