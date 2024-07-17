<section <?= get_block_wrapper_attributes(['class' => 'contact-information container',]); ?>>
	<ul class="row gy-md-0 gy-4">
		<li class="col-md-4 col-12">
			<article class="d-flex flex-column justify-content-center text-center align-items-center bg-white py-4 rounded-4 position-relative">
				<span class="background-primary p-3 rounded-circle grid-center mb-3 icon-span">
					<img class="img-fluid" src="/wp-content/uploads/2024/04/chat-icon-dr-reuter.svg" alt="">
				</span>
				<h3>
					Whatsapp
				</h3>
				<p>
					We are here to help
				</p>
				<a class="stretched-link" aria-label="Contact link" href="https://wa.me/<?= get_field('whatsapp_number', 'options') ?>"></a>
			</article>
		</li>
		<!-- 505142818 -->
		<li class="col-md-4 col-12">
			<article class="d-flex flex-column justify-content-center text-center align-items-center bg-white py-4 rounded-4 position-relative">
				<figure class="background-primary p-3 rounded-circle grid-center mb-3 icon-span">
					<img class="img-fluid" src="/wp-content/uploads/2024/04/pin-location-icon-dr-reuter.png" alt="">
				</figure>
				<h3>
					Visit us
				</h3>
				<p>
					Visit our office at adress
				</p>
				<a class="stretched-link" aria-label="Contact link" href="/#our-locations"></a>
			</article>
		</li>
		<li class="col-md-4 col-12">
			<article class="d-flex flex-column justify-content-center text-center align-items-center bg-white py-4 rounded-4 position-relative">
				<span class="background-primary p-3 rounded-circle grid-center mb-3 icon-span">
					<img class="img-fluid" src="/wp-content/uploads/2024/04/call-us-icon-dr-reuter.png" alt="">
				</span>
				<h3>
					Call us
				</h3>
				<p>
					<?= get_field('working_days', 'options') ?> <br> from <?= get_field('working_hours', 'options') ?>
				</p>
				<a class="stretched-link" aria-label="Contact link" href="tel:+97142228811"></a>
			</article>
		</li>
	</ul>
</section>