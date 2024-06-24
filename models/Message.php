<?php

class Message
{
    private ?int $id;
    public function __construct(private string $username, private string $content, private datetime $createdAt) {

    }

    public function getId() : ?int {
        return $this->id;
    }

    public function setId(?int $id) : void {
        $this->id = $id;
    }

    public function getUsername() : string {
        return $this->username;
    }

    public function setUsername(string $username) : void {
        $this->username = $username;
    }

    public function getContent() : string {
        return $this->content;
    }

    public function setContent(string $content) : void {
        $this->content = $content;
    }

    public function getCreatedAt() : datetime {
        return $this->createdAt;
    }

    public function setCreatedAt(datetime $createdAt) : void {
        $this->createdAt = $createdAt;
    }
}