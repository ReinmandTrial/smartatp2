<?php
/*
Template Name: Template: Branding
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





// HOW IT WORKS
$how_it_works_header = get_field('how_it_works_header');
$how_it_works_title = $how_it_works_header['title'];
$how_it_works_subtitle = $how_it_works_header['subtitle'];

// WHY rfware
$why_rfware_header = get_field('why_rfware_header');
$why_rfware_title = $why_rfware_header['title'];
$why_rfware_subtitle = $why_rfware_header['subtitle'];


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

  <section class="promo-video lg:py-20 md:py-16 py-10">
    <div class="promo-video__container">
      <div class="promo-video__content">
        <div class="promo-video__heading section-heading flex items-start gap-4 justify-between flex-wrap">
          <div class="section-heading__left flex flex-col gap-2">
            <?php 
            $use_cases_subtitle = get_field('use_cases_subtitle');
            if (!empty($use_cases_subtitle)) : 
            ?>
              <span><?= esc_html($use_cases_subtitle) ?></span>
            <?php else : ?>
              <span>Use Cases and Solutions</span>
            <?php endif; ?>
            
            <?php 
            $use_cases_heading = get_field('use_cases_heading');
            if (!empty($use_cases_heading)) : 
            ?>
              <h2 class="headline-large"><?= esc_html($use_cases_heading) ?></h2>
            <?php else : ?>
              <h2 class="headline-large">Innovative Solutions for <br> Every Industry</h2>
            <?php endif; ?>
          </div>
          <div class="section-heading__right flex flex-col md:gap-6 gap-3 items-start">
            <?php 
            $use_cases_description = get_field('use_cases_description');
            if (!empty($use_cases_description)) : 
            ?>
              <div class="body-large text-dark-700">
                <p><?= esc_html($use_cases_description) ?></p>
              </div>
            <?php else : ?>
              <div class="body-large text-dark-700">
                <p>"RFWare by USC offers innovative NFC wearable solutions tailored for various industries, including banking, sports, retail, access control and more. Our products empower businesses to enhance security, improve efficiency, and create seamless user experiences</p>
              </div>
            <?php endif; ?>
            
            <?php 
            $use_cases_button_text = get_field('use_cases_button_text');
            $use_cases_button_url = get_field('use_cases_button_url');
            if (!empty($use_cases_button_text)) : 
            ?>
              <a href="<?= !empty($use_cases_button_url) ? esc_url($use_cases_button_url) : '#' ?>" class="button button-arrow-right button-size-l button-tinted">
                <span><?= esc_html($use_cases_button_text) ?></span>
                <i>
                  <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 12H19.5M19.5 12L13.5 6M19.5 12L13.5 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </i>
              </a>
            <?php else : ?>
              <a href="#" class="button button-arrow-right button-size-l button-tinted">
                <span>Learn More</span>
                <i>
                  <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 12H19.5M19.5 12L13.5 6M19.5 12L13.5 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </i>
              </a>
            <?php endif; ?>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <!-- /.promo-video -->
  <section class="benefits-cases lg:py-20 md:py-16 py-10">
    <div class="benefits-cases__container">
      <div class="benefits-cases__content">
        <div class="benefits-cases__heading section-heading">
          <?php 
          $use_cases_title = get_field('use_cases_title');
          if (!empty($use_cases_title)) : 
          ?>
            <h2 class="headline-large text-dark-800 mb-4"><?= $use_cases_title ?></h2>
          <?php else : ?>
            <h2 class="headline-large text-dark-800 mb-4">Use Cases and Solutions</h2>
          <?php endif; ?>
        </div>
        <div class="benefits-cases__body">
          <div class="benefits-cases__list">
            <?php
            $use_cases = get_field('use_cases_item');
            if (!empty($use_cases)) :
              foreach ($use_cases as $case) :
                $title = !empty($case['title']) ? $case['title'] : '';
                $description = !empty($case['description']) ? $case['description'] : '';
                $image = !empty($case['image']) ? $case['image'] : '';
                $image_url = !empty($image['url']) ? $image['url'] : 'img/benefits-cases/use-cases/placeholder.webp';
                $image_alt = !empty($image['alt']) ? $image['alt'] : $title;
            ?>
              <article class="benefits-cases__item item">
                <div class="item__body">
                  <div class="item__image">
                    <img src="<?= $image_url ?>" alt="<?= $image_alt ?>">
                  </div>
                  <div class="item__content">
                    <h5 class="headline-medium text-dark-800 mb-3"><?= $title ?></h5>
                    <div class="body-medium text-dark-600">
                      <p><?= $description ?></p>
                    </div>
                  </div>
                </div>
              </article>
            <?php
              endforeach;
            else :
            ?>
              <p>No use cases found</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.benefits-cases -->
  <section class="how-it-works lg:lg:py-20 md:py-16 py-10">
    <div class="how-it-works__container">
      <div class="how-it-works__content">
        <div class="how-it-works__heading section-heading flex items-start gap-4 justify-between lg:mb-0">
          <div class="section-heading__left flex flex-col gap-2 sticky top-5">
            <?php 
            $benefits_title = get_field('section_benefits_title');
            if (!empty($benefits_title)) : 
            ?>
              <h2 class="headline-large"><?= $benefits_title ?></h2>
            <?php else : ?>
              <h2 class="headline-large">
                Benefits of Adopting NFC Wearables in Any Industry
              </h2>
            <?php endif; ?>
          </div>
        </div>
        <div class="how-it-works__body">
          <div class="how-it-works__steps">
            <?php
            $benefits_items = get_field('section_benefits_item');
            if (!empty($benefits_items)) :
              $i = 0;
              foreach ($benefits_items as $item) :
                $i++;
                $title = !empty($item['title']) ? $item['title'] : '';
                $description = !empty($item['subtitle']) ? $item['subtitle'] : '';
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
              <p>No benefits found</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.how-it-works -->
	<section class="why-us lg:py-20 md:py-16 py-10" id="why-us">
		<div class="why-us__container">
			<div class="why-us__content">
				<div class="why-us__heading section-heading flex items-start gap-4 justify-between flex-wrap">
					<div class="section-heading__left flex flex-col gap-2">
						<span><?= $why_rfware_subtitle ?></span>
						<h2 class="headline-large">
							<?= $why_rfware_title ?>
						</h2>
					</div>
				</div>
				<div class="why-us__body">
					<div class="benefits__list">
						<?php
						$why_us = get_field('why_rfware_group');
						if (!empty($why_us)) {
							$i = 0;
							foreach ($why_us as $item) {
								$i++;
								$title = $item['title'];
								$subtitle = $item['subtitle'];
								$image = $item['img'];
						?>
								<div class="benefits__item item-benefit">
									<div class="item-benefit__body">
										<div class="item-benefit__header">
											<span class="headline-medium text-dark-600">0<?= $i ?></span>
											<div class="item-benefit__icon">
												<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
											</div>
										</div>
										<div class="item-benefit__content">
											<div class="item-benefit__text">
												<h5 class="headline-medium text-dark-800 mb-4">
													<?= $title ?>
												</h5>
												<div class="body-medium text-dark-600">
													<p>
														<?= $subtitle ?>
													</p>
												</div>
											</div>
											<div class="item-benefit__icon--pc">
												<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
											</div>
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
	</section>
	<!-- /.why-us -->

	<?php get_template_part('template-parts/cta') ?>
	<!-- /.cta-section -->
</main>
<?php get_footer() ?>