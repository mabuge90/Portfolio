<?php
$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = 'SELECT `title`, `img_url` FROM `projects`;';

$query = $db->prepare($sql);;
$query->execute();
$result = $query->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="CSS/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/portfolio.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <title>WJ Portfolio</title>

</head>

<body>


<!--------Navbar-------->


    <div class="video_container">
        <video loop autoplay>
            <source src="Video/99544-1080.mp4" type="video/mp4" />
            <source src="Video/99544-1080.webm" type="video/webm" />

        </video>
    </div>

    <nav class="nav_container">
        <div class="personal_logo">
            <img class="logo_img" src="Images/logo_transparent.png" alt="personal logo">
        </div>

        <div class="nav_bar">
            <a class="nav_link" href="#about_me" title="Link to about me section">About Me</a>
            <a class="nav_link" href="#portfolio" title="Link to portfolio section">Portfolio</a>
            <a class="nav_link" href="#contact" title="Link to contact section">Contact</a>
        </div>
    </nav>



<!--------About me-------->

    <div id="about_me" class="about_me_container">
        <div class="profile_pic_box">
            <img class="profile_img" src="Images/index.png" alt="profile picture">
        </div>
        <div class="about_me">
            <h3 class="about_me_header">Do or do not. There is no try</h3>

            <p class="about_me_paragraph"> I live and breathe for creating things from scratch – starting from a single building block or idea
                and crafting something that adds value and purpose.
                I am currently undertaking a full-stack development course at Mayden Academy based in Bath, UK
                and hold a ScrumMaster Certification.
            </p>
            <p class="about_me_paragraph">My goal is to develop code that is equal parts agile, creative,
                and accessible to all people. In my free time I like to put my energy in building quirky Lego designs
                and geeking over my massive love of anything that has to do with Star Wars.
            </p>
        </div>

    </div>
    <!--section break-->
    <div class="section_break"></div>
<!--------Portfolio-------->



        <div id="portfolio" class="portfolio_container">


            <?php
            if (!empty($result)) {
                foreach ($result as $project) {
                    echo '<div class="projects_container">';
                    echo '<img class="project_img" src="' . $project['img_url'] . '" alt = "' . $project['title'] . '">' ;
                    echo '<a class="project_link" href="#">' . $project['title'] . '</a>';
                    echo '</div>';
                }

            } else {
                echo '<h1> Database connection failed. Please refresh page. </h1>';
            }

            ?>
        </div>



<!--------Footer-------->
    <footer id="contact" class="footer_container">
        <div class="contact_container">
            <a href="loginPage.php" class="login">Login</a>
            <div class="contact_title">Contact</div>
            <div class="mobile_number">+447474048789</div>
            <a href="mailto:w.n.bullochjr@gmail.com" title="Link to email" class="email">w.n.bullochjr@gmail.com</a>
        </div>

        <div class="follow_container">
                <div class="follow_btn">
                    <a href="#"><i class="fa fa-facebook-square"></i></a>
                    <a href="#"><i class="fa fa-github-square"></i></a>
                    <a href="#"><i class="fa fa-linkedin-square"></i></a>
                </div>
        </div>
    </footer>

</body>
</html>



