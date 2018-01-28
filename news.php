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
                                <h3>Новости</h3>
                                <hr align="right" width="100%" size="1" color="#FF5702" />
                                <div class="block__content">
                                    <div class="articles articles__horizontal">
                                        <?php
    	// текущая страница
		$page = $_GET["page"];
		if ($page < 1 or $page == "") $page = 1;
		// количество строк-статей на стр.
		$limit = 5;
		// начало выборки из БД
		$start = getStart($page, $limit);
		$articles = getAllArticles($start, $limit);
?>
                                            <?php       		
        for ($i = 0; $i < count($articles); $i++)
        {
?>

            <article class="article">
            <div class="article__info">
           
<small class="color__date"><?php echo date('j.m.Y', ($articles[$i]['idate']));  ?></small>


            
            <a class="color__title" href="view.php?id=<?php echo $articles[$i]['id']; ?>">
            <?php echo $articles[$i]['title']; ?> </a>
            <div class="article__info__preview">
<?php            
             echo $articles[$i]["announce"]." <br />";
?>
                                                    </div>
                                                </div>
                                            </article>
                                            <?php
        }
    echo '<div class = "dark-pagination">';  
        echo '<div class = "ul">';  
           echo pagination($page, $limit);                             
        echo '</div>';                                    
    echo '</div>';                                    
?>
    <hr align="right" width="100%" size="1" color="#FF5702" />
                                    </div>
                                </div>
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
