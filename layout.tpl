{blocks-range:}
	<div style="margin-top:5px; border-bottom:1px solid #ddd">
		<div>
			<label style="font-weight:bold;">
			  {data.count!count?:box}
			  {title}&nbsp;<small>{filter}</small>
			</label>
		</div>
		
		<table class="multirange" data-m="{data.m}" data-path="{path}">
			<tr>
				<td>От&nbsp;<b class="minval">{minval}</b>&nbsp;</td>

				<td><input class="min" type="range" list="multirange-list{~key}" value="{minval}" min="{min}" max="{max}" step="{step}"></td>
				<td>&nbsp;до&nbsp;<b class="maxval">{maxval}</b>&nbsp;</td>

				<td><input class="max" type="range" list="multirange-list{~key}" value="{maxval}" min="{min}" max="{max}" step="{step}"></td>		
			</tr>
			<tr>
				<td><div style="height:0px; overflow: hidden">&nbsp;от&nbsp;{step}&nbsp;</div></td>
				<td></td>
				<td><div style="height:0px; overflow: hidden">&nbsp;до&nbsp;{step}&nbsp;</div></td>
				<td></td>
			</tr>
			<tr>
				<td><div style="height:0px; overflow: hidden">&nbsp;от&nbsp;{max}&nbsp;</div></td>
				<td></td>
				<td><div style="height:0px; overflow: hidden">&nbsp;до&nbsp;{max}&nbsp;</div></td>
				<td></td>
			</tr>
			<tr>
				<td><div style="height:0px; overflow: hidden">&nbsp;от&nbsp;{min}&nbsp;</div></td>
				<td></td>
				<td><div style="height:0px; overflow: hidden">&nbsp;до&nbsp;{min}&nbsp;</div></td>
				<td></td>
			</tr>
		</table>
		
		
		<datalist id="multirange-list{~key}">
			{values::optval}
		</datalist>
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