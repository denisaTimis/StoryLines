<!DOCTYPE html>
<html>
    <head>
        <title>Story Lines</title>
        <link rel="icon" href="../graphics/icons/story.png"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/homepage.css" rel="stylesheet">
        <link href="../css/common.css" rel="stylesheet">
    </head>
    <header>
        <div class="navbar navbar-dark" style="background-color: #2F4F4F;">
            <div class="container">
                <div class="row flex-fill justify-content-between">
                    <div class="col-md-auto">
                        <a href="./" class="navbar-brand">
                            <img src="../graphics/icons/story.png" width="40px" height="40px" />
                            <strong>Story Line</strong>
                        </a>
                    </div>
                    <div class="col-md-auto search">
                        <form >
                            <div class="input-group" >
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <div class="input-group-btn">
                                    <input class="btn btn-light" width="50px" height="40px" type="image" src="../graphics/icons/search.png"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-auto">
                        <div>
                            <a href="./user/0" class="link-style-light"><img src="../graphics/icons/profile.png"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs justify-content-center navbar-dark shadow-lg" style="background-color: #2F4F4F;">
            <li class="nav-item">
                <a class="nav-link" href="./all">General news</a>
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
        <div class="py-3 container">
            <div class="row">
                <div class="col section-title rounded" name="section-title">
                    <h1><strong>Trending articles</strong></h1>
                </div>
            </div>
            <div class="row py-2 articles-container">
                <div class="column article-preview" name="preview1">
                    <div class="row article-row">
                        <div class="col">
                            <img src="../graphics/icons/article1.png" width="100px" height="100px">
                        </div>
                        <div class="col">
                            <p class="article-preview-title">Title</p>
                            <p>This is a placeholder for the text of the article preview.</p>
                        </div>
                    </div>
                    <div class="row article-row">
                        <div class="col">
                            <img src="../graphics/icons/user.png" class="link-icon" width="20px" height="20px">
                            <a href="profile.html" class="link-style">Author</a>
                        </div>
                        <div class="col">
                            <a href="article.html" class="full-post">View full post...</a>
                        </div>
                    </div>
                </div>
                <div class="column article-preview" name="preview1">
                    <div class="row article-row">
                        <div class="col">
                            <img src="../graphics/icons/article1.png" width="100px" height="100px">
                        </div>
                        <div class="col">
                            <p class="article-preview-title">Title</p>
                            <p>This is a placeholder for the text of the article preview.</p>
                        </div>
                    </div>
                    <div class="row article-row">
                        <div class="col">
                            <img src="../graphics/icons/user.png" class="link-icon" width="20px" height="20px">
                            <a href="#" class="link-style">Author</a>
                        </div>
                        <div class="col">
                            <a href="#" class="full-post">View full post...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="column">
                    <a href="./create" class="link-style">
                        <img src="../graphics/icons/write.png" class="link-icon" width="15px" height="15px">
                        Write an article
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>