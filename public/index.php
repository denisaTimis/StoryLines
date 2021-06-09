<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title="WWN",
 *         description="Web application made for creating and browsing articles",
 *         termsOfService="http://swagger.io/terms/",
 *         @OA\Contact(
 *             email="robert.nagy98@e-uvt.ro, denisa.timis99@e-uvt.ro, paula.pitileac99@e-uvt.ro"
 *         ),
 *         @OA\License(
 *             name="Apache 2.0",
 *             url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *         )
 *     )
 * )
 */

require '../vendor/autoload.php';

$app = new \Slim\App;

/**
 * @OA\Get(
 *     path="/user/{id}",
 *     summary="Gets a user from the database through the id",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of user to return",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(response="default", description="An instance of a user")
 * )
 */
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

/**
 * @OA\Get(
 *     path="/article/{id}",
 *     summary="Gets a article from the database through the id",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of article to return",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(response="default", description="The title of the article and the first and last name of the author")
 * )
 */
$app->get('/article/{id}', function (Request $request, Response $response, array $args) {
    require_once '../db/dbconn.php';

    $id = $args['id'];
    $sql_statement = $pdo->prepare("SELECT title FROM article WHERE id=:articleid");
    $sql_statement->execute(['articleid' => $id]); 

    $sql_statement1 = $pdo->prepare("SELECT first_name,last_name FROM user,article WHERE article.id=:articleid AND article.user_id=user.id");
    $sql_statement1->execute(['articleid' => $id]);

    $title = $sql_statement->fetch();
    $creator = $sql_statement1->fetch();

    $response->getBody()->write(json_encode(array("articleInfo"=>array("title"=>$title[0], "first_name"=>$creator[0], "last_name"=>$creator[1]))));
    return $response;
});

/**
 * @OA\Get(
 *     path="/paragraph/{id}",
 *     summary="Gets a paragraph from the database through the id",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of paragraph to return",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(response="default", description="The content of the paragraph, the title of the article and the release date")
 * )
 */
$app->get('/paragraph/{id}', function (Request $request, Response $response, array $args) {
    require_once '../db/dbconn.php';

    $id = $args['id'];
    $sql_statement = $pdo->prepare("SELECT paragraph.text FROM paragraph WHERE id=:pid");
    $sql_statement->execute(['pid' => $id]); 

    $sql_statement1 = $pdo->prepare("SELECT title,release_date FROM article,paragraph WHERE article.id=:pid AND paragraph.article_id=article.id");
    $sql_statement1->execute(['pid' => $id]);

    $text = $sql_statement->fetch();
    $article = $sql_statement1->fetch();

    $response->getBody()->write(json_encode(array("paragraphInfo"=>array("text"=>$text[0], "title"=>$article[0], "release_date"=>$article[1]))));
    return $response;
});

/**
 * @OA\Get(
 *     path="/",
 *     summary="Renders the home page",
 *     @OA\Response(response="default", description="Home page gets loaded")
 * )
 */
$app->get('/', function (Request $request, Response $response, array $args) {

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('home.php', array());
});

$app->get('/all', function (Request $request, Response $response, array $args) {

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('all-news.php', array());
});

$app->get('/article', function (Request $request, Response $response, array $args) {

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('article.php', array());
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