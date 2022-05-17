<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Not your Space</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./style/style.css">
    <script type="text/javascript" src="https://livejs.com/live.js"></script>
    <script src="./script.js" defer></script>
</head>

<body>
    <header class="header">
        <nav class="nav-bar secondary-text">
            <div class="nav-bar-wrapper">
                <div class="nav-logo-wrapper">
                    <i class="nav-logo"></i>
                    <span class="nav-title">That your Suicide</span>
                </div> 

                <div class="nav-menu-wrapper">
                    <span class="nav-menu-item"><a style='color: black' href="queue.php">Вся черга заявок</a></span>
                    <span class="nav-menu-item">Новини</span>
                    <span class="nav-menu-item">Блог</span>
                    <i class="nav-menu-icon"></i>
                </div>

                <div class="menu-button"></div>
            </div>
        </nav>
    </header>
    <div class="page-wrapper">
        <section class="registration-section">
            <div class="registration-form-wrapper">
                <div class="registration-form-image-wrapper">
                    <img class="registration-form-image" id="evil-img" src="./Assets/girl 1.png" alt="planet-img">
                </div>

                <div class="form-card flex-column">
                    <div class="form-wrapper">

                        <h2 class="form-title">Електронна черга 
                        <span id="text-to-change"> до лікаря</span></h2>

                        <form class="registration-form flex-column"action="valid.php">

                            <label class="form-label" for="name">Імʼя</label>
                            <input class="form-input" type="text" id="name" name="name" placeholder="Введіть імʼя" required>

                            <label class="form-label" for="phone" required>Телефоний номер дущі</label>
                            <input class="form-input" type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="+38 (_) __ __ __" required>

                            <label class="form-label" for="select">Душигуб</label>
                            <select class="form-input form-input-select"name="select" id="select" required>
                                <option selected value="miss">Miss Death</option>
                                <option value="mr_scd">Mr Suicide</option>
                                <option value="dr_kill">Dr Kill</option>
                                <option value="dr_vader">Dr Vader</option>
                            </select>
                            <button class="form-submit-button" type="submit" >Зареєструватися</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="footer secondary-text">
        <span class="footer-credentials">
            © 2142 Your Suicide. Всі права отжаті.
        </span>
    </footer>
</body>
</html>