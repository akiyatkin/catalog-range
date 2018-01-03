{param-range:}
	<div style="margin-top:5px; border-bottom:1px solid #ccc">
		<div>
			<label style="font-weight:bold;">
			  {data.count!count?:box}
			  {title}&nbsp;<small>{filter}</small>
			</label>
		</div>
		<table class="multirange">
			<tr>
				<td>От&nbsp;<span class="min-val">0</span>&nbsp;</td>

				<td><input class="min" type="range" list="multirange-list{~key}" value="0" min="0" max="10" step="1"></td>
				<td>&nbsp;до&nbsp;<span class="max-val">10</span>&nbsp;</td>

				<td><input class="max" type="range" list="list" value="10" min="0" max="10" step="1"></td>		
			</tr>
			<tr>
				<td><div style="height:0px; overflow: hidden">&nbsp;от&nbsp;10&nbsp;</div></td>
				<td></td>
				<td><div style="height:0px; overflow: hidden">&nbsp;до&nbsp;10&nbsp;</div></td>
				<td></td>
			</tr>
		</table>
		
		 
		<datalist id="multirange-list{~key}">
			<option value="0" label="0%">
			<option value="1">
			<option value="2">
			<option value="5" label="5%">
			<option value="10" label="10%">
		</datalist>

		{row::option-string}
	</div>