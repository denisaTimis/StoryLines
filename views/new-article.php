<!DOCTYPE html>
<html>
    <head>
        <title>Story Lines</title>
        <link rel="icon" href="graphics/icons/globe.png"/>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./article.css" rel="stylesheet">
        <link href="./common.css" rel="stylesheet">
    </head>
    <header>
        <div class="navbar navbar-dark" style="background-color: rgb(13, 25, 44);">
        <div class="container">
            <div class="row flex-fill justify-content-between">
                <div class="col-md-auto">
                    <a href="./" class="navbar-brand">
                        <img src="../graphics/icons/story.png" width="40px" height="40px" />
                        <strong>Story Line</strong>
                    </a>
                </div>
                <div class="col-md-auto search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-btn">
                                <input class="btn btn-light" width="50px" height="40px" type="image"
                                    src="../graphics/icons/search.png"></input>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-auto">
                    <div>
                        <a href="log-in.html" class="link-style-light">Login/ Register</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs justify-content-center navbar-dark shadow-lg" style="background-color: rgb(13, 25, 44);">
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">General news</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Popular</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Business</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Tech</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Politics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Entertainment</a>
            </li>
        </ul>
    </header>
    <body>
        <div class="py-5 container shadow-lg">
            <div class="row">
                <h2 class="article-title"><?php  echo $_GET["articleTitle"];?></h2>
            </div>
            <div class="py-3 row">
                <p>
                </p>
                <p>
                    <?php  echo $_GET["articleContent"];?>
                </p>
            </div>
            <div class="py-2 row article-vote">
                <div class="col-md-auto">
                    <a href="#"><img width="50px" height="50px" src="./graphics/icons/dislike.png"/></a>
                    <label>300 users disliked this post</label>
                </div>
            </div>
            <div class="py-2 row article-vote">
                <div class="col-md-auto">
                    <a href="#"><img width="50px" height="50px" src="./graphics/icons/like.png"/></a>
                    <label>300 users liked this post</label>
                </div>
            </div>
        </div>
    </body>
</html>