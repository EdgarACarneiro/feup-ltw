<!DOCTYPE html>
<html lang="en">

	<head>
		<title>EzeeDo</title>
		<!-- Slogan p pagina principal: Ezee Plan. Ezee Do. Ezee Acomplish. -->
		<meta charset="UTF-8">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
	
		<header>
			<div id="info">
				<img src="logo">
				<h1><a href="index.php">EzeeDo</a></h1>
			</div>
			<div id="search">
				<span class="fa fa-search">
				<input type="text" id="search" placeholder="Search" name="search">
			</div>
			<div id="user">
				<a href="index.php"><i class="fa fa-rss"></i></a>
				<a href="profile.php"><i class="fa fa-user-circle"></i></a>
				<input type="checkbox" id="more">
				<label class="more" for="more"></label>
				<!-- 'More' é uma cena estilo a do hamburguer com log out, settings, entre outros -->
			</div>
		</header>

		<nav id="menu">
			<ul>
				<li><a href="projects.php">Projects</a></li>
				<li><a href="addProject.php"><span class="fa fa-plus-circle"></a></li>
				<li><a href="todoLists.php">To-Do Lists</a></li>
				<li><a href="addToDo.php"><span class="fa fa-plus-circle"></a></li>
			</ul>
		</nav>

		<section id="feed">

			<article>
				<h2>Project Title</h2>
				<article>
					<h4>To-Do List 1 Title</h4>
					<ul>
						<li>Fusce venenatis enim sed erat congue laoreet.</li>
						<li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
					</ul>
					<a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
				</article>
				<article>
					<h4>To-Do List 2 Title</h4>
					<ul>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
						<li>Ut feugiat velit nec feugiat bibendum.</li>
						<li>Fusce venenatis enim sed erat congue laoreet.</li>
					</ul>
					<a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
				</article>
			<a href="addToDo.php"><span class="fa fa-plus-circle">Add To-Do List</a>
			</article>
			<article>
				<h2>To-Do List Title</h2>	
				<ul>
					<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
					<li>Ut feugiat velit nec feugiat bibendum.</li>
					<li>Fusce venenatis enim sed erat congue laoreet.</li>
					<li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
				</ul>
				<a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
			</article>
			<article>
				<h2>To-Do List Title</h2>	
				<ul>
					<li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
				</ul>
				<a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
			</article>
			<article>
				<h2>Project Title</h2>
				<article>
					<h4>To-Do List 1 Title</h4>
					<ul>
						<li>Fusce venenatis enim sed erat congue laoreet.</li>
						<li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
						<li>Aliquam rutrum nisi non maximus sagittis.</li>
						<li>Quisque tempor massa id arcu ullamcorper, vitae efficitur odio facilisis.</li>
					</ul>
					<a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
				</article>
				<article>
					<h4>To-Do List 2 Title</h4>
					<ul>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
						<li>Ut feugiat velit nec feugiat bibendum.</li>
						<li>Fusce venenatis enim sed erat congue laoreet.</li>
					</ul>
					<a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
				</article>
				<article>
					<h4>To-Do List 3 Title</h4>
					<ul>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
						<li>Etiam eget metus sit amet nisl maximus tristique cursus ut lorem.</li>
						<li>Fusce venenatis enim sed erat congue laoreet.</li>
						<li>Integer at eros in felis dictum semper ut consequat turpis.</li>
					</ul>
					<a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
				</article>
			<a href="addToDo.php"><span class="fa fa-plus-circle">Add To-Do List</a>
			</article>
		</section>
		
		<footer>
			&copy; 2017 EzeeDo
		</footer>

	</body>
</html>