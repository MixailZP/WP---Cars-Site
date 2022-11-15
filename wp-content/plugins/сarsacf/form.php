
<?php 
global $post
?>

<div class="hcf_from">
    <style>
        .hcf_form{
            display: grid;
            grid-template-columns: max-content auto;
            grid-column-gap: 20px;
            grid-row-gap: 15px;
        }
        .hcf_field{
            display: contents;
        }
        .hcf_field label{
            text-transform: capitalize;
        }
    </style>
    <div class="hcf_field">
        <label for="hcf_color">Color</label>
        <input id="hcf_color" name="hcf_color" type="color" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_color', true)) ?>">
    </div>
    <div class="hcf_field">
        <label for="hcf_fluel">Fluel</label>
        <select name="hcf_fluel" id="hcf_fluel">
            <option value="Gas" <?php selected( get_post_meta($post->ID, 'hcf_fluel', true), 'Gas' ); ?>>Gas</option>
            <option value="Diesel" <?php selected( get_post_meta($post->ID, 'hcf_fluel', true), 'Diesel' ); ?>>Diesel</option>
            <option value="Hybrid" <?php selected( get_post_meta($post->ID, 'hcf_fluel', true), 'Hybrid' ); ?>>Hybrid</option>
            <option value="Electro" <?php selected(get_post_meta($post->ID, 'hcf_fluel', true), 'Electro' ); ?>>Electro</option>
            <option value="Hydrogen" <?php selected( get_post_meta($post->ID, 'hcf_fluel', true), 'Hydrogen' ); ?>>Hydrogen</option>
        </select>
    </div>  
    <div class="hcf_field">
        <label for="hcf_strong">Car Power kW</label>
        <input id="hcf_strong" name="hcf_strong" type="number" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_strong', true)) ?>">
    </div>
    <div class="hcf_field">
        <label for="hcf_price">Price $</label>
        <input id="hcf_price" name="hcf_price" type="number" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_price', true)) ?>">
    </div>
    <div class="hcf_field">
        <label for="hcf_published_date">Publiched Date</label>
        <input id="hcf_published_date" name="hcf_published_date" type="date" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_published_date', true)) ?>">
    </div>
</div>