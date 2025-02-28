<?php
/*
Template Name: Template: Technology and Security
Template Post Type: page
*/
?>
<?php get_header(); ?>
<?php


/* Use cases and solution section */
// Header
$use_cases_header = get_field('use_cases_header');
$use_cases_title = $use_cases_header['title'];
$use_cases_subtitle = $use_cases_header['subtitle'];

// To the right of the header
$use_cases_description = get_field('use_cases_description');
// Button
$use_cases_button_arr = get_field('use_cases_button');
$use_cases_button_title = $use_cases_button_arr['title'];
$use_cases_button_url = $use_cases_button_arr['url'];
$use_cases_button_target = !empty($use_cases_button_arr['target'])
	? 'target="' . $use_cases_button_arr['target'] . '"'
	: '';


// Video
$use_cases_video_url = get_field('use_cases_video')['url'];
if (empty($use_cases_video_url)) {
	$use_cases_video_url = IMAGES_PATH . '/videos/video-1.mp4';
}



?>
<main class="page-section">

  <?php
  // Выносим данные в переменные
  $hero_title = get_field('hero_title');
  $hero_button = get_field('hero_target_button');
  $hero_button_url = !empty($hero_button['url']) ? esc_url($hero_button['url']) : '#';
  $hero_button_title = !empty($hero_button['title']) ? esc_html($hero_button['title']) : '';
  $hero_button_target = !empty($hero_button['target']) ? 'target="' . esc_attr($hero_button['target']) . '"' : '';
  $hero_description = get_field('hero_description');
  $hero_bg_image = get_field('hero_background_image');
  $hero_bg_url = !empty($hero_bg_image['url']) ? esc_url($hero_bg_image['url']) : '';
  $hero_bg_alt = !empty($hero_bg_image['alt']) ? esc_attr($hero_bg_image['alt']) : '';

  ?>

  <section class="hero-section">
    <div class="hero-section__container">
      <div class="hero-section__content">
        <div class="hero-section__top top-hero-section">
          <div class="flex flex-col gap-12">
            <h1 class="display-large text-light-900">
              <?= nl2br($hero_title) ?>
            </h1>
            <?php if($hero_button_title): ?>
            <a href="<?= $hero_button_url ?>" class="sm:!flex !hidden hero-section-button button button-secondary button-size-l justify-center" <?= $hero_button_target ?>>
              <span><?= $hero_button_title ?></span>
              <i>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7 17L17 7M17 7H9M17 7V15" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </i>
            </a>
            <?php endif; ?>
          </div>
        </div>
        <div class="hero-section__bottom bottom-hero-section flex sm:items-end sm:gap-4 gap-3 sm:justify-between sm:flex-row flex-col">
          <?php if($hero_description): ?>
          <div class="hero-section__desc body-large text-light-900">
            <p><?= $hero_description ?></p>
          </div>
          <?php endif; ?>
          <?php if($hero_button_title): ?>
          <a href="<?= $hero_button_url ?>" class="sm:!hidden w-full button button-secondary button-size-l justify-center">
            <span><?= $hero_button_title ?></span>
            <i>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 17L17 7M17 7H9M17 7V15" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </i>
          </a>
          <?php endif; ?>
          <button type="button" data-goto=".jumpscroll" class="sm:block hidden scroll-down-btn body-medium inline-flex items-center gap-1.5 text-light-900">
            <span>scroll down</span>
            <i>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.51 3.29757L12.4899 3.29757V16.874L18.5711 10.7929L19.9853 12.2071L11.5 20.6924L3.01471 12.2071L4.42893 10.7929L10.51 16.874L10.51 3.29757Z" fill="currentColor" />
              </svg>
            </i>
          </button>
        </div>
      </div>
    </div>
    <?php if($hero_bg_url): ?>
    <div class="hero-section__background">
      <img src="<?= $hero_bg_url ?>" alt="<?= $hero_bg_alt ?>">
    </div>
    <?php endif; ?>
  </section>
  <!-- /.hero-section -->
	<div class="jumpscroll"></div>


  <section class="how-it-works lg:py-20 md:py-16 py-10">
    <div class="how-it-works__container">
      <div class="how-it-works__content">
        <div class="how-it-works__heading section-heading flex items-start gap-4 justify-between lg:mb-0">
          <div class="section-heading__left flex flex-col gap-2 sticky top-5">
            <?php 
            $core_tech_title = get_field('benefits_title');
            if (!empty($core_tech_title)) : 
            ?>
              <h2 class="headline-large"><?= esc_html($core_tech_title) ?></h2>
            <?php else : ?>
              <h2 class="headline-large">Core Technology of RFWare Products</h2>
            <?php endif; ?>
          </div>
        </div>
        <div class="how-it-works__body">
          <div class="how-it-works__steps">
            <?php
            $core_tech_items = get_field('benefits_list');
            if (!empty($core_tech_items)) :
              $i = 0;
              foreach ($core_tech_items as $item) :
                $i++;
                $title = !empty($item['title']) ? esc_html($item['title']) : '';
                $description = !empty($item['description']) ? esc_html($item['description']) : '';
                $num = sprintf("%02d", $i);
            ?>
              <div class="how-it-works__step step">
                <div class="step__body">
                  <div class="step__num"><?= $num ?></div>
                  <div class="step__content">
                    <h5 class="headline-medium text-dark-800 mb-3"><?= $title ?></h5>
                    <p class="text-dark-600 body-medium"><?= $description ?></p>
                  </div>
                </div>
              </div>
            <?php
              endforeach;
            else :
            ?>
              <p>No core technology items found</p>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.how-it-works -->
	<!-- <section class="how-it-works lg:lg:py-20 md:py-16 py-10">
		<div class="how-it-works__container">
			<div class="how-it-works__content">
				<div class="how-it-works__heading section-heading flex items-start gap-4 justify-between lg:mb-0">
					<div class="section-heading__left flex flex-col gap-2 sticky top-5">
						<span><?= $how_it_works_subtitle ?></span>
						<h2 class="headline-large">
							<?= $how_it_works_title ?>
						</h2>
					</div>
				</div>
				<div class="how-it-works__body">
					<?php
					$how_it_works = get_field('how_it_works_group');
					if (!empty($how_it_works)) {
						$i = 0;
						foreach ($how_it_works as $item) {
							$i++;

							$title = !empty($item['title']) ? $item['title'] : '';
							$subtitle = !empty($item['subtitle']) ? $item['subtitle'] : '';
					?>
							<div class="how-it-works__step step">
								<div class="step__body">
									<div class="step__num"><?= sprintf('%02d', $i) ?></div>
									<div class="step__content">
										<h5 class="headline-medium text-dark-800 mb-3"><?= $title ?></h5>
										<p class="text-dark-600 body-medium"><?= $subtitle ?></p>
									</div>
								</div>
							</div>
					<?php
						}
					}
					?>
				</div>
			</div>
		</div>
		</div>
	</section> -->
	<!-- /.how-it-works -->
  <section class="benefits-items lg:py-20 md:py-16 py-10">
    <div class="benefits-items__container">
      <div class="benefits-items__content">
        <div class="benefits-items__heading section-heading flex items-center gap-4 flex-wrap justify-between mb-8">
          <div class="section-heading__left">
          <?php 
            $features_section_title = get_field('features_section_title');
            if (!empty($features_section_title)) : 
            ?>
              <h2 class="headline-large"><?= esc_html($features_section_title) ?></h2>
            <?php endif; ?>
          </div>
        </div>
        <div class="benefits-items__body">
          <div class="benefits-items__items">
          <?php
            if (have_rows('features_section')) :
              while (have_rows('features_section')) : the_row();
                $title = get_sub_field('title');
                $description = get_sub_field('description');
            ?>
              <div class="benefits-items__item item">
                <div class="item__body">
                  <div class="item__content">
                    <?php if ($title) : ?>
                      <h5 class="headline-small text-dark-800 mb-3"><?= esc_html($title) ?></h5>
                    <?php else : ?>
                      <h5 class="headline-small text-dark-800 mb-3">Section Title</h5>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                      <p class="text-dark-600 body-medium"><?= esc_html($description) ?></p>
                    <?php else : ?>
                      <p class="text-dark-600 body-medium">Section description is missing</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php
              endwhile;
            else :
            ?>
              <div class="benefits-items__item item">
                <div class="item__body">
                  <div class="item__content">
                    <h5 class="headline-small text-dark-800 mb-3">No Data</h5>
                    <p class="text-dark-600 body-medium">Features information is not available</p>
                  </div>
                </div>
              </div>
            <?php
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.benefits-items -->

  <section class="benefits lg:lg:py-20 md:py-16 py-10">
    <div class="benefits__container">
      <div class="benefits__content">
        <div class="benefits__heading section-heading flex items-start gap-4 justify-between">
          <div class="section-heading__left flex flex-col gap-2">
            <?php
            $section_benefits_title = get_field('section_benefits_title');
            if (!empty($section_benefits_title)) :
            ?>
              <h2 class="headline-large"><?= esc_html($section_benefits_title) ?></h2>
            <?php else : ?>
              <h2 class="headline-large">Compatibility and Integration</h2>
            <?php endif; ?>
          </div>
        </div>
        <div class="benefits__body">
          <div data-tabs class="benefits-tabs tabs tabs-vertical">
            <nav data-tabs-titles class="tabs__navigation">
              <?php
              $section_benefits_item = get_field('section_benefits_item');
              if (!empty($section_benefits_item)) :
                $first = true;
                foreach ($section_benefits_item as $item) :
                  $title = !empty($item['title']) ? $item['title'] : '';
                  $description = !empty($item['description']) ? $item['description'] : '';
                  $image = !empty($item['image']) ? $item['image'] : '';
              ?>
                <div class="tabs__title <?= $first ? '_tab-active' : '' ?>">
                  <button type="button" class="tabs__title-button"><?= esc_html($title) ?></button>
                  <div class="tabs__title-content body-large text-dark-400">
                    <p><?= esc_html($description) ?></p>
                  </div>
                  <?php if ($image) : ?>
                  <div class="tabs__title-image">
                    <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($title) ?>">
                  </div>
                  <?php endif; ?>
                </div>
              <?php
                  $first = false;
                endforeach;
              else :
              ?>
                <div class="tabs__title _tab-active">
                  <button type="button" class="tabs__title-button">No Data Available</button>
                  <div class="tabs__title-content body-large text-dark-400">
                    <p>Benefits information is not available</p>
                  </div>
                </div>
              <?php endif; ?>
            </nav>
            <div data-tabs-body class="tabs__content">
              <?php
              if (!empty($section_benefits_item)) :
                foreach ($section_benefits_item as $item) :
                  $title = !empty($item['title']) ? $item['title'] : '';
                  $image = !empty($item['image']) ? $item['image'] : '';
              ?>
                <div class="tabs__body">
                  <div class="benefits-tabs__image">
                    <?php if ($image) : ?>
                      <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($title) ?>">
                    <?php endif; ?>
                  </div>
                </div>
              <?php
                endforeach;
              else :
              ?>
                <div class="tabs__body">
                  <div class="benefits-tabs__image">
                    <p>No images available</p>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.benefits -->
  <section class="why-us lg:py-20 md:py-16 py-10">
    <div class="why-us__container">
      <div class="why-us__content">
        <div class="why-us__heading section-heading flex items-start gap-4 justify-between flex-wrap">
          <div class="section-heading__left flex flex-col gap-2">
            <?php 
            $section_future_title = get_field('section_future_title');
            if (!empty($section_future_title)) : 
            ?>
              <h2 class="headline-large"><?= esc_html($section_future_title) ?></h2>
            <?php else : ?>
              <h2 class="headline-large">Future-Ready Technology</h2>
            <?php endif; ?>
          </div>
        </div>
        <div class="why-us__body">
          <div class="benefits__list">
            <?php
            if (have_rows('section_future_card')) :
              $i = 0;
              while (have_rows('section_future_card')) : the_row();
                $i++;
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $num = sprintf("%02d", $i);
            ?>
              <div class="benefits__item item-benefit">
                <div class="item-benefit__body">
                  <div class="item-benefit__header">
                    <span class="headline-medium text-dark-600"><?= $num ?></span>
                    <?php if ($image) : ?>
                    <div class="item-benefit__icon">
                      <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt'] ?: $title) ?>">
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="item-benefit__content">
                    <div class="item-benefit__text">
                      <h5 class="headline-medium text-dark-800 mb-4">
                        <?= esc_html($title) ?>
                      </h5>
                      <div class="body-medium text-dark-600">
                        <p>
                          <?= esc_html($description) ?>
                        </p>
                      </div>
                    </div>
                    <?php if ($image) : ?>
                    <div class="item-benefit__icon--pc">
                      <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt'] ?: $title) ?>">
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php
              endwhile;
            else :
            ?>
              <p>No data available</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.why-us -->

 
  <section class="cta-section lg:py-20 md:py-16 py-0">
				<div class="cta-section__container">
					<div class="cta-section__content">
						<div class="cta-section__left left-cta">
							<h2 class="mb-5 headline-large text-light-900">
								Discover the technology and security advantages of RFWare NFC solutions.
							</h2>
							<div class="body-large text-light-900 mb-8">
								<p>
									Contact our team today to discuss how we can tailor our products to meet your business’s needs.
								</p>
							</div>
							<a href="#" class="button button-secondary button-size-l justify-center sm:w-auto w-full">
								<span>Contact Us</span>

							</a>
						</div>
						<div class="cta-section__right right-cta">
							<div class="right-cta__image">
								<img src="<?= get_template_directory_uri(); ?>/img/cta/image.webp" alt="Image CTA">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /.cta-section -->
</main>
<?php get_footer() ?>