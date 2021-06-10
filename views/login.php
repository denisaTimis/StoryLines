<!doctype html>
<html>

<head>
    <title>Login</title>
    <link rel="icon" href="../graphics/icons/globe.png" />
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/account.css" rel="stylesheet">
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
                        <a href="./user/0" class="link-style-light"><img src="../graphics/icons/profile.png" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs justify-content-center navbar-dark shadow-lg container" style="background-color: #2F4F4F;">
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
    <div class="container py-3 login-container">
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <img src="../graphics/icons/log-in.png" width="50px" height="50px">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <h1>Login</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <input type="text" class="form-control login-input" placeholder="Username" />
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <input type="text" class="form-control login-input" placeholder="Password" />
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <input name="submit" class="btn btn-light login-button" type="submit" value="Login" />
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <a href="./signup"><input class="btn btn-light signup-link" type="button" value="SignUp" /></a>
            </div>
        </div>
    </div>
</body>

</html>