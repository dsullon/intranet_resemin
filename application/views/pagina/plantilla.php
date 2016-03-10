<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="<?= $descripcion ?>">
		    <meta name="keywords" content="<?= $palabrasClaves ?>">
		    <meta name="author" content="Resemin S.A.">
		    <link rel="shortcut icon" href="<?= base_url() ?>img/favicon.ico" />
		    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
		    <link href="<?= base_url() ?>assets/css/resemin.css" rel="stylesheet">
	 		<title>RESEMIN S.A. : <?= $titulo ?></title>
	</head>
	<body>
		<div class="container">





 <body>
<div id ="wrapper">
<header>
<p>content</p>
</header>
<nav>
    <ul>
    <?php if($this->session->userdata('logged_in')): ?>
        <li><?php echo anchor('#','Edit Pages');?>
        <?php if(is_array($cms_pages)): ?>
                <ul>
                    <?php foreach($cms_pages as $page): ?>
                    <li><a href="<?=$page->title?>"><?= $page->title?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            </li>
        <li><?php echo anchor('#','Gallery');?>
        <ul>
            <li><?php echo anchor('admin/addgallery','Add Gallery');?></li>
            <li><?php echo anchor('admin/uploadimage','Upload Image');?>
            </li>
            <li><?php echo anchor('#','Delete Gallery');?></li>
        </ul>
        </li>
        <li><?php echo anchor('#','Sales');?>
        <ul>
            <li><?php echo anchor('admin/addsale','Add Sale');?></li>
            <li><?php echo anchor('#','Edit Sale');?>
            <?php if(is_array($sales_pages)): ?>
                <ul>
                    <?php foreach($sales_pages as $sale): ?>
                    <li><a href="editsale/index/<?=$sale->id?>"><?= $sale->name?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            </li>

            <li><?php echo anchor('#','Delete Sale');?></li>
            <li><?php echo anchor('admin/home/logout','Log Out');?></li>
        </ul>
        </li>
    <?php else: ?>
    <ul>
    <li><?php echo anchor('home','Home');?></li>
    <li><?php echo anchor('about','About Us');?></li>
    <li><?php echo anchor('gallery','Gallery');?></li>
    <li><?php echo anchor('testimonials', 'Testimonials');?></li>
    <li><?php echo anchor('sales','Sales');?></li>
    <li><?php echo anchor('contact','Contact Us');?></li>
    </ul>
    <?php endif; ?>
    </ul>
</nav>
 <section id="content">
    <h1><?= $title ?></h1>

    <p><?= $content ?></p>

</section>

<footer>&copy; Houses LTD <?php echo date('Y');?></footer>
</div> <!-- Wrapper Close -->

</body>