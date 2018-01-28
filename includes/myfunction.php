<?php

	function connectDB() {
	$connect = mysqli_connect("localhost", "root", "", "blog_news");
		mysqli_set_charset($connect,"utf8");
		return $connect;
	}

	
	function closeDB($connect) {
		mysqli_close($connect);
	}
	
	function getAllArticles($start, $limit) {
		$connect = connectDB();
		$result = mysqli_query($connect, "SELECT * FROM `news`  ORDER BY `idate` DESC LIMIT ".$start.", ".$limit);
		closeDB($connect);
		return setResultToArray($result);
	}

    function getLastAllArticles($lastlimit) {
		$connect = connectDB();
		$result = mysqli_query($connect, "SELECT * FROM `news`  ORDER BY `idate` DESC LIMIT " .$lastlimit);
		closeDB($connect);
		return setResultToArray($result);
	}


	function setResultToArray($result) {
		$array = array();
		while ($row = mysqli_fetch_assoc($result)) $array[] = $row;
		return $array;
	}
	
	function countArticles() {
		$connect = connectDB();
		$reslut = mysqli_query($connect,"SELECT COUNT(`id`) FROM `news`");
		closeDB($connect);
		$result = mysqli_fetch_row($reslut);
		return $result[0];
	}
	
	function getStart($page, $limit) {
		return $limit * ($page - 1);
	}
	
	function pagination($page, $limit) {
		// общее кол-во строк в БД
		$count_articles = countArticles();
		// общее количество стр.
		$count_pages = ceil($count_articles / $limit);
		if ($page > $count_pages) $page = $count_pages;
		$prev = $page - 1;
		$next = $page + 1;
		if ($prev < 1) $prev = 1;
		if ($next > $count_pages) $next = $count_pages;
		$pagination = "";
		if ($count_pages > 1) {
			// pagination
			if ($page == 1) {
//				$pagination .= "<span>Прервая </span>";
//				$pagination .= "<span>Предыдущая </span>";
			}
			else {
//				$pagination .= "<a href='news.php'>Прервая </a>";
//				if ($prev == 1) $pagination .= "<a href='news.php'>Прервая </a>";
//				else $pagination .= "<a href='news.php?page=".$prev."'>Предыдущая </a>";
			}
			for ($i = 1; $i <= $count_pages; $i++) {
				if ($i == $page) $pagination .= "<span> ".$i." </span>";
				elseif ($i == 1) $pagination .= "<li><a href='news.php'> ".$i." </a></li>";
				else $pagination .= "<li><a href='news.php?page=".$i."'> ".$i." </a></li>";
			}
			if ($page == $count_pages) {
//				$pagination .= "<span> Следующая</span>";
//				$pagination .= "<span> Последняя</span>";
			}
			else {
//				$pagination .= "<a href='news.php?page=".$next."'> Следующая</a>";
//				$pagination .= "<a href='news.php?page=".$count_pages."'> Последняя</a>";
			}
		}
		return $pagination;
	}


?>