<div class="col-auto px-0 col-md-7 col-xl-3 position-fixed" style="background: linear-gradient(360deg, rgba(209,172,226,1) 0%, rgba(113,198,214,1) 20%);    right: 0; top: 0;">
    <div class="text-white d-flex flex-column vh-100">
      <?php if (! function_exists('dynamic_sidebar') || ! dynamic_sidebar('Colonne Droite')) :
          the_widget('WidgetInformation');
          the_widget('WidgetWeather');
      endif; ?>
    </div>
</div>
