<?php
namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;
use src\Models\Articles\Article;

class Comment extends ActiveRecordEntity
{
    protected int $authorId;
    protected int $articleId;
    protected string $text;
    protected string $createdAt;

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getArticle(): Article
    {
        return Article::getById($this->articleId);
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }
}