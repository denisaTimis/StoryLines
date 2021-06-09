<!DOCTYPE html>
<html>
    <head>
        <title>{{user.FIRST_NAME}} {{user.LAST_NAME}}</title>
        <link rel="icon" href="../../graphics/icons/globe.png"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/create-article.css" rel="stylesheet">
        <link href="../../css/common.css" rel="stylesheet">
        <link href="../../css/homepage.css" rel="stylesheet">
        <link href="../../css/profile.css" rel="stylesheet">
    </head>
    <header>
        <div class="navbar navbar-dark" style="background-color: rgb(13, 25, 44);">
            <div class="container row login-row">
                <a href="./0" class="link-style-light">Profile</a>
            </div>
        </div>
        <div class="navbar navbar-dark" style="background-color: rgb(13, 25, 44);">
            <div class="container">
                <a href="../" class="navbar-brand column">
                    <img src="../../graphics/icons/globe.png" width="50px" height="50px"/>
                    <strong>World Wide News</strong>
                </a>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <input class="btn btn-light" width="50px" height="40px" type="image" src="../../graphics/icons/search.png"></input>
                        </div>
                    </div>
                </form>
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
        <div class="py-5 container">
            <div class="row">
                <div class="col-md-auto shadow-lg">
                    <div class="col-md-auto add-profile-img">
                        <img src="../../graphics/icons/camera.png" width="80px" height="80px">
                    </div>
                    <div class="row profile-articles">
                        <div class="row">
                            <div class="col-md-auto profile-info">
                                
                                <div class="row">
                                    <div class="col">
                                        <strong>Name</strong>
                                    </div>
                                    <div class="col-md-auto">
                                        <label> {{user.FIRST_NAME}} {{user.LAST_NAME}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <strong>Age</strong>
                                    </div>
                                    <div class="col-md-auto">
                                        <label>{{user.AGE}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <strong>Gender</strong>
                                    </div>
                                    <div class="col-md-auto">
                                        <label>
                                        {{user.GENDER}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto shadow-lg profile-about-div">
                    <div class="row profile-about">
                        <strong>ABOUT</strong>
                    </div>
                    <div class="row profile-articles">
                        <div class="row">
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col">
                                        <strong>Email</strong>
                                    </div>
                                    <div class="col-md-auto">
                                        <label>{{user.EMAIL}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <strong>Joined</strong>
                                    </div>
                                    <div class="col-md-auto">
                                        <label>
                                        {{user.JOIN_DATE}}
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <strong>Website</strong>
                                    </div>
                                    <div class="col-md-auto">
                                        <label>{{user.WEBSITE}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row profile-about ">
                        <strong>DESCRIPTION</strong>
                    </div>
                    <div class="row profile-articles">
                        <label>{{user.DESCRIPTION}}</label>
                    </div>
                    <div class="row profile-about">
                        <strong>ARTICLES</strong>
                    </div>
                    <div class="row profile-articles">
                        <div class="column article-preview" name="preview1">
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/article1.png" width="100px" height="100px">
                                </div>
                                <div class="col">
                                    <p class="article-preview-title">Title</p>
                                    <p>This is a placeholder for the text of the article preview.</p>
                                </div>
                            </div>
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/user.png" class="link-icon" width="20px" height="20px">
                                    <a href="profile.php" class="link-style">{{user.FIRST_NAME}} {{user.LAST_NAME}}</a>
                                </div>
                                <div class="col">
                                    <a href="article.html" class="full-post">View full post...</a>
                                </div>
                            </div>
                        </div>
                        <div class="column article-preview" name="preview1">
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/article1.png" width="100px" height="100px">
                                </div>
                                <div class="col">
                                    <p class="article-preview-title">Title</p>
                                    <p>This is a placeholder for the text of the article preview.</p>
                                </div>
                            </div>
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/user.png" class="link-icon" width="20px" height="20px">
                                    <a href="profile.php" class="link-style">{{user.FIRST_NAME}} {{user.LAST_NAME}}</a>
                                </div>
                                <div class="col">
                                    <a href="article.html" class="full-post">View full post...</a>
                                </div>
                            </div>
                        </div>
                        <div class="column article-preview" name="preview1">
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/article1.png" width="100px" height="100px">
                                </div>
                                <div class="col">
                                    <p class="article-preview-title">Title</p>
                                    <p>This is a placeholder for the text of the article preview.</p>
                                </div>
                            </div>
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/user.png" class="link-icon" width="20px" height="20px">
                                    <a href="profile.php" class="link-style">{{user.FIRST_NAME}} {{user.LAST_NAME}}</a>
                                </div>
                                <div class="col">
                                    <a href="article.html" class="full-post">View full post...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>