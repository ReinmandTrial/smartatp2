<?php

// Проверяем, если $compare_ids пустой, задаем его как null
if (empty($compare_ids)) $compare_ids = null;

// Получаем список товаров для сравнения
$arr_compare = get_compare_list($compare_ids);

// Проверяем, что результат не является false и что $arr_compare['first_row'] существует
if (is_array($arr_compare) && isset($arr_compare['first_row']) && is_array($arr_compare['first_row'])) {
    // Подсчитываем количество товаров, если это массив
    $count_products = count($arr_compare['first_row']);
} else {
    // Если $arr_compare['first_row'] не существует или не является массивом, устанавливаем количество в 0
    $count_products = 0;
}

?>

<?php if ($arr_compare): ?>
	<section class="section-compare" id="compare">
		<div class="section-compare__container">
			<div class="section-compare__content">
				<div class="section-compare__heading section-heading flex items-center gap-4 flex-wrap justify-between">
					<div class="section-heading__left">
						<h2 class="headline-large text-dark-800">
							Compare our Products
						</h2>
					</div>
					<div class="section-heading__right">
						<a href="#" class="button button-size-l button-primary">
							<span>
								Request a Demo Kit
							</span>
						</a>
					</div>
				</div>
				<div class="section-compare__body">
					<div class="section-compare-table" style="--count: <?= $count_products; ?>"> <!-- Передаем количество товаров в CSS переменную -->
						<table>
							<thead>
								<tr>
									<th scope="col">
										<div class="section-compare-table-product product-in-table">
											<div class="product-in-table__body">
												<div class="product-in-table__content">
													<h5 class="headline-small text-dark-800">Products</h5>
												</div>
											</div>
										</div>
									</th>
									<?php
									foreach ($arr_compare['first_row'] as $product) {
               
									?>
										<th scope="col">
											<div class="section-compare-table-product product-in-table">
												<div class="product-in-table__body">
													<div class="product-in-table__header">
														<img src="<?= $product['image']['url'] ?>" alt="<?= $product['image']['alt'] ?>">
														<button type="button" data-id-product="<?= $product['id'] ?>" data-type-request='remove' data-request-html='true' class="button-close">
															<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
																<path d="M11 11L6.00001 6.00001M6.00001 6.00001L1 1M6.00001 6.00001L11 1M6.00001 6.00001L1 11" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
															</svg>
														</button>
													</div>
													<div class="product-in-table__content">
														<h5 class="headline-small text-dark-800"><?= $product['title'] ?></h5>
													</div>
												</div>
											</div>
										</th>
									<?php
									}
									?>
								</tr>
							</thead>
							<tbody>
								<!-- specification -->
								<?php
								foreach ($arr_compare['specification'] as $key => $specification) {
								?>
									<tr>
										<td data-label="Products">
											<strong><?= $specification[0]['label'] ?></strong>
										</td>
										<?php
										foreach ($specification as $value) {
										?>
											<td data-label="Genus Inlay">
												<p>
													<?php
													if (!empty($value['value'])) {
														echo $value['value'];
													} else {
														echo 'Empty';
													}
													?>
												</p>
											</td>
										<?php
										}
										?>
									</tr>
								<?php
								}
								?>

							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</section>
<?php else: ?>
	<section class="section-compare"></section>
<?php endif; ?>
