<!DOCTYPE html>
<html>

<head>
    <title>World Wide News</title>
    <link rel="icon" href="../../graphics/icons/globe.png" />
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/article.css" rel="stylesheet">
    <link href="../../css/common.css" rel="stylesheet">
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
                        <a href="/login" class="link-style-light">Login/ Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs justify-content-center navbar-dark shadow-lg container" style="background-color: #2F4F4F;">
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Romance">Romance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Horror">Horror</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Comedy">Comedy</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Science Fiction">Science Fiction</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Action">Action</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Mystery">Mystery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Kids">Kids</a>
        </li>
    </ul>
</header>

<body>
    <div class="py-5 container shadow-lg">
        <div class="row justify-content-between">
            <div class="col-md-auto">
                <label>{{first_name}} {{last_name}}</label>
            </div>
            <div class="col-md-auto">
                <label>{{post_date}}</label>
            </div>
        </div>
        <div class="row">
            <h2 class="article-title">{{title}}</h2>
        </div>
        <div class="py-3 row">
            {% for paragraph in paragraphs %}
            <p>{{ paragraph.text|e }}</p>
            {% endfor %}
        </div>
        <div class="py-2 row justify-content-between">
            <div class="col-9">
                <div class="row">
                    <strong>Critics opinion --></strong>
                </div>
                <div class="row">
                    <p>some text</p>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="row">
                    <div class="col-md-auto">
                        <a href="#"><img width="50px" height="50px" src="../../graphics/icons/like.png" /></a>
                    </div>
                    <div class="col-md-auto">
                        <a href="#"><img width="50px" height="50px" src="../../graphics/icons/dislike.png" /></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label>{{likes}}</label>
                    </div>
                    <div class="col-md-auto">
                        <label>{{dislikes}}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-auto">
                <strong>{{views}} views</strong>
            </div>
        </div>
    </div>
</body>

</html>