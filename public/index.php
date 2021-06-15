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
                                    paragraph.text AS ptext ,user.first_name AS first_name,user.last_name AS last_name, story.id AS storyId, user.id AS userId
                                    FROM user,story,paragraph WHERE story.type=:typeS AND story.id=paragraph.story_id AND story.user_id=user.id AND paragraph.page_order=1");
    $sql_statement->execute(['typeS' => $type]); 
    $stories = $sql_statement->fetchALL();
    
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('all-stories.php', array(
        "stories" => $stories
    ));
});

//register user
$app->post('/register', function( Request $request, Response $response){

    require_once '../db/dbconn.php';

    $sql_statement = $pdo->prepare("SELECT COUNT(id)
                                    FROM user;");
    $sql_statement->execute(); 
    $newId = $sql_statement->fetch()[0];
    $newId=$newId + 1;

    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $username=$request->getParam('username');
    $email = $request->getParam('email');
    $password = $request->getParam('password');
    $cpassword = $request->getParam('cpassword');
    $gender=$request->getParam('gender');
    $dob = $request->getParam('dob');
    $country = $request->getParam('country');
    $type=$request->getParam('type');
    
    $sql = $pdo->prepare("INSERT INTO USER (ID,FIRST_NAME, LAST_NAME, USERNAME,EMAIL, PASSWORD, GENDER, DOB, COUNTRY, TYPE ) 
            VALUES(:newId,:first_name,:last_name,:username,:email,:password,:gender,:dob,:country,:type)");
  
    try {

        if($password==$cpassword)
        {
            $correctPass=true;
        }
        else
        {
            $correctPass=false;
        }
      $sql->bindParam(':newId', $newId);
      $sql->bindParam(':first_name', $first_name);
      $sql->bindParam(':last_name', $last_name);
      $sql->bindParam(':username', $username);
      $sql->bindParam(':email', $email);
      $sql->bindParam(':password', $password);
      $sql->bindParam(':gender', $gender);
      $sql->bindParam(':dob', $dob);
      $sql->bindParam(':country', $country);
      $sql->bindParam(':type', $type);

      $sql->execute();

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('intermediate-register.php', array(
        'correctPass' => $correctPass
    ));

    } catch( PDOException $e ) {
      echo '{"error": {"msg": ' . $e->getMessage() . '}';
    }
});

//get story page
$app->get('/story/{id}', function (Request $request, Response $response, array $args) {
    require_once '../db/dbconn.php';

    $storyid = $args['id'];
    $sql_statement = $pdo->prepare("SELECT story.title,user.first_name,user.last_name,story.likes,story.dislikes,story.views,story.post_date,story.id
                                    FROM story,user WHERE story.id=:id AND user.id=story.user_id");
    $sql_statement1 = $pdo->prepare("SELECT page_order, paragraph.text FROM paragraph WHERE paragraph.story_id=:id");

    $sql_statement2 = $pdo->prepare("SELECT DISTINCT user.id AS userId, user.first_name AS first_name, review.text AS reviewText 
                                    FROM review, user, story WHERE review.story_id=:id AND review.user_id=user.id");

    $sql_statement->execute(['id' => $storyid]); 
    $story = $sql_statement->fetch();
    $sql_statement1->execute(['id' => $storyid]); 
    $paragraph = $sql_statement1->fetchAll();
    $sql_statement2->execute(['id' => $storyid]); 
    $reviews = $sql_statement2->fetchAll();
    
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
        "paragraphs" => $paragraph,
        "reviews" => $reviews,
        "story" => $story[7]
    ));
});

// create POST HTTP request
$app->post('/review/add', function( Request $request, Response $response){

    require_once '../db/dbconn.php';
    $sql_statement = $pdo->prepare("SELECT COUNT(id)
                                    FROM review;");
    $sql_statement->execute(); 
    $newId = $sql_statement->fetch()[0];
    $newId=$newId + 1;

    $criticId = $request->getParam('criticId');
    $storyId = $request->getParam('storyId');
    $text = $request->getParam('text');
    
    $sql = $pdo->prepare("INSERT INTO REVIEW (ID,STORY_ID,USER_ID,TEXT) 
            VALUES(:newId,:storyId,:criticId,:text)");
  
    try {
      $sql->bindParam(':newId', $newId);
      $sql->bindParam(':storyId', $storyId);
      $sql->bindParam(':criticId', $criticId);
      $sql->bindParam(':text', $text);

      $sql->execute();
       
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('intermediate-story.php', array(
        "storyId" => $storyId
    ));

    } catch( PDOException $e ) {
      echo '{"error": {"msg": ' . $e->getMessage() . '}';
    }
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
    echo $twig->render('signup.html', array());
});

$app->run();
?>