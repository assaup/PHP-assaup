<?php

namespace src\Controllers;


use src\Models\Comments\Comment;
use src\View\View;
use src\Services\Db;
use src\Models\Articles\Article;
use src\Models\Users\User;
use Exception;


class ArticleController {
    private $view;
    private $db;


    public function __construct(){
        $this->view = new View(dirname(dirname(__DIR__)).'/templates'); // Создаем объект View с указанием пути к шаблонам
        $this->db = Db::getInstance(); // Получаем экземпляр подключения к БД
    }


    public function index() {
        $articles = Article::findAll(); // Получаем все статьи из базы данных
        $this->view->renderHtml('main/main', ['articles' => $articles]);
    }


    public function show(int $id){
        $article = Article::getById($id);
        if (!$article) {
            throw new NotFoundException();
        }
        // Получаем все комментарии для этой статьи
        $comments = Comment::findAllByArticleId($id) ?? []; 
        
        $this->view->renderHtml('article/show', [
            'article' => $article,
            'author' => $article->getAuthor(),
            'comments' => $comments
        ]);
    }


    public function delete(int $id){
        $article = Article::getById($id);
        if ($article == null){
            throw new NotFoundException();
        }
        $article->delete();
        return header('Location:http://localhost/student-241/3210_1/Project/www/');
    }


    public function create(){
        return $this->view->renderHtml('article/create');
    }


    public function edit(int $id){
        $article = Article::getById($id);
        return $this->view->renderHtml('/article/edit', ['article'=>$article]);
    }


    public function update(int $id){
    $article = Article::getById($id);
    if (!$article) {
        throw new NotFoundException();
    }
    // Устанавливаем новые значения из POST-запроса
    $article->setName($_POST['name']);
    $article->setText($_POST['text']);
    $article->save(); // Сохраняем изменения в БД
    header('Location:http://localhost/student-241/3210_1/Project/www/');
    }
    // Сохраняем новую статью в базе данных
    public function store(){
        $article = new Article();
        $article->setName($_POST['name']);
        $article->setText($_POST['text'] ?? '');
        $article->setAuthorId(1); 
        $article->save();
        header('Location:http://localhost/student-241/3210_1/Project/www/'); 
    }
}