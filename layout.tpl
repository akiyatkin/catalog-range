{layout-range:}
	<div style="margin-top:5px; border-bottom:1px solid #ddd">

		<div>
			<label style="font-weight:bold;">
			  {data.count!count?:box}
			  {title}&nbsp;<small>{filter}</small>
			</label>
		</div>

		
		<div class="multirange" data-m="{data.m}" data-path="{path}">
			<div>
				от&nbsp;<b class="minval"></b>&nbsp;
				<input class="min" type="range" list="multirange-list{~key}" value="{minval}" min="{min}" max="{max}" step="{step}">
			</div>
			<div>
				до&nbsp;<b class="maxval"></b>&nbsp;
				<input class="max" type="range" list="multirange-list{~key}" value="{maxval}" min="{min}" max="{max}" step="{step}">
			</div>
		</div>
		
		
		<datalist id="multirange-list{~key}">
			{values::optval}
		</datalist>
		<div style="float:right;">
			<a class="a" rel="nofollow" data-anchor="h1" href="/catalog{:cat.mark.set}">Найдено {data.search}</a>
		</div>
		{omit:omit}
		<!--{row::option-string}-->
	</div>
	{optval:}
		<option value="{.}">
	{omit:}
		<div>
			<label>
			  {:box}
			  {title}&nbsp;<small>{filter}</small>
			</label>
		</div>