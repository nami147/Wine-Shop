<!DOCTYPE html>
<html>
<head>
    <title>Wine Shop</title>
    <link rel="stylesheet" type="text/css" href="stylelog.css">
</head>
<body>
    <div class="wrapper">
        <div class="card-switch">
            <label class="switch">
                <input type="checkbox" class="toggle">
                <span class="slider"></span>
                <span class="card-side"></span>
                <div class="flip-card__inner">
                    <div class="flip-card__front">
                        <div class="title">Log in</div>
                        <form class="flip-card__form" action="process.php" method="post">
                            <input class="flip-card__input" name="email" placeholder="Email" type="email" required>
                            <input class="flip-card__input" name="password" placeholder="Password" type="password" required>
                            <button class="flip-card__btn" name="login" type="submit">Let`s go!</button>
                        </form>
                    </div>
                    <div class="flip-card__back">
                        <div class="title">Sign up</div>
                        <form class="flip-card__form" action="process.php" method="post">
                            <input class="flip-card__input" name="name" placeholder="Name" type="text" required>
                            <input class="flip-card__input" name="email" placeholder="Email" type="email" required>
                            <input class="flip-card__input" name="password" placeholder="Password" type="password" required>
                            <button class="flip-card__btn" name="signup" type="submit">Confirm!</button>
                        </form>
                    </div>
                </div>
            </label>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="stylelog.css">
</body>
</html>