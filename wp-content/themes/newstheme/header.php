<! DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width">
        <title><?php bloginfo('name');?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <!-- add font google -->
        <link href='https://fonts.googleapis.com/css?family=Luckiest Guy' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Saira Condensed' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    </head>
    <?php wp_head();?>
    <body <?php body_class();?>>
    <!-- site-header -->
        <header class="site-header">
            <main>
            <div  class='navbar justify-content-between'>
                <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h2>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button type='submit' class="btn btn-outline-success my-0">Search</button>
                </form>
                <?php 
                $args = array(
                    'theme_location' => 'pageChild'
                )
                
                ?>
                <?php wp_nav_menu($args);?>
            </div>
            
            </main>
            <nav>
            <?php 
            $args = array(
                'theme_location' => 'navbar'
            )
            ?>
            <?php wp_nav_menu($args);?>
            </nav>
        </header>