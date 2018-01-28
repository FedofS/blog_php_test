<?php
require "includes/config.php";
require "includes/myfunction.php";
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
        <link rel="stylesheet" type="text/css" href="media/css/pagination.css">
    </head>

    <body>
        <div id="wrapper">
            <header id="header">
                <?php include "includes/header.php";  ?>
            </header>
            <div id="content">
                <div class="container">
                    <div class="row">
                        <section class="content__left col-md-8">
                            <div class="block">

                                <hr align="right" width="100%" size="1" color="#FF5702" />
                                <img src="media/images/ComputerKid.jpg" width="189" height="255" alt="lorem">
                                <hr align="right" width="100%" size="1" color="#FF5702" />
                            </div>
                        </section>

                        <section class="content__left col-md-4">
                            <div class="block">
                                <h3>Последние новости</h3>
                                <div class="block__content">
                                    <div class="articles articles__vertical">
                                        <?php
		// количество строк-статей на стр.
		$lastlimit = 5;
		// начало выборки из БД
		$articles = getLastAllArticles($lastlimit);
?>
                                            <?php       		
        for ($i = 0; $i < count($articles); $i++)
        {
?>
        <article class="article">
        <div class="article__info">
       
<small class="color__date"><?php echo date('j.m.Y', ($articles[$i]['idate']));  ?></small>
        <a href="view.php?id=<?php echo $articles[$i]['id']; ?>">
        <?php echo $articles[$i]['title']; ?> </a>
        <div class="article__info__preview">
<?php            
       echo mb_substr(strip_tags($articles[$i]['content']), 0, 100, 'utf-8');
?>
                                                    </div>
                                                </div>
                                            </article>
                                            <?php
   }
?>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>

            <footer id="footer">
                <?php include "includes/footer.php";?>
            </footer>
        </div>
    </body>

    </html>