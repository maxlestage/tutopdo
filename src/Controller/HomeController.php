<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
//        $results = [];
//        $string = "Le chien marche vers sa niche et trouve une limace de chine nue et pleine de malice qui lui fait du charme";
//        $words = explode(' ', $string);
//
//        foreach ($words as $word) {
//            $letters = str_split(strtolower($word));
//            sort($letters);
//            $pattern = implode('', $letters);
//
//            $results[$pattern][] = $word;
//            $results[$pattern] = array_unique($results[$pattern]);
//            sort($results[$pattern]);
//        }
//
//        foreach ($results as $key => $result) {
//            if(count($result) < 2) {
//                unset($results[$key]);
//            }
//        }
//
//        var_dump($results);
//
//        exit;

        return $this->twig->render('Home/index.html.twig');
    }
}
