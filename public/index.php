<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
ini_set('display_errors', false);
require '../vendor/autoload.php';
$app = new \Slim\App;

/**
 * @OA\Info(title="StoryLines API", version="1.0")
 */

//____________________________________________________________________________________________________
//GET

/**
 * @OA\Get(
 *     path="/user/{id}",
 *     tags={"user"},
 *     summary="Gets user from data base by id",
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="Id of the user we want to get",
 *          required=true,
 *          @OA\Schema( type="int")
 *     ),
 *     @OA\Response(response="200", description="Successfully got user by id!"),
 *     @OA\Response(response="404", description="User not found!")    
 * )
 */
$app->get('/user/{id}', function (Request $request, Response $response, array $args) {
    require_once '../db/dbconn.php';

    $id = $args['id'];
    $sql_statement = $pdo->prepare("SELECT * FROM user WHERE id=:userid");

    try{
        $sql_statement->execute(['userid' => $id]); 
        $user = $sql_statement->fetch();
        $response->getBody()->write(json_encode(array(
            'id' => $user[0],
            'first_name' => $user[1],
            'last_name' => $user[2],
            'email' => $user[5],
            'gender' => $user[6],
            'dob' => $user[7],
            'country' => $user[8],
        )
        ));
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(200);
    }catch(PDOException $e)
    {
        $error= array(
            'message' => $e->getMessage()
        );

        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});

/**
 * @OA\Get(
 *     path="/profileStory/{userId}",
 *     tags={"stories"},
 *     summary="Gets all stories from data base by user id",
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="Id of the user who wrote the stories",
 *          required=true,
 *          @OA\Schema( type="int")
 *     ),
 *     @OA\Response(response="200", description="Successfully got stories by user id!"),
 *     @OA\Response(response="404", description="Stories not found!")    
 * )
 */
$app->get('/profileStory/{userId}', function (Request $request, Response $response, array $args) {
    require_once '../db/dbconn.php';

    $id = $args['userId'];
    $sql_statement = $pdo->prepare("SELECT story.title, user.first_name, user.last_name, paragraph.text FROM story,user,paragraph WHERE story.user_id=:userId AND user.id=story.user_id AND story.id=paragraph.story_id");

    try{
        $sql_statement->execute(['userId' => $id]); 
        $story = $sql_statement->fetch();
        $response->getBody()->write(json_encode(array(
            'title' => $story[0],
            'first_name' => $story[1],
            'last_name' => $story[2],
            'text' => $story[3]
        )
        ));
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(200);
    }catch(PDOException $e)
    {
        $error= array(
            'message' => $e->getMessage()
        );

        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});


/**
 * @OA\Get(
 *     path="/allStories/{type}",
 *     tags={"stories"},
 *     summary="Get all stories from data base by type",
 *     @OA\Parameter(
 *          name="type",
 *          in="path",
 *          description="Type of the stories we want to get",
 *          required=true,
 *          @OA\Schema( type="string")
 *     ),
 *     @OA\Response(response="200", description="Successfully got stories by type!"),
 *     @OA\Response(response="404", description="Stories not found!") 
 * )
 */
$app->get('/allStories/{type}', function (Request $request, Response $response, array $args) {

    require_once '../db/dbconn.php';
    $type = $args['type'];
    $sql_statement = $pdo->prepare("SELECT story.title AS title,story.post_date AS post_date,story.views AS views,
                                    paragraph.text AS ptext ,user.first_name AS first_name,user.last_name AS last_name, story.id AS storyId, user.id AS userId
                                    FROM user,story,paragraph WHERE story.type=:typeS AND story.id=paragraph.story_id AND story.user_id=user.id AND paragraph.page_order=1");
       try{
        $sql_statement->execute(['typeS' => $type]); 
        $stories = $sql_statement->fetch();
        $response->getBody()->write(json_encode(array(
            'title' => $stories[0],
            'post_date' => $stories[1],
            'views' => $stories[2],
            'text' => $stories[3],
            'first_name' => $stories[4],
            'last_name' => $stories[5],
            'story_id' => $stories[6],
            'user_id' => $stories[7]
        )
        ));
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(200);
    }catch(PDOException $e)
    {
        $error= array(
            'message' => $e->getMessage()
        );

        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
    
});

/**
 * @OA\Get(
 *     path="/login/{username}",
 *     tags={"user"},
 *     summary="Get username entered by user in login",
 *     @OA\Parameter(
 *          name="username",
 *          in="path",
 *          description="Username of the user who logs in",
 *          required=true,
 *          @OA\Schema( type="string")
 *     ),
 *     @OA\Response(response="200", description="Successfully got user by username!"),
 *     @OA\Response(response="404", description="User not found!") 
 * )
 */
$app->get('/login/{username}', function (Request $request, Response $response, array $args)use($loggedUserId) {

    require_once '../db/dbconn.php';
    $username=$args['username'];
    $sql_statement = $pdo->prepare("SELECT id,username, user.password AS pass FROM user WHERE username=:userName ");
    try{
        $sql_statement->execute(['userName' => $username]); 
        $user = $sql_statement->fetch();
        $response->getBody()->write(json_encode(array(
            'username' => $user[1],
            'password' => $user[2]
        )
        ));
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(200);
    }catch(PDOException $e)
    {
        $error= array(
            'message' => $e->getMessage()
        );

        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});

/**
 * @OA\Get(
 *     path="/story/{id}",
 *     tags={"stories"},
 *     summary="Get a story from data base by type",
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="Id of the story we want to get",
 *          required=true,
 *          @OA\Schema( type="int")
 *     ),
 *     @OA\Response(response="200", description="Successfully got story by id!"),
 *     @OA\Response(response="404", description="Story not found!") 
 * )
 */
$app->get('/story/{id}', function (Request $request, Response $response, array $args) {
    require_once '../db/dbconn.php';

    $storyid = $args['id'];
    $sql_statement = $pdo->prepare("SELECT story.title,user.first_name,user.last_name,story.likes,story.dislikes,story.views,story.post_date,story.id
                                    FROM story,user WHERE story.id=:id AND user.id=story.user_id");
    $sql_statement1 = $pdo->prepare("SELECT page_order, paragraph.text FROM paragraph WHERE paragraph.story_id=:id");

    $sql_statement2 = $pdo->prepare("SELECT DISTINCT user.id AS userId, user.first_name AS first_name, review.text AS reviewText 
                                    FROM review, user, story WHERE review.story_id=:id AND review.user_id=user.id");

try{
    $sql_statement->execute(['id' => $storyid]); 
    $story = $sql_statement->fetch();
    $sql_statement1->execute(['id' => $storyid]); 
    $paragraph = $sql_statement1->fetchAll(PDO::FETCH_ASSOC);
    $sql_statement2->execute(['id' => $storyid]); 
    $reviews = $sql_statement2->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode(array(
        "title" => $story[0],
        "first_name" => $story[1],
        "last_name" => $story[2],
        "likes" => $story[3],
        "dislikes" => $story[4],
        "views" => $story[5],
        "post_date" => $story[6],
        "paragraphs" => $paragraph,
        "reviews" => $reviews,
        "story" => $story[7],
    )
    ));
    return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);
}catch(PDOException $e)
{
    $error= array(
        'message' => $e->getMessage()
    );

    $response->getBody()->write($error);
    return $response
        ->withHeader('content-type','application/json')
        ->withStatus(500);
}
});
//____________________________________________________________________________________________________
//POST

/**
 * @OA\Post(
 *     path="/register",
 *     tags={"user"},
 *     @OA\RequestBody(
 *       @OA\MediaType(
 *          mediaType="json",
 *          @OA\Schema( 
 *              required={"first_name","last_name","username","password","cpassword","gender","dob","country","type"},
 *              @OA\Property(property="first_name" , type="string"),
 *              @OA\Property(property="last_name" , type="string"),
 *              @OA\Property(property="username" , type="string"),
 *              @OA\Property(property="password" , type="string"),
 *              @OA\Property(property="cpassword" , type="string"),
 *              @OA\Property(property="gender" , type="string"),
 *              @OA\Property(property="dob" , type="string"),
 *              @OA\Property(property="country" , type="string"),
 *              @OA\Property(property="type" , type="string")
 *              )
 *          )
 *     ),
 *     @OA\Response(response="200", description="Successfully registered user!"),
 *     @OA\Response(response="404", description="Register failed!") 
 * )
 */
$app->post('/register', function( Request $request, Response $response){

    require_once '../db/dbconn.php';

    $sql_statement = $pdo->prepare("SELECT COUNT(id)
                                    FROM user");
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
      
      $result = $sql->execute();
      $response->getBody()->write(json_encode($result));
      return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);

    } catch( PDOException $e ) {
        $error= array(
            'message' => $e->getMessage()
        );
    
        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});



/**
 * @OA\Post(
 *     path="/review/add",
 *     tags={"review"},
 *     @OA\RequestBody(
 *       @OA\MediaType(
 *          mediaType="json",
 *          @OA\Schema( 
 *              required={"storyId","criticId","text"},
 *              @OA\Property(property="storyId" , type="int"),
 *              @OA\Property(property="criticId" , type="int"),
 *              @OA\Property(property="text" , type="string")
 *              )
 *          )
 *     ),
 *     @OA\Response(response="200", description="Successfully added review!"),
 *     @OA\Response(response="404", description="Something went wrong while adding review!") 
 * )
 */
$app->post('/review/add', function( Request $request, Response $response){

    require_once '../db/dbconn.php';
    $sql_statement = $pdo->prepare("SELECT MAX(id)
                                    FROM review");
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

      $result = $sql->execute();
      $response->getBody()->write(json_encode($result));
      return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);

    } catch( PDOException $e ) {
        $error= array(
            'message' => $e->getMessage()
        );
    
        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});

/**
 * @OA\Post(
 *     path="/story/add",
 *     tags={"stories"},
 *     @OA\RequestBody(
 *       @OA\MediaType(
 *          mediaType="json",
 *          @OA\Schema( 
 *              required={"userId","title","text","type"},
 *              @OA\Property(property="userId" , type="int"),
 *              @OA\Property(property="title" , type="string"),
 *              @OA\Property(property="text" , type="string"),
 *              @OA\Property(property="type" , type="string")
 *              )
 *          )
 *     ),
 *     @OA\Response(response="200", description="Successfully added story!"),
 *     @OA\Response(response="404", description="Something went wrong while adding story!") 
 * )
 */
$app->post('/story/add', function( Request $request, Response $response){

    require_once '../db/dbconn.php';
    $sql_statementS = $pdo->prepare("SELECT MAX(id)
                                    FROM story");
    $sql_statementP = $pdo->prepare("SELECT MAX(id)
                                    FROM paragraph");
    $sql_statementS->execute(); 
    $newId = $sql_statementS->fetch()[0];
    $newId = $newId + 1;

    $sql_statementP->execute(); 
    $newIdP = $sql_statementP->fetch()[0];
    $newIdP=$newIdP + 1;

    $postDate=date("d.m.Y");

    $title = $request->getParam('title');
    $type = $request->getParam('type');
    $text = $request->getParam('text');
    $userId = $request->getParam('userId');


    $sqlS = $pdo->prepare("INSERT INTO story (ID,TITLE,USER_ID,TYPE,POST_DATE, DISLIKES,LIKES,VIEWS) 
            VALUES(:newId,:title,:userId,:type,:postDate,0,0,0)");
  
    try {
      $sqlS->bindParam(':newId', $newId);
      $sqlS->bindParam(':title', $title);
      $sqlS->bindParam(':type', $type);
      $sqlS->bindParam(':userId', $userId);
      $sqlS->bindParam(':postDate', $postDate);
      $resultS = $sqlS->execute();

      $pageOrder=1;
      $paragraphs=explode("\n",$text);
        foreach($paragraphs as $paragraph)
        {
            $sqlP = $pdo->prepare("INSERT INTO paragraph (ID,STORY_ID,PAGE_ORDER,TEXT) 
            VALUES(:newIdP,:newId,:pageOrder,:text)");
              $sqlP->bindParam(':newIdP', $newIdP);
              $sqlP->bindParam(':newId', $newId);
              $sqlP->bindParam(':pageOrder', $pageOrder);
              $sqlP->bindParam(':text', $paragraph);

              $resultP = $sqlP->execute();
              $pageOrder=$pageOrder+1;
              $newIdP=$newIdP + 1;
        }
      $response->getBody()->write(json_encode($resultS));
      return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);

    } catch( PDOException $e ) {
        $error= array(
            'message' => $e->getMessage()
        );
    
        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});


//____________________________________________________________________________________________________
//DELETE

/**
 * @OA\Delete(
 *     path="/deletereview/{id}",
 *     tags={"review"},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="Id of the review we want to delete",
 *          required=true,
 *          @OA\Schema( type="int")
 *     ),
 *     @OA\Response(response="200", description="Successfully deleted review!"),
 *     @OA\Response(response="404", description="Review not found!") 
 * )
 */
$app->delete('/deletereview/{id}', function( Request $request, Response $response, array $args){

    require_once '../db/dbconn.php';
    
    $id=$args['id'];
    $sql = $pdo->prepare("DELETE FROM review WHERE id=:reviewId");
  
    try {
      $sql->bindParam(':reviewId', $id);
      $result = $sql->execute();
      $response->getBody()->write(json_encode($result));
      return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);

    } catch( PDOException $e ) {
        $error= array(
            'message' => $e->getMessage()
        );
    
        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});

/**
 * @OA\Delete(
 *     path="/deletestory/{id}",
 *     tags={"stories"},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="Id of the story we want to delete",
 *          required=true,
 *          @OA\Schema( type="int")
 *     ),
 *     @OA\Response(response="200", description="Successfully deleted story!"),
 *     @OA\Response(response="404", description="Story not found!") 
 * )
 */
$app->delete('/deletestory/{id}', function( Request $request, Response $response, array $args){

    require_once '../db/dbconn.php';
    
    $id=$args['id'];
    $sqlP = $pdo->prepare("DELETE FROM paragraph WHERE paragraph.story_id=:storyId");
    $sqlS = $pdo->prepare("DELETE FROM story WHERE id=:storyId");
  
    try {
      $sqlS->bindParam(':storyId', $id);
      $sqlP->bindParam(':storyId', $id);
      $resultP = $sqlP->execute();
      $resultS = $sqlS->execute();
      $response->getBody()->write(json_encode( $resultP));

      return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);

    } catch( PDOException $e ) {
        $error= array(
            'message' => $e->getMessage()
        );
    
        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});

/**
 * @OA\Delete(
 *     path="/deleteuser/{id}",
 *     tags={"user"},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="Id of the user we want to delete",
 *          required=true,
 *          @OA\Schema( type="int")
 *     ),
 *     @OA\Response(response="200", description="Successfully deleted user!"),
 *     @OA\Response(response="404", description="User not found!") 
 * )
 */
$app->delete('/deleteuser/{id}', function( Request $request, Response $response, array $args){

    require_once '../db/dbconn.php';
    
    $id=$args['id'];
    $sql = $pdo->prepare("DELETE FROM user WHERE id=:userId");
  
    try {
      $sql->bindParam(':userId', $id);
      $result = $sql->execute();
      $response->getBody()->write(json_encode($result));
      return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);

    } catch( PDOException $e ) {
        $error= array(
            'message' => $e->getMessage()
        );
    
        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});

//____________________________________________________________________________________________________
//PUT

/**
 * @OA\Put(
 *     path="/editreview/{id}",
 *     tags={"review"},
 *     @OA\RequestBody(
 *       @OA\MediaType(
 *          mediaType="json",
 *          @OA\Schema( 
 *              required={"text"},
 *              @OA\Property(property="text" , type="string")
 *              )
 *          )
 *     ),
 *     @OA\Response(response="200", description="Successfully edited review!"),
 *     @OA\Response(response="404", description="Review not found!") 
 * )
 */
$app->put('/editreview/{id}', function( Request $request, Response $response, array $args){

    require_once '../db/dbconn.php';

    $id=$args['id'];
    $text = $request->getParam('text');
    
    $sql = $pdo->prepare("UPDATE review SET text=:text WHERE id=:id");
  
    try {

      $sql->bindParam(':id', $id);
      $sql->bindParam(':text', $text);

      $result = $sql->execute();
      $response->getBody()->write(json_encode($result));
      return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);

    } catch( PDOException $e ) {
        $error= array(
            'message' => $e->getMessage()
        );
    
        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});

/**
 * @OA\Put(
 *     path="/edituser/{id}",
 *     tags={"user"},
 *     @OA\RequestBody(
 *       @OA\MediaType(
 *          mediaType="json",
 *          @OA\Schema( 
 *              required={"first_name" ,"last_name" ,"gender","country"},
 *              @OA\Property(property="first_name" , type="string"),
 *              @OA\Property(property="last_name" , type="string"),
 *              @OA\Property(property="gender" , type="string"),
 *              @OA\Property(property="country" , type="string")
 *              )
 *          )
 *     ),
 *     @OA\Response(response="200", description="Successfully edited user!"),
 *     @OA\Response(response="404", description="User not found!") 
 * )
 */
$app->put('/edituser/{id}', function( Request $request, Response $response, array $args){

    require_once '../db/dbconn.php';

    $id=$args['id'];
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $gender = $request->getParam('gender');
    $country = $request->getParam('country');
    
    $sql = $pdo->prepare("UPDATE user SET first_name=:first_name,last_name=:last_name,gender=:gender,country=:country WHERE id=:id");
  
    try {

      $sql->bindParam(':id', $id);
      $sql->bindParam(':first_name', $first_name);
      $sql->bindParam(':last_name', $last_name);
      $sql->bindParam(':gender', $gender);
      $sql->bindParam(':country', $country);

      $result = $sql->execute();
      $response->getBody()->write(json_encode($result));
      return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);

    } catch( PDOException $e ) {
        $error= array(
            'message' => $e->getMessage()
        );
    
        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});

/**
 * @OA\Put(
 *     path="/editstory/{id}",
 *     tags={"stories"},
 *     @OA\RequestBody(
 *       @OA\MediaType(
 *          mediaType="json",
 *          @OA\Schema( 
 *              required={"text","type","title"},
 *              @OA\Property(property="text" , type="string"),
 *              @OA\Property(property="type" , type="string"),
 *              @OA\Property(property="title" , type="string")
 *              )
 *          )
 *     ),
 *     @OA\Response(response="200", description="Successfully edited story!"),
 *     @OA\Response(response="404", description="Story not found!") 
 * )
 */
$app->put('/editstory/{id}', function( Request $request, Response $response, array $args){

    require_once '../db/dbconn.php';

    $id=$args['id'];
    $title = $request->getParam('title');
    $text = $request->getParam('text');
    $type = $request->getParam('type');
    
    $sql = $pdo->prepare("UPDATE story SET title=:title,type=:type WHERE id=:id");
  
    try {

      $sql->bindParam(':id', $id);
      $sql->bindParam(':title', $title);
      $sql->bindParam(':type', $type);

      $result = $sql->execute();
      $paragraphs=explode("\n",$text);
        foreach($paragraphs as $paragraph)
        {
              $sqlP = $pdo->prepare("UPDATE paragraph SET text=:text WHERE id=:id)");
              $sqlP->bindParam(':text', $paragraph);

              $resultP = $sqlP->execute();
        }

      $response->getBody()->write(json_encode($result));
      return $response
        ->withHeader('content-type','application/json')
        ->withStatus(200);

    } catch( PDOException $e ) {
        $error= array(
            'message' => $e->getMessage()
        );
    
        $response->getBody()->write($error);
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(500);
    }
});

//____________________________________________________________________________________________________
//retun pages

$app->get('/', function (Request $request, Response $response, array $args)use($loggedUserId) {
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('home.php', array(
    ));
});

$app->get('/create', function (Request $request, Response $response, array $args) {
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('create-article.php', array(
    ));
});

$app->get('/login', function (Request $request, Response $response, array $args)use($loggedUserId) {
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('login.php', array(
    ));
});

$app->get('/signup', function (Request $request, Response $response, array $args) {
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('signup.php', array(
    ));
});

$app->run();
?>