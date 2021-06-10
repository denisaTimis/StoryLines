<!DOCTYPE html>
<html>
    <head>
        <title>World Wide News</title>
        <link rel="icon" href="../../graphics/icons/globe.png"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/create-article.css" rel="stylesheet">
        <link href="../../css/common.css" rel="stylesheet">
        <link href="../../css/homepage.css" rel="stylesheet">
        <link href="../../css/allStory.css" rel="stylesheet">
    </head>
    <header>
    <div class="navbar navbar-dark container" style="background-color: #2F4F4F;">
        <div class="container">
            <div class="row flex-fill justify-content-between">
                <div class="col-md-auto">
                    <a href="../" class="navbar-brand">
                        <img src="../../graphics/icons/story.png" width="40px" height="40px" />
                        <strong>Story Line</strong>
                    </a>
                </div>
                <div class="col-md-auto search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-btn">
                                <input class="btn btn-light" width="50px" height="40px" type="image"
                                    src="../../graphics/icons/search.png"></input>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-auto">
                    <div>
                        <a href="../../login" class="link-style-light">Login/ Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs justify-content-center navbar-dark shadow-lg container" style="background-color: #2F4F4F;">
        <li class="nav-item">
            <a class="nav-link" href="./Romance">Romance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Horror">Horror</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Comedy">Comedy</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Science Fiction">Science Fiction</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Action">Action</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Mystery">Mystery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Kids">Kids</a>
        </li>
    </ul>
</header>
    <body>
        <div class="py-5 row container">
        {% for story in stories %}
            <div class=" row py-2 container">
                <div class="column article-div" name="preview1">
                    <div class="row">
                        <div class="col-md-auto">
                            <img src="../../graphics/icons/previewStory.png" width="100px" height="100px">
                        </div>
                        <div class="col">
                            <p class="article-preview-title">{{story.title}}</p>
                                <p>{{story.ptext}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <img src="../../graphics/icons/user.png" class="link-icon" width="20px" height="20px">
                            <a href="profile.html" class="link-style">{{story.first_name}} {{story.last_name}}</a>
                        </div>
                        <div class="col-6">
                            <a href="../../article" class="full-post">View full post...</a>
                        </div>
                        <div class="col-md-auto article-date">
                            <img src="../../graphics/icons/date.png" class="link-icon" width="20px" height="20px">
                            <a href="#" class="link-style">{{story.post_date}}</a>
                        </div>
                        <div class="col-md-auto">
                            <img src="../../graphics/icons/eye.png" class="link-icon" width="20px" height="20px">
                            <a href="#" class="link-style">{{story.views}} views</a>
                        </div>
                    </div>
                </div>        
            </div>
            {% endfor %}
        </div>
    </body>
</html>