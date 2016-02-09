<div class="banner-container">
  <table>
    <tbody>
      <tr>
        <td>

          <div>
              <?php the_title(); ?>
          </div>

          <div>
            <?php 

              $address = '';

              if (get_post_meta($post->ID, 'et_er_address', true)) {
                $address .= get_post_meta($post->ID, 'et_er_address', true).', '; 
              }
              if (get_post_meta($post->ID, 'et_er_area_location', true)) {
                $address .= get_post_meta($post->ID, 'et_er_area_location', true).', ';
              }
              $address .= get_post_meta($post->ID, 'et_er_city', true).' '.get_post_meta($post->ID, 'et_er_zipcode', true); 

              echo $address;                  
            ?>
          </div>

        </td>

        <td>

        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="two-column-container">

  <div class="multimedia"></div>

  <div class="meta-info"></div>

</div>