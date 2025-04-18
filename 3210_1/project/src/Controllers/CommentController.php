<?php
namespace src\Controllers;

use src\View\View;
use src\Models\Comments\Comment;
use src\Models\Articles\Article;

class CommentController
{
    private $view;
    //Инициализируем сервис View с указанием пути к шаблонам
    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
    }
    // Создаем новый комментарий
    public function store(int $articleId)
    {
        $comment = new Comment();
        $comment->setText($_POST['text']);
        $comment->setAuthorId(1); 
        $comment->setArticleId($articleId); // Устанавливаем связь с статьей
        $comment->save();
        $bUrl = dirname($_SERVER['SCRIPT_NAME']); // Формируем базовый URL
        header("Location: {$bUrl}/article/{$articleId}#comment{$comment->getId()}");
    }
    //Отображает форму редактирования комментария
    public function edit(int $id)
    {
        $comment = Comment::getById($id);
        if (!$comment) {
            throw new \Exception();
        }
        $this->view->renderHtml3('comment/edit.php', [
            'comment' => $comment,
            'error' => null
        ]);
    }

    public function update(int $id)
    {
        $comment = Comment::getById($id); 
        $comment->setText($_POST['text']);
        $comment->save();
        $rUrl = dirname($_SERVER['SCRIPT_NAME']).'/article/'.$comment->getArticleId().'#comment'.$comment->getId();
        header("Location: $rUrl");
    }
}