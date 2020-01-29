<?php

namespace App\Controller;

use App\Model\ArticleManager;

class ArticleController extends AbstractController
{
    public function create()
    {
        return $this->twig->render('Article/create.html.twig');
    }

    public function save()
    {
        $articleManager = new ArticleManager();
        $lastArticleID = $articleManager->insert($_POST);

        if ($lastArticleID) {
            header('Location:/article/list');
        }
    }

    public function list()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll();

        return $this->twig->render('Article/list.html.twig', ['articles' => $articles]);
    }

    public function update($id)
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleManager->update($_POST);
            header('Location:/article/update/'.$id);
        }

        $article['date'] = (new \DateTime($article['date']))->format('Y-m-d');

        return $this->twig->render('Article/update.html.twig', ['article' => $article]);
    }

    public function delete($id)
    {
        $articleManager = new ArticleManager();
        $articleManager->delete($id);
        header('Location:/article/list');
    }
}