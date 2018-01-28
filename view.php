<?php
require "includes/config.php";
require "includes/myfunction.php";
$connect = connectDB();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>
            <?php echo $config['title'] ?> </title>

        <!-- Bootstrap Grid -->
        <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

        <!-- Custom -->
        <link rel="stylesheet" type="text/css" href="media/css/style.css">
    </head>

    <body>
        <div id="wrapper">
            <header id="header">
                <?php include "includes/header.php";  ?>
            </header>

            <?php 
$article = mysqli_query($connect, "SELECT * FROM `news` WHERE `id` = " . $_GET['id']);
$art = mysqli_fetch_assoc($article);
if ( mysqli_num_rows($article) <= 0)
{
?>
            <div id=" content">
                <div class="container">
                    <div class="row">
                        <section class="content__left col-md-12">
                            <div clas s="block">
                                <h3>Статья не найдена.</h3>
                                <div class="block__content">
                                    <div class="full-text">
                                        Запрашиваемая статья не существует.
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
        <?php
}else
{
            ?>
            <div id=" content">
                <div class="container">
                    <div class="row">
                        <section class="content__left col-md-12">
                            <div clas s="block">
                                <h3>
                                    <?php echo $art['title'];?>
                                </h3>
                                <hr align="right" width="100%" size="1" color="#FF5702" />
                                <div class="block__content">
                                    <div class="full-text">
                                        <?php echo $art['content']; ?>
                                        <hr align="right" width="100%" size="1" color="#FF5702" />
                                    </div>
                                </div>
                                <div class = "links">
                                <a href="/blog_php_test/news.php">Все новости >></a>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <?php
}
        ?>
    </body>

    </html>