<?php

class MessageController extends AbstractController
{
    public function home() {
        $messageManager = new MessageManager();
        $messages = $messageManager->findAll();
        $this->render("home.html.twig", [
            'messages' => $messages,
        ]);
    }

    public function addMessage() {
        if(isset($_POST['message'])) {
            $message = new Message($_POST['pseudo'], $_POST['message'], DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')));
            $messageManager = new MessageManager();
            $messageManager->create($message);
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'Message ajouté avec succès']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Données invalides']);
        }   
    }
}