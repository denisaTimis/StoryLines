<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
$app = new \Slim\App;

$app->get('/user/{id}', function (Request $request, Response $response, array $args) {
    require_once '../db/dbconn.php';

    $id = $args['id'];
    $sql_statement = $pdo->prepare("SELECT * FROM user WHERE id=:userid");
    $sql_statement->execute(['userid' => $id]); 

    $user = $sql_statement->fetch();
    
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('profile.php', array(
        "user" => $user
    ));
});

//get story by type
$app->get('/allStories/{type}', function (Request $request, Response $response, array $args) {

    require_once '../db/dbconn.php';
    $type = $args['type'];
    $sql_statement = $pdo->prepare("SELECT story.title AS title,story.post_date AS post_date,story.views AS views,
                                    paragraph.text AS ptext ,user.first_name AS first_name,user.last_name AS last_name
                                    FROM user,story,paragraph WHERE story.type=:typeS AND story.id=paragraph.story_id AND story.user_id=user.id AND paragraph.page_order=1");
    $sql_statement->execute(['typeS' => $type]); 
    $stories = $sql_statement->fetchALL();
    
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('all-stories.php', array(
        "stories" => $stories
    ));
});

//get story page
$app->get('/story/{id}', function (Request $request, Response $response, array $args) {
    require_once '../db/dbconn.php';

    $storyid = $args['id'];
    $sql_statement = $pdo->prepare("SELECT story.title,user.first_name,user.last_name,story.likes,story.dislikes,story.views,story.post_date
                                    FROM story,user WHERE story.id=:id AND user.id=story.user_id");
    $sql_statement1 = $pdo->prepare("SELECT page_order, paragraph.text FROM paragraph WHERE paragraph.story_id=:id");

    $sql_statement->execute(['id' => $storyid]); 
    $story = $sql_statement->fetch();
    $sql_statement1->execute(['id' => $storyid]); 
    $paragraph = $sql_statement1->fetchAll();
    
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('story.php', array(
        "title" => $story[0],
        "first_name" => $story[1],
        "last_name" => $story[2],
        "likes" => $story[3],
        "dislikes" => $story[4],
        "views" => $story[5],
        "post_date" => $story[6],
        "paragraphs" => $paragraph
    ));
});

$app->get('/', function (Request $request, Response $response, array $args) {

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('home.php', array());
});

$app->get('/create', function (Request $request, Response $response, array $args) {

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('create-article.php', array());
});

$app->get('/login', function (Request $request, Response $response, array $args) {

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('login.php', array());
});

$app->get('/signup', function (Request $request, Response $response, array $args) {

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('signup.php', array());
});

$app->run();
?>