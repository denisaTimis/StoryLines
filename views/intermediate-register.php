<!DOCTYPE html>
<html>

<head>
    <title>World Wide News</title>
    <link rel="icon" href="../graphics/icons/globe.png" />
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/article.css" rel="stylesheet">
    <link href="../css/common.css" rel="stylesheet">
</head>
<header>
    <div class="navbar navbar-dark container" style="background-color: #2F4F4F;">
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
    {%if correctPass %}
        <div class="row">
            <div class="col-md-auto">
                <strong>Account created successfully!</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-md-auto">
                <a href="./login" class="link-style-light">Login</a>
            </div>
        </div>
    {%else%}
        <div class="row">
            <div class="col-md-auto">
                <strong>Wrong password entered!</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-md-auto">
                <a href="./signup" class="link-style-light">Register</a>
            </div>
        </div>
    {%endif%}
    </div>
</body>

</html>