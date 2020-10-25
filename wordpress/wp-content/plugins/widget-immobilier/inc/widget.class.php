<?php

class Mon_widget extends WP_Widget {

public function __construct() {
    $widget_ops = array( 
        'classname' => 'my_widget',
        'description' => 'Mon widget pour mes propriétés',
    );
    parent::__construct( 'my_widget', 'Widget Immobilier', $widget_ops );
}
    
public function widget( $args, $instance ) {
    echo $args['before_widget'];
    echo $args["before_title"];
    if(isset($instance["title"])){
        echo $instance["title"];
    }else{
        echo "<h2 class='widget-title'>Mon Widget Immobilier</h2>";
    }
    
    echo $args["after_title"];
    $plus_pourcentage = ($instance["pourcentage"]/100)*get_field("prix") + get_field("prix") ;
    $moins_pourcentage = get_field("prix") - ($instance["pourcentage"]/100)*get_field("prix");
        
        $param= array(	'post_type' => 'propriete',
                        'meta_query'=>  array(
                                'relation'=>'AND',
                                array(
                                    'key'=>'prix',
                                    'value'=>array($moins_pourcentage,
                                                    $plus_pourcentage),
                                    'type' =>'NUMERIC',
                                    'compare' => 'BETWEEN'
                                    
                                ),
                                array(
                                    'key'=>'ville', 
                                    'value'=>get_field("ville"),
                                    'compare' => '='
                                )
                                
                        )
                    );

        $loop = new WP_Query($param);
        while ($loop->have_posts()) {
            $loop->the_post();
            
            ?>
            <div class="entry-content">
                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                <?php

                $image = get_field('image');
                
                $size = 'thumbnail'; 

                if( $image ): ?>
                <?php 
					echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
				?>
                <div class='image'>
                <?php echo wp_get_attachment_image( $image["ID"], $size ); ?>
                </div>
                <?php 
                    echo '</a>';
                endif; ?>
                <?= "Prix : ".get_field("prix")."$<br>"; ?>
                <?="Ville : ".get_field("ville"); ?>
                
                <?php //the_content(); ?>
            
            </div>
            <?php
        }
    
    
    echo $args['after_widget'];
}

public function form( $instance ) {
    // outputs the options form on admin
    if(isset($instance["title"]) &&isset($instance["pourcentage"]) ){
        $titre=$instance["title"];
        $pourcentage=$instance["pourcentage"];
    }
    ?>  
        
        <label for="title">titre : </label>
        <input type="text" value="<?=$titre; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>">
        <br>
        <label for="pourcentage">Pourcentage : </label>
        <input type="text" value="<?= $pourcentage; ?>" name="<?php echo $this->get_field_name('pourcentage'); ?>" id="<?php echo $this->get_field_id('pourcentage'); ?>">
        <br>
    <?php
}

public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
    if(!is_numeric($new_instance["title"]) && is_numeric($new_instance["pourcentage"]) ){
        return $new_instance;
    }else{
        return $old_instance;
    }
}
}