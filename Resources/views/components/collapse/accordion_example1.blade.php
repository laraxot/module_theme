<div class="docs-item" id="accordion">
	<h5 class="text-uppercase mb-4">Accordion</h5>
	<div class="docs-desc">
		<p class="lead">Block components used to create an Accordion using Bootstrap collapse plugin.</p>
	</div>
	<div class="mt-5">
		<div id="accordion" role="tablist">
			<div class="card border-0 shadow mb-3">
				<div class="card-header bg-primary-100 border-0 py-0" id="headingOne" role="tab">
					<a class="accordion-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Option one</a>
				</div>
				<div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body py-5">
						<p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. </p>
						<p class="text-muted mb-0">Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
					</div>
				</div>
			</div>
			<div class="card border-0 shadow mb-3">
				<div class="card-header bg-primary-100 border-0 py-0" id="headingTwo" role="tab">
					<a class="accordion-link collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Paypal</a>
				</div>
				<div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="card-body py-5 d-flex align-items-center">
						<input type="radio" name="shippping" id="payment-method-1">
						<label class="ml-3" for="payment-method-1">
						    <strong class="d-block text-uppercase mb-2"> Pay with PayPal</strong>
						    <span class="text-muted text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit.                                          </span>
						</label>
					</div>
				</div>
			</div>
			<div class="card border-0 shadow mb-3">
				<div class="card-header bg-primary-100 border-0 py-0" id="headingThree" role="tab">
					<a class="accordion-link collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Pay on delivery</a>
				</div>
				<div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
					<div class="card-body py-5 d-flex align-items-center">
						<input type="radio" name="shippping" id="payment-method-2">
						<label class="ml-3" for="payment-method-2">
						    <strong class="d-block text-uppercase mb-2"> Pay on delivery</strong>
						    <span class="text-muted text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit.    </span>
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>